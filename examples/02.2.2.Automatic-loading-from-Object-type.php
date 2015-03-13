<?php

use \Charcoal\Charcoal as Charcoal;
use \Charcoal\Model\Model as Model;

include __DIR__.'/../vendor/autoload.php';

// This example works because the metadata_path is set properly
Charcoal::$config['metadata_path'] = [
	__DIR__.'/data/',
];

// Loading metadata automatically
$model = new Model('example01');

// Hello World!
echo $model->render('Hello {{test}}');
echo "\n\n";

