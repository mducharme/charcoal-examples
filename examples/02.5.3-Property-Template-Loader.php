<?php

use \Charcoal\Charcoal as Charcoal;
use \Charcoal\Model\Model as Model;
use \Charcoal\Model\Property as Property;
use \Charcoal\Property\View as PropertyView;
use \Charcoal\Property\ViewController as PropertyViewController;

include __DIR__.'/../vendor/autoload.php';

// This example works because the metadata_path is set properly
Charcoal::$config['views_path'] = [
	__DIR__.'/views/'
];

// This example works because the metadata_path is set properly
Charcoal::$config['metadata_path'] = [
	__DIR__.'/data/'
];

// Loading metadata automatically
$model = new Model('example01');

$property = $model->p('test');
echo $property->render_template('input.text');

