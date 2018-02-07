<?php
/**
 * Question1Controller
 * A controller to manage the questions - action controller
 *
 * @package  Aligent test
 * @author   Satish Kumar <satish.prg@gmail.com>
 */

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

/*controller to manage the questions - action controller*/
class Question1Controller extends Controller
{
	/**
	* Variable to store default timezone
	*/
	public $app_timezone;
    
    /**
    * Default landing page controller
    */
    public function index()
    {
    	return view('questions.index');
    }

	/**
	* Questions controller  
	*
	* Displays the competetion questions page
	*
	* Link: /aligent/questions 
	* @param empty
	* @return questions view page
	*/
    public function question1()
    {
		return view('questions.question1');
    }

	/**
	* Answer1 controller 
	*
	* Displays the competetion form page
	*
	* Link: /aligent/question1 
	* @param Request object
	* @return empty - displays the result on the page itself
	*/
	public function answer1(Request $request)
    {

		//Get the default timezone to be displayed
    	$this->app_timezone = config('app.timezone');

    	//get all the request variables posted
		$start_dateM = $request->get('date1');
    	$end_dateM = $request->get('date2');
    	$thirdparam = $request->get('thirdparam');
		$timezone = $request->get('timezone');

		//check if required form fields are present	
		if( $start_dateM == "" && $end_dateM == "")
		{
			echo 'Invalid date range. Please provide start and end date';
		}
		else if( $end_dateM <= $start_dateM)
		{
			echo 'Invalid date range. End date should be greater than Start date';
		}
		else
		{
		
		//assumed the form fields - move forward with the functionality
		$start_date = new Carbon($start_dateM);
		$end_date   = new Carbon($end_dateM);

		//print the default dates andd timezone
		echo 'Start DateTime: '.$start_date->toDayDateTimeString().'<br>';
		echo 'End DateTime  : '.$end_date->toDayDateTimeString().'<br>';
		echo 'Current Timezone: '.$this->app_timezone.'<br>';

		//create object of the datehelper - with functions 
		//DateHelper: app/Http/Controllers/DateHelper.php
		$dFunc = new DateHelper();
		//date helper function to calculate the days in a given range
		$dFunc->getDaysFromDateRange($start_dateM,$end_dateM);
		//date helper function to calculate the weekdays (excluding weekends) in a given range
		$dFunc->getWeekDaysFromDateRange($start_dateM,$end_dateM);
		//check the thrid param is not empty - to display year, month, day, hours, minutes and secs.
		$detailed = false;
		if($thirdparam != '')
			$detailed = true;
		$dFunc->getCompleteWeeksFromDateRange($start_dateM,$end_dateM,$detailed);


		echo '<hr>';
	
		//check if the timezone is selected and display the same details again based on the selected timezone
		if($timezone!=''){
		$start_dateNewTimezone = new Carbon($start_dateM);
		$end_dateNewTimezone   = new Carbon($end_dateM);
		
		/**
		*Set the selected Timezone to the selected datetime
		*/
		$start_dateNewTimezone->timezone = $timezone;
		$end_dateNewTimezone->timezone = $timezone;

		//print the default dates andd timezone
		echo '<strong>Selected Timezone: '.$timezone.'</strong><br><br>';
		echo 'Start DateTime(for the selected timezone): '.$start_dateNewTimezone->toDayDateTimeString().'<br>';
		echo 'End DateTime(for the selected timezone)  : '.$end_dateNewTimezone->toDayDateTimeString().'<br>';
	
		//date helper function to calculate the days in a given range
		$dFunc->getDaysFromDateRange($start_dateNewTimezone,$end_dateNewTimezone);
		//date helper function to calculate the weekdays (excluding weekends) in a given range
		$dFunc->getWeekDaysFromDateRange($start_dateNewTimezone,$end_dateNewTimezone);
		//check the thrid param is not empty - to display year, month, day, hours, minutes and secs.
		$dFunc->getCompleteWeeksFromDateRange($start_dateNewTimezone,$end_dateNewTimezone,$detailed);
		}
		//unset the object
		unset($dFunc);
		}
    }



}
