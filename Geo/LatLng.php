<?php

namespace Geo;

/**
 *
 */
class LatLng {

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
