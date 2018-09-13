<?php
/**
 * Hepler file with date functions
 *
 * @package  Laravel
 * @author   Satish Kumar <satish.prg@gmail.com>
 */
namespace App\Http\Controllers;

use Carbon\Carbon;


class DateHelper{

/**
* getDaysFromDateRange
*
* Function to get days from a given date range
* 
* @param Start Date - Date object 
* @param End Date - Date object 
* @return void - displays the result on the page itself
*/
public function getDaysFromDateRange($start_date,$end_date){
$start_date = new Carbon($start_date);
$end_date   = new Carbon($end_date);
$datediff   = $end_date->diff($start_date);
// total days
$days = $datediff->days;
//calendar day(s)';
return $days;
}
/**
* getWeekDaysFromDateRange
*
* Function to get weekdays excluding weekends from a given date range
* 
* @param Start Date - Date object 
* @param End Date - Date object 
* @return void - displays the result on the page itself
*/
public function getWeekDaysFromDateRange($start_date,$end_date){
$weekdays=0;
$begin = new \DateTime( $start_date );
$end   = new \DateTime( $end_date );
for($i = $begin; $i <= $end; $i->modify('+1 day')){
    $loop_date = new Carbon($i->format(DATE_ISO8601));
    //echo $loop_date.'-'.$loop_date->isWeekend().'<br>';
    if(!$loop_date->isWeekend())
		$weekdays++;
}
/*check if the total duration is less than 24 hours*/
/*
Start DateTime: Fri, Apr 6, 2018 11:00 PM
End DateTime : Sat, Apr 7, 2018 12:00 AM
*/
$totalDuration = $this->getTotalDurationInSecs($start_date,$end_date);
if($totalDuration<86400)
$weekdays = 0;
//weekday(s) (excluding Saturdays and Sundays)';
return $weekdays;
}
/**
* getTotalDurationInSecs
*
* Function to total duration in secounds.
* 
* @param Start Date - Date object 
* @param End Date - Date object 
* @return total duration 
*/
public function getTotalDurationInSecs($start_date,$end_date)
{
$start_date = new Carbon($start_date);
$end_date   = new Carbon($end_date);
$datediff   = $end_date->diff($start_date);
$totalDuration = $end_date->diffInSeconds($start_date);
return $totalDuration;
}
/**
* getCompleteWeeksFromDateRange
*
* Function to get complete weeks with 7 days  from a given date range
* 
* @param Start Date - Date object 
* @param End Date - Date object 
* @param Third Param - to print the detailed report with year, month, day, hour, min and sec.
* @return void - displays the result on the page itself
*/
public function getCompleteWeeksFromDateRange($start_date,$end_date,$detailed=false)
{
$start_dateM = new Carbon($start_date);
$end_dateM   = new Carbon($end_date);
$datediff   = $end_dateM->diff($start_dateM);
$weekcount = floor($datediff->days/7);
/*if($detailed){
$totalDuration = $this->getTotalDurationInSecs($start_date,$end_date);
echo 'Total Duration   : '. $totalDuration.' (in seconds) <br>';
echo 'Year(s)   : '. $datediff->y.'<br>';
echo 'Month(s)  : '. $datediff->m.'<br>';
echo 'Day(s)    : '. $datediff->d.'<br>';
echo 'Hour(s)   : '. $datediff->h.'<br>';
echo 'Minute(s) : '. $datediff->i.'<br>';
echo 'Second(s) : '. $datediff->s.'<br>';
}*/
//complete week(s);
return $weekcount;
}
}

