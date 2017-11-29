<?php

namespace Time;

class DateFormat {
	
	public static $days = array(
		'Sunday',
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday'
	);
	
	/**
	 *
	 */
	public static function relative($timestamp, $format = 'jS F Y') {
		if (date('d/m/Y', $timestamp) === date('d/m/Y')){
			return 'Today';
		} else if(date('d/m/Y', $timestamp) === date('d/m/Y', time() - 3600 * 24)){
			return 'Yesterday';
		} else if((time() - $timestamp) < 3600 * 24 * 8){
			return 'Last ' . self::$days[date('w', $timestamp)];
		} else{
			return date($format, $timestamp);
		}
	}
	
	/**
	 *
	 */
	function relativeTime($timestamp, $format = 'Y-m-d H:i'){
		$dif = time() - $timestamp;

		$dateArray = array(
			'second' => 60, // 60 seconds in 1 minute
			'minute' => 60, // 60 minutes in 1 hour
			'hour' => 24,   // 24 hours in 1 day
			'day' => 7,     // 7 days in 1 week
			'week' => 4,    // 4 weeks in 1 month
			'month' => 12,  // 12 months in 1 year
			'year' => 10    // Up to 10 years
		);

		foreach($dateArray as $key => $item){
			if($dif < $item) {
				return $dif . ' ' . $key . ($dif == 1? '' : 's') . ' ago';
			}
			$dif = round($dif/$item);
		}
		return date($format, $timestamp);
	}
	
}