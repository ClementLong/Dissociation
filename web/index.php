<?php
/**
 * Partiel PHP/Silex
 * @author Clément Long <clmt.long@gmail.com>
 * Date: 21/06/2016
 */

//phpinfo();
error_reporting(-1);

// Add autoload
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . '/../models/Text.class.php';
require_once __DIR__. '/../models/upload.php';

// Config
$app = new Silex\Application();
require_once __DIR__ . '/../Config.php';
require_once __DIR__ . '/../Provider.php';

// Init pageController
require_once __DIR__ . '/../Controller.php';


// Run silex
$app->run();