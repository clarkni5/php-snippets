<?php

namespace Geo;

/**
 * Geo utilities for calculating distances.
 */
class Util {

	const EARTH_RADIUS_MILES = 3959; // radius of the earth in miles
	const KILOMETER_CONVERSION = 0.621371192;
	
	/**
	 * Calculate the distance between two points (in miles).
	 *
	 * @param Geo_LatLng $lat_lng1 The first point.
	 * @param Geo_LatLng $lat_lng2 The second point.
	 *
	 * @return float The distance in miles, rounded to 2 decimal places.
	 */
	public static function distance($lat_lng1, $lat_lng2) {
		// Convert degrees to radians
		$lat1 = deg2rad($lat_lng1->lat);
		$lng1 = deg2rad($lat_lng1->lng);
		$lat2 = deg2rad($lat_lng2->lat);
		$lng2 = deg2rad($lat_lng2->lng);

		// Calculate the distance
		$distance = self::EARTH_RADIUS_MILES * acos(
			cos($lat2) * cos($lng2) * cos($lat1) * cos($lng1) +
			cos($lat2) * sin($lng2) * cos($lat1) * sin($lng1) +
			sin($lat2) * sin($lat1));
		
		$distance = is_nan($distance) ? 0 : $distance;
		
		return $distance;
	}

	/**
	 * Convert miles to kilometers.
	 *
	 * @param float $miles The distance in miles.
	 *
	 * @return float The distance in kilometers.
	 */
	public static function kilometers($miles) {
		return $miles / self::KILOMETER_CONVERSION;
	}
	
	/**
	 * Convert kilometers to miles.
	 *
	 * @param float $kilometers The distance in kilometers.
	 *
	 * @return float The distance in miles.
	 */
	public static function miles($kilometers) {
		return $kilometers * self::KILOMETER_CONVERSION;
	}
	
}
