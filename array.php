<?php

	/**
	 * Remove the given key or keys from the array.
	 *
	 * @param array $input The input array.
	 * @param mixed $keys The key (single value) or keys (an array of values) to remove from the input array.
	 *
	 * @return The array with the given keys removed.
	 */
	function array_remove($input, $keys) {
		if ( ! is_array($keys)) {
			$keys = array($keys);
		}
		foreach ($keys as $key) {
			unset($input[$key]);
		}
		return $input;
	}
	
	// Example usage
	$foo = array(
		'name' => 'Nick',
		'location' => 'Portland, OR',
		'sky' => 'Blue'
	);
	
	$foo = array_remove($foo, 'sky');
