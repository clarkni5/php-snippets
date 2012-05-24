<?php

namespace Math;

class Float {

	const EPSILON = 1.0e-8;

	/**
	 * Returns true if both values are equal.
	 * 
	 * @param a the first value
	 * @param b the second value
	 * @return true if equal, false otherwise
	 */
	static function eq($a, $b) {
		return ( abs( floatval($a) - floatval($b) ) < self::EPSILON );
	}
	
	/**
	 * Returns true if the first value is less than the second value.
	 * 
	 * @param a the first value
	 * @param b the second value
	 * @return true if a is less than b, false otherwise
	 */
	static function lt($a, $b) {
		return ( floatval($a) - floatval($b) < ( -1 * self::EPSILON ) );
	}
	
	/**
	 * Returns true if the first value is greater than the second value.
	 * 
	 * @param a the first value
	 * @param b the second value
	 * @return true if a is greater than b, false otherwise
	 */
	static function gt($a, $b) {
		return ( floatval($a) - floatval($b) > self::EPSILON );
	}
	
	/**
	 * Returns true if the first value is less than or equal to the second value.
	 * 
	 * @param a the first value
	 * @param b the second value
	 * @return true if a is less than or equal to b, false otherwise
	 */
	static function lteq($a, $b) {
		return self::lt($a, $b) || self::eq($a, $b);
	}
	
	/**
	 * Returns true if the first value is greater than or equal to the second value.
	 * 
	 * @param a the first value
	 * @param b the second value
	 * @return true if a is greater than or equal to b, false otherwise
	 */
	static function gteq($a, $b) {
		return self::gt($a, $b) || self::eq($a, $b);
	}
}