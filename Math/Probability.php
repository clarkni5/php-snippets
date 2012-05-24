<?php

namespace Math;

class Probability {

	/**
	 * Returns the normal cumulative distribution for the specified mean and 
	 * standard deviation.
	 * 
	 * @param X the value for which you want the distribution
	 * @param mean the arithmetic mean of the distribution
	 * @param sigma the standard deviation of the distribution
	 */
	function normdist($X, $mean, $sigma) {
		$res = 0;

		$x = ($X - $mean) / $sigma;

		if ($x == 0) {
			$res = 0.5;
		} else {
			$oor2pi = 1 / (sqrt(2 * 3.14159265358979323846));
			$t = 1 / (1 + 0.2316419 * abs($x));
			$t *= $oor2pi
				* exp(-0.5 * $x * $x)
				* (0.31938153 + $t
					* (-0.356563782 + $t
						* (1.781477937 + $t
							* (-1.821255978 + $t * 1.330274429))));

			if ($x >= 0) {
				$res = 1 - $t;
			} else {
				$res = $t;
			}
		}
		return $res;
	}
}