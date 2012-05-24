<?php

	require_once('Float.php');
	require_once('Probability.php');

	// Example usage
	$a = 2.5;
	$b = 5 / 2;
	var_dump(Math\Float::eq($a, $b));
	
	var_dump(Math\Probability::normdist(1.53, 1.5, 0.1));