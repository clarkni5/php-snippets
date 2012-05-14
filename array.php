<?php

	/**
	 * Remove the key from the array.
	 *
	 * @param array $input The array to remove the key from.
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

	
	/**
	 * Determine whether an array is empty, including multidimensional arrays.
	 *
	 * @param array The array to be checked.
	 *
	 * @return bool TRUE if the array has no values, FALSE otherwise.
	 */
	function array_empty($input) {
		if (is_array($input)) {
			foreach ($input as $value) {
				if (!array_empty($value)) {
					return false;
				}
			}
			
			return true;
		} else {
			// When the input value is not an array, it is an array value from 
			// the recursive call to array_empty. Even if the value is 0 or null,
			// we consider it a value that makes the array not empty.
			return false;
		}
	}
	
	// Example usage
	$foo = array('bar' => array());
	var_dump(array_empty($foo));