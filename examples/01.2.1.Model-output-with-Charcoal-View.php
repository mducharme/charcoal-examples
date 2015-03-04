<?php

use \Charcoal\Model\Model as Model;
use \Charcoal\Model\View as View;
use \Charcoal\Model\ViewController as ViewController;

include __DIR__.'/../vendor/autoload.php';

$metadata_data = [
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

$template = "Hello {{test}}";

// Hello World!
echo $model->render($template);
echo "\n\n";

// Accessing property (Hello world pt. 2)
echo $model->render('Hello {{p.test.val}}');
echo "\n\n";

// View and controllers are abstracted / hidden. How to put it all together manually?
$view = new View();
$controller = new ViewController($model);
echo $view->render($template, $controller);
echo "\n\n";

// Alternative (preferred): Getting the property controller manually from the model
$controller = ViewController::get($model);
echo $view->render($template, $controller);
echo "\n\n";