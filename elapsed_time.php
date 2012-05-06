<?php

	/**
	 * Return the elapsed time in a human readable format.
	 *
	 * Examples:
	 *   Elapsed time up to 30 seconds looks like this: 0.031s
	 *   Elapsed time over 30 seconds look like this: 2h 34m 42s
	 *
	 * @param $begin Begin timestamp with microseconds ($begin = microtime();)
	 * @param $end End timestamp with microseconds ($end = microtime();)
	 *
	 * @return The elapsed time in a human readable format.
	 */
	function elapsed_time($begin, $end) {
		$begin = explode(' ', $begin);
		$end = explode(' ', $end);
		$time_diff = ($end[0] + $end[1]) - ($begin[0] + $begin[1]);

		$buffer = '';

		$time_table = array(
			'd' => (int) ($time_diff / 86400),
			'h' => $time_diff / 3600 % 24,
			'm' => $time_diff / 60 % 60,
			's' => $time_diff % 60
		);

		if ((int) $time_diff > 30) {
			$buffer = '';

			foreach ($time_table as $unit => $time) {
				if ($time > 0) {
					$buffer .= "$time$unit ";
				}
			}
		} else {
			$buffer =  number_format($time_diff, 3) . 's';
		}

		return trim($buffer);
	}
	
	
	// Example usage
	
	$begin = microtime();
	
	// do stuff
	// ...
	
	$end = microtime();
	
	echo elapsed_time($begin, $end);