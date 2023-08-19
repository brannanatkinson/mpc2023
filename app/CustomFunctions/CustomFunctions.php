<?php 

function getCurrentPeriod(){
	$userTimezone = new DateTimeZone('America/Chicago');
	$gmtTimezone = new DateTimeZone('GMT');
	$myDateTime = new DateTime( date('Y-m-d H:i:s'), $gmtTimezone);
	$offset = $userTimezone->getOffset($myDateTime);
	$myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
	$myDateTime->add($myInterval);
	$result = $myDateTime->format('Y-m-d H:i:s');
	if ( ( $result > date( env('START_DATE') ) ) AND ( $result < date( env('END_DATE') ) ) )  {
	    $currentPeriod = "during";
	} elseif ( $result < env('START_DATE') ){
	    $currentPeriod = "before";
	} else {
	    $currentPeriod = "after";
	}
	$showOnPage = $result < date( env('END_DATE') );
	return $currentPeriod;
}