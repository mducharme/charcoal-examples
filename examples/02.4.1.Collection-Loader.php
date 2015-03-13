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
$source->set_table('tests');

$loader = new CollectionLoader();
$loader->set_source($source)
	->set_properties(['id', 'test'])
	->add_filter([
		'property'=>'test2', 
		'val'=>10,
		'operator'=>'<'
	])
	->add_filter([
		'string'=>'(`id` > 90)',
		'operand'=>'or'
	])
	->add_order([
		'property'=>'id', 
		'mode'=>'asc'
	])
	->set_cache_key('cache-key-123')
	->set_page(1)
	->set_num_per_page(25);

$collection = $loader->load();

foreach($collection as $obj) {
	echo $obj->render('Hello {{id}}. Your test value is {{test}}');
	echo "\n";
}

echo "\n";

$list_config = [
	'properties'=>['id', 'test'],
	'properties_options'=>[],
	'filters'=>[
		[
			'property'=>'test2',
			'val'=>10,
			'operator'=>'>'
		],
		[
			'string'=>'(`id` < 10)',
			'operand'=>'or'
		]
	],
	'orders'=>[
		[
			'property'=>'id',
			'mode'=>'desc'
		]
	],
	'pagination'=>[
		[
			'page'=>1,
			'num_per_page'=>25
		]
	]
];

$loader = new CollectionLoader();
$loader->set_source($source);
$loader->set_data($list_config);

$collection = $loader->load();

foreach($collection as $obj) {
	echo $obj->render('Hello {{id}}. Your test value is {{test}}');
	echo "\n";
}