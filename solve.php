<?php

	/**
	 * This is just for fun... solving basic programming interview questions.
	 */


	/**
	 * FizzBuzz
	 *
	 * "Write a program that prints the numbers from 1 to 100. But for multiples
	 * of three print "Fizz" instead of the number and for the multiples of five
	 * print "Buzz". For numbers which are multiples of both three and five 
	 * print "FizzBuzz".
	 */
	for ($i = 1; $i <= 100; $i++) {
		$fizz = ($i % 3 == 0) ? 'Fizz' : '';
		$buzz = ($i % 5 == 0) ? 'Buzz' : '';
		echo ($fizz || $buzz) ? $fizz . $buzz : $i;
		echo "\n";
	}
	
	
	/**
	 * Reverse a string (as a function).
	 */
	function reverse($str) {
		$reversed = '';
		for ($n = strlen($str), $i = 0; $i < $n; $i++) {
			$reversed = $str[$i] . $reversed;
		}
		return $reversed;
	}
	echo reverse('this is a string') . "\n";
	
	
	/**
	 * Reverse a string (in place).
	 */
	$str = 'this is a string';
	for ($i = 0, $j = strlen($str) - 1; $i < $j; $i++, $j--) {
		$tmp = $str[$i];
		$str[$i] = $str[$j];
		$str[$j] = $tmp;
	}
	echo $str . "\n";
	
	
	/**
	 * Reverse the words in a sentence.
	 */
	$str = 'The quick brown fox jumps over the lazy dog'; // no punctuation makes this easier
	echo implode(array_reverse(explode(' ', $str)), ' ') . "\n";
	
	
	/**
	 * Find the minimum value in a list.
	 */
	$foo = array(8, 37, 22, 17, 5, -19);
	$min_value = reset($foo); // do not initialize this to zero!
	foreach ($foo as $value) {
		$min_value = min($min_value, $value);
	}
	echo $min_value . "\n";
	
	
	/**
	 * Find the maximum value in a list.
	 */
	$foo = array(8, 37, 22, 17, 5, -19);
	$max_value = reset($foo); // do not initialize this to zero!
	foreach ($foo as $value) {
		$max_value = max($max_value, $value);
	}
	echo $max_value . "\n";
	
	
	/**
	 * Calculate a remainder given a numerator and denominator.
	 */
	$numerator = 53;
	$denominator = 4;
	echo $numerator % $denominator . "\n";
	
	
	/**
	 * Return distinct values from a list.
	 */
	$foo = array(8, 5, 4, 8, 13, 4, 5, 4);
	$distinct = array();
	foreach ($foo as $value) {
		if (!in_array($value, $distinct)) {
			$distinct[] = $value;
		}
	}
	echo implode($distinct, ', ') . "\n";
	
	
	/**
	 * Return distinct values and their counts.
	 */
	$foo = array(8, 5, 4, 8, 13, 4, 5, 4);
	$distinct = array();
	foreach ($foo as $value) {
		if (!array_key_exists($value, $distinct)) {
			$distinct[$value] = 0;
		}
		$distinct[$value]++;
	}
	echo implode(array_map(function($value, $count) { return "$value($count)"; }, array_keys($distinct), $distinct), ', ') . "\n";
	
	
	/**
	 * Evaluate an string of expressions (variables, +, -) for a given set of 
	 * values (a = 36, b = 2, c = 1, d = 4).
	 */
	$statement = 'a + b + c - d + b';
	$values = 'a = 36, b = 2, c = 1, d = 4';
	
	// Get variables
	preg_match_all('/(\w+) = (\d+)/', $values, $matches);
	for ($i = 0, $n = count($matches[1]); $i < $n; $i++) {
		$variables[$matches[1][$i]] = $matches[2][$i];
	}
	
	// Evaluate the statement
	$result = 0;
	$operator = '+'; // the current operator
	$expressions = explode(' ', $statement);
	foreach ($expressions as $expression) {
		if (in_array($expression, array('+', '-'))) {
			$operator = $expression;
		} else {
			$value = $variables[$expression]; // translate the variable into a value
			switch ($operator) {
			case '-':
				$result -= $value;
				break;
			case '+':
			default:
				$result += $value;
			}
		}
	}
	echo $result ."\n";

	
	/**
	 * Fibonacci number: F(n) = F(n - 1) + F(n - 2)
	 */
	function fibonacci($n) {
		return ($n < 2) ? 1 : fibonacci($n - 1) + fibonacci($n - 2);
	}
	echo fibonacci(5) . "\n";
	
	
	/**
	 * For the future...
	 * Find the index of the first occurrence of a substring in a string.
	 * Build a list of prime numbers.
	 */