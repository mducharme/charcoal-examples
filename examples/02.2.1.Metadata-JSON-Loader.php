<?php

use \Charcoal\Loader\MetadataLoader;
use \Charcoal\Model\Model;

include __DIR__.'/../vendor/autoload.php';

// Loading metadata manually
$metadata_loader = new MetadataLoader();
$metadata_loader->add_path(__DIR__.'/data/'); // We could also have used Charcoal::$config['metadata_path'];
$metadata_data = $metadata_loader->load('example01');

// Test
$model = new Model();
$model->set_metadata($metadata_data);

// Hello World!
echo $model->render('Hello {{test}}');
echo "\n\n";


