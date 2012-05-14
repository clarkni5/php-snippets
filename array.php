<?php

	/**
	 * Remove the key from the array.
	 *
	 * @param array $input The array to remove the value from.
	 * @param mixed $key The key to remove from the array. An array may be used to designate multiple keys.
	 *
	 * @return array The array with the key removed.
	 */
	function array_remove_key($input, $key) {
		// Convert a single value key into an array
		if (!is_array($key)) {
			$key = array($key);
		}
		
		// Remove keys from the array
		foreach ($key as $k) {
			unset($input[$k]);
		}
		
		return $input;
	}
	
	// Example usage
	$foo = array(
		'name' => 'Nick',
		'location' => 'Portland, OR',
		'sky' => 'Blue'
	);
	
	$foo = array_remove_key($foo, 'sky');
