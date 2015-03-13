<?php

$all = glob('examples/*.php');

function color($color)
{
	$colors = [
		'green'=>'0;32',
		'gray'=>'0;37',
		'brown'=>'0;33'
	];
	$code = $colors[$color];
	return "\033[".$code."m";
}

function reset_color()
{
	return "\033[0m";
}

foreach($all as $f) {
	echo color('green');
	echo "Running ".$f."...\n";

	// Show source
	echo color('gray');
	echo file_get_contents($f)."\n";
	
	echo reset_color();

	$start_time = microtime(true);
	system('php '.$f);
	$end_time = microtime(true);

	echo color('brown');
	echo "\n".'Example ran in '.(($end_time - $start_time)*1000).' milliseconds';	
	
	echo reset_color();
	echo "\n\n";
}
