<?php

$all = glob('examples/*.php');


foreach($all as $f) {
	echo "\033[0;32m";
	echo "Running ".$f."...\n";
	echo "\033[0m";

	// Show source
	echo "\033[0;37m";
	echo file_get_contents($f)."\n";
	echo "\033[0m";

	$start_time = microtime(true);
	system('php '.$f);
	$end_time = microtime(true);

	echo "\033[0;33m";
	echo "\n".'Example ran in '.(($end_time - $start_time)*1000).' milliseconds';	
	echo "\033[0m";

	echo "\n\n";
}
