<?php
/**
 * Routing
 * @author Clément Long <clmt.long@gmail.com>
 * Date: 22/06/2016
 */

use Model\Text;
use Model\getPictures;

session_start();

if( empty($_SESSION['carnet']) )
    $_SESSION['carnet'] = [];

// Home
$app->get('/', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    session_destroy();
    $_SESSION['carnet'] = [];
    $_SESSION['experience'] = '0';

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

//    $carnet = [
//        ['url' => 'experience1'],
//        ['url' => 'experience2'],
//    ];

    if(!empty($_SESSION['carnet']))
        $carnet = $_SESSION['carnet'];
    else
        $carnet = [];

    if(!empty($_SESSION['experience']))
        $session = $_SESSION['experience'];
    else
        $session = '0';

    // View
    $data = array(
        'data' => $MyprettyText,
        'final' => $session,
        'carnet' => $carnet
    );

    return $app['twig']->render('pages/map.twig', $data);
})->bind('map');


// Story 1
$app->match('/experience1/', function() use ($app)
{
    // View
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience1'];

    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex1.twig', $data);
})
    ->bind('experience1');

// Story 2
$app->match('/experience2/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience2'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex2.twig', $data);
})
    ->bind('experience2');


// Story 3
$app->match('/experience3/', function() use ($app)
{

    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience3'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex3.twig', $data);
})
    ->bind('experience3');

// Story 4
$app->match('/experience4/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience4'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex4.twig', $data);
})
    ->bind('experience4');


// Story 5
$app->match('/experience5/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience5'];

    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex5.twig', $data);
})
    ->bind('experience5');


// Story 6
$app->match('/experience6/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience6'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex6.twig', $data);
})
    ->bind('experience6');


// Story 7
$app->match('/experience7/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience7'];
    // View
    $getPicturesModel = new getPictures();
    $getPictures = $getPicturesModel->getPictures();

    $data = array(
        'pictures' => $getPictures
    );

    return $app['twig']->render('pages/ex7.twig', $data);
})
    ->bind('experience7');


// Story 8
$app->match('/experience8/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience8'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex8.twig', $data);
})
    ->bind('experience8');


// Story 9
$app->match('/experience9/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience9'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex9.twig', $data);
})
    ->bind('experience9');


// Story 10
$app->match('/experience10/', function() use ($app)
{
    $_SESSION['experience'] = strval(1 + intval($_SESSION['experience']));
    $_SESSION['carnet'][] = ['url' => 'experience10'];
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/ex10.twig', $data);
})
    ->bind('experience10');

// End
$app->match('/end/', function() use ($app)
{
    // View
    $data = array(
        'data' => 'test',
    );

    return $app['twig']->render('pages/end.twig', $data);
})
    ->bind('end');


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