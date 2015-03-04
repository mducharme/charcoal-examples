<?php

use \Charcoal\Charcoal as Charcoal;
use \Charcoal\Model\Source as Source;
use \Charcoal\Loader\CollectionLoader as CollectionLoader;

include __DIR__.'/../vendor/autoload.php';

// This should be read from a config file
Charcoal::$config['databases'] = [
	'default'=>[
		'database'=>'charcoal_examples',
		'username'=>'root',
		'password'=>''
	]
];
Charcoal::$config['default_database'] = 'default';

// Set up sources
$source = new Source();
//$source->set_type('mysql');
//$source->set_database('default');
$source->set_table('tests');

$loader = new CollectionLoader();
$loader->set_source($source)
	->set_properties(['id', 'test'])
	//->add_filter('test', 10, ['operator'=>'<'])
	->add_order('test', 'asc')
	->set_page(1)
	->set_num_per_page(25);

$collection = $loader->load();

foreach($collection as $obj) {
	echo $obj->render('Hello {{id}}. Your test value is {{test}}');
	echo "\n";
}