<?php

	/**
	 * Generated a random pronounceable password.
	 *
	 * @param int $length The length of the generated password.
	 *
	 * @return A pronounceable password.
	 */
	function generate_password($length = 8) {
		$vowels = array('a','e','i','o','u');
		$consonants = array('b','c','d','g','h','j','k','l','m','n','p','r','s','t',
			'u','v','w','tr','cr','br','fr','th','dr','ch','ph','wr','st','sp',
			'sw','pr','sl','cl');

		$num_vowels = count($vowels);
		$num_consonants = count($consonants);

		$password = '';
		for ($i = 0; $i < $length; $i++) {
			$password .= $consonants[rand(0, $num_consonants - 1)] . $vowels[rand(0, $num_vowels - 1)];
		}
		$password = substr($password, 0, $length);

		return $password;
	}
	
	// Example usage
	
	echo generate_password();