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

public function getDaysFromDateRange($start_date,$end_date){
	$start_date = new Carbon($start_date);
	$end_date   = new Carbon($end_date);
	$datediff   = $end_date->diff($start_date);
	// total days
	$days = $datediff->days;
	echo '<strong>'.$days.' calendar day(s)</strong> <br>';
}


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

echo '<strong>'.$weekdays.' weekday(s) (excluding Saturdays and Sundays) </strong><br>';

}

public function getCompleteWeeksFromDateRange($start_date,$end_date,$detailed=false)
{
$start_dateM = new Carbon($start_date);
$end_dateM   = new Carbon($end_date);
$datediff   = $end_dateM->diff($start_dateM);
$weekcount = floor($datediff->days/7);

echo '<strong>'.$weekcount.' complete week(s) </strong>'.'<br>';

if($detailed){


	/*manual calculation*/
	$totalDuration = $this->getTotalDurationInSecs($start_date,$end_date);
	echo ' Total Duration   : '. $totalDuration.' (in seconds) <br>';
	

/*
	$seconds = $totalDuration;

	$timezone = "America/New_York";//Australia/Adelaide";
	$begin = new \DateTime( $start_date );
	$end   = new \DateTime( $end_date );
	for($i = $begin; $i <= $end; $i->modify('+1 day')){
	    $loop_date = new Carbon($i->format(DATE_ISO8601));
	    //echo $loop_date.'-'.$loop_date->isWeekend().'<br>';
	$offset = $this->checkDST($i->format(DATE_ISO8601), "spring", $timezone);
	if($offset!=false)
		break;

	}
	echo $offset .'<br>';
	if($offset!='')
	$seconds = $totalDuration+$offset;

	
	$days = floor($seconds / 86400);
	$seconds %= 86400;
	$hours = floor($seconds / 3600);
	$seconds %= 3600;
	$minutes = floor($seconds / 60);
	$seconds %= 60;
	echo 'Day(s)    : '. $days.'<br>';
	echo 'Hour(s)   : '. $hours.'<br>';
	echo 'Minute(s) : '. $minutes.'<br>';
	echo 'Second(s) : '. $seconds.'<br>';
		
*/	

	/*using functions*/
	echo 'Year(s)   : '. $datediff->y.'<br>';
	echo 'Month(s)  : '. $datediff->m.'<br>';
	echo 'Day(s)    : '. $datediff->d.'<br>';
	echo 'Hour(s)   : '. $datediff->h.'<br>';
	echo 'Minute(s) : '. $datediff->i.'<br>';
	echo 'Second(s) : '. $datediff->s.'<br>';
	
}	
}







public function getTotalDurationInSecs($start_date,$end_date)
{

$start_date = new Carbon($start_date);
$end_date   = new Carbon($end_date);
$datediff   = $end_date->diff($start_date);
$totalDuration = $end_date->diffInSeconds($start_date);
return $totalDuration;

}

/** returns true if a time is skipped or doubled 
 * (for example "2013-03-10 02:30" doesen't exist in USA)
 * 
 * @param string $season "spring", "autumn", "fall" or any other string for any of the time changes
 * @param string $datestring in the form of "2013-03-10 02:30"
 * @return boolean
 **/
function checkDST($datestring, $season, $tz = null){
    $debug=true;
    //if($debug) echo ('checking '.$season.' '.$datestring);
    
    // "autumn" or "any" 
    $timestamp = strtotime($datestring);

    $timestamp_start = new \DateTime();
    $timestamp_start->setTimestamp($timestamp);
    $timestamp_end = new \DateTime();
    $timestamp_end->setTimestamp($timestamp)->add(new \DateInterval('PT3600S'));

    if (!$tz) $tz = date_default_timezone_get();
    $timezone = new \DateTimeZone($tz);
    $transitions = $timezone->getTransitions($timestamp_start->getTimestamp(), $timestamp_end->getTimestamp());
    if(isset($transitions) &&  isset($transitions[0]['isdst']) && $transitions[0]['isdst'] >0 )
	return $transitions[0]['offset'];
//print_r($transitions);
  //  echo '<br>';
    /*if (count($transitions) > 1) { // there's an imminent DST transition, spring or fall
        // autumn
        if($debug) echo "<br>NumTransitions: ".(count($transitions));
        if($debug) var_dump($transitions);
        return true;
    }*/
    //return false;
}


}

?>