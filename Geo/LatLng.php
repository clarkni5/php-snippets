<?php

namespace Geo;

/**
 * A lat/lng coordinate.
 */
class LatLng {

	public $lat;
	public $lng;
	public $accuracy; // in meters
	
	/**
	 * Create a new coordinate.
	 *
	 * @param float $lat The latitude.
	 * @param float $lng The longitude.
	 * @param int $accuracy The accuracy of the coordinate in meters.
	 */
	public function __construct($lat, $lng, $accuracy = null) {
		$this->lat = $lat;
		$this->lng = $lng;
		$this->accuracy = $accuracy;
	}
	
	/**
	 * Convert to a string.
	 */
	public function __toString() {
		return "{$this->lat}, {$this->lng}" . isset($this->accuracy) ? " ({$this->accuracy}m)" : '';
	}
	
	/**
	 * Return true if the given point represent the same coordinate. This only
	 * matches lat/lng and ignores accuracy.
	 */
	public function equals(self $other) {
		if (!empty($other)) {
			return $this->lat == $other->lat && $this->lng == $other->lng;
		} else {
			return false;
		}
	}
	
}
