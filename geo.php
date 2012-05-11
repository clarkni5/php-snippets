<?php

/**
 *
 */
class Geo {

	const EARTH_RADIUS_MILES = 3959; // radius of the earth in miles
	const KILOMETER_CONVERSION = 0.621371192;
	
	/**
	 * Calculate the distance between two points (in miles).
	 */
	public static function distance($latLng1, $latLng2) {
		// Convert degrees to radians
		$lat1 = deg2rad($latLng1->lat);
		$lng1 = deg2rad($latLng1->lng);
		$lat2 = deg2rad($latLng2->lat);
		$lng2 = deg2rad($latLng2->lng);

		// Calculate the distance
		$distance = self::EARTH_RADIUS_MILES * acos(
            cos($lat2) * cos($lng2) * cos($lat1) * cos($lng1) +
            cos($lat2) * sin($lng2) * cos($lat1) * sin($lng1) +
            sin($lat2) * sin($lat1));
		
		$distance = is_nan($distance) ? 0 : round($distance, 2);
		
		return $distance;
	}

	/**
	 * Convert miles to kilometers.
	 */
	public static function kilometers($miles) {
		return $miles / self::KILOMETER_CONVERSION;
	}
	
	/**
	 * Convert kilometers to miles.
	 */
	public static function miles($kilometers) {
		return $kilometers * self::KILOMETER_CONVERSION;
	}
	
}

/**
 *
 */
class Geo_LatLng {

	public $lat;
	public $lng;
	
	/**
	 *
	 */
	public function __construct($lat, $lng) {
		$this->lat = $lat;
		$this->lng = $lng;
	}
	
	/**
	 *
	 */
	public function __toString() {
		return "{$this->lat}, {$this->lng}";
	}
	
	/**
	 *
	 */
	public function equals(self $other) {
		if (!empty($other)) {
			return $this->lat == $other->lat && $this->lng == $other->lng;
		} else {
			return false;
		}
	}
	
}

	// Example usage
	$google = new Geo_LatLng(37.423269, -122.082667);
	$apple = new Geo_LatLng(37.330550, -122.029700);

	echo Geo::distance($google, $apple);