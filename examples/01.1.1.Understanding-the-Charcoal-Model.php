<?php

use \Charcoal\Model\Model as Model;

include __DIR__.'/../vendor/autoload.php';

$metadata_data = [
	// Model attributes (properties) are defined in meta-data `properties`
	'properties'=>[
		'id'=>[
			'type'=>'id',
			'label'=>[
				'en'=>'ID'
			]
		],
		'test'=>[
			'type'=>'string',
			'min_length'=>4,
			'max_length'=>20
		]
	],
	// Default values can be set in `data`
	'data'=>[
		'id'=>0,
		'test'=>''
	]
];

$model_data = [
	'id'=>2,
	'test'=>'World!'
];

$model = new Model();
$model->set_metadata($metadata_data);
$model->set_data($model_data);

// Hello World
echo 'Hello '.$model->test."\n";
echo "\n";

// The Model now has the data. Accessing it directly
echo 'Model ID: '.$model->id."\n";
echo 'Test value: '.$model->test."\n";
echo "\n";

// The data can also be accessed through properties (\Charcoal\Model\Property)
echo 'Model ID: '.$model->property('id')->val()."\n";
echo 'Test value: '.$model->property('test')->val()."\n";
echo "\n";

// Property can be used directly
$id = $model->property('id');
$test = $model->property('test');
echo 'ID class: '.get_class($id)."\n";
echo 'Test class: '.get_class($test)."\n";
echo "\n";

// Accessing the Metadata.
$metadata = $model->metadata();
printf("There are -%d- properties defined in metadata\n", count($metadata['properties']));
echo "\n";
