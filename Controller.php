<?php
/**
 * Routing
 * @author Clément Long <clmt.long@gmail.com>
 * Date: 22/06/2016
 */

use Model\Text;

// Home
$app->get('/', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    // View
    $data = array(
        'data' => $MyprettyText
    );

    return $app['twig']->render('pages/home.twig', $data);
})->bind('home');


// Intro
$app->get('/intro', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    // View
    $data = array(
        'data' => $MyprettyText
    );

    return $app['twig']->render('pages/intro.twig', $data);
})->bind('intro');


// Map
$app->get('/map', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    // View
    $data = array(
        'data' => $MyprettyText,
        'final' => '0'
    );

    return $app['twig']->render('pages/map.twig', $data);
})->bind('map');


// Story
$app->match('/story1/', function() use ($app)
{
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/story.twig', $data);
})
    ->bind('story1');

// Story
$app->match('/story2/', function() use ($app)
{
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/story2.twig', $data);
})
    ->bind('story2');


// CGD
$app->match('/cgd', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    // View
    $data = array(
        'data' => $MyprettyText
    );

    return $app['twig']->render('pages/cgd.twig', $data);
})
    ->bind('cgd');


// Error
$app->error(function (\Exception $e, $code) use ($app)
{
    if($app['debug'] == true)
        die($e);
    return $app['twig']->render('pages/error.twig');
});