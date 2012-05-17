<?php

	require_once('LatLng.php');
	require_once('Util.php');

	// Example usage
	$google = new Geo\LatLng(37.423269, -122.082667);
	$apple = new Geo\LatLng(37.330550, -122.029700);

	echo Geo\Util::distance($google, $apple);