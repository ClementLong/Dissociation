<?php
/**
 * Provider
 * @author Clément Long <clmt.long@gmail.com>
 * Date: 01/06/2016
 */

//Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => APP_DB_HOST,
        'dbname'    => APP_DB_NAME,
        'user'      => APP_DB_USER,
        'password'  => APP_DB_PASS,
        'charset'   => 'utf8'
    ),
));
$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views/',
));

// UrlGenerator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Form
$app->register(new Silex\Provider\FormServiceProvider());

// Translation
$app->register(new Silex\Provider\TranslationServiceProvider());

// Validator
$app->register(new Silex\Provider\ValidatorServiceProvider());