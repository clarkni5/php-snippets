<?php

	/**
	 * Return elapsed time in a human readable format.
	 *
	 * @param $begin Begin timestamp with microseconds ($begin = microtime())
	 * @param $end End timestamp with microseconds ($end = microtime())
	 *
	 * @return The elapsed time in a human readable format.
	 */
	function elapsed_time($begin, $end) {
		$begin = explode(' ', $begin);
		$end = explode(' ', $end);
		$time_diff = ($end[0] + $end[1]) - ($begin[0] + $begin[1]);

		$buffer = '';

		$vals = array(
			'd' => (int) ($time_diff / 86400),
			'h' => $time_diff / 3600 % 24,
			'm' => $time_diff / 60 % 60,
			's' => $time_diff % 60
		);

		if ((int) $time_diff > 30) {
			$buffer = '';

			while(list($key, $val) = each($vals)) {
				if ($val > 0) {
					$buffer .= "$val$key ";
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