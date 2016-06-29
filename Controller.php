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

// Home
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

// Home
$app->get('/map', function() use ($app)
{
    $MyPrettyJSON = new Text($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $MyprettyText = $MyPrettyJSON->getText();

    // View
    $data = array(
        'data' => $MyprettyText
    );

    return $app['twig']->render('pages/map.twig', $data);
})->bind('map');


// Story
$app->match('/story/{slug}', function($slug) use ($app)
{
    // View
    $data = array(
        'data' => $slug,
    );

    return $app['twig']->render('pages/story.twig', $data);
})
    ->assert('type', '/w')
    ->bind('story');

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
    ->bind('story');

//
//// Promo
//$app->get('/promo', function() use ($app)
//{
//    $years = new StudentModel($app['db']);
//    $allYears = $years->getAllYear();
//
//    // View
//    $data = array(
//        'data' => $allYears
//    );
//
//    return $app['twig']->render('pages/promo.twig', $data);
//})->bind('promo');
//
//// Students
//$app->get('/students', function() use ($app)
//{
//    $students = new StudentModel($app['db']);
//    $allStudents = $students->getAllStudent();
//
//    // View
//    $data = array(
//        'data' => $allStudents
//    );
//
//    return $app['twig']->render('pages/students.twig', $data);
//})->bind('students');
//
//
//// Student
//$app->match('/student/{slug}', function($slug, Symfony\Component\HttpFoundation\Request $request) use ($app)
//{
//    $student = new StudentModel($app['db']);
//
//    // Create From
//    $form_builder = $app['form.factory']->createBuilder();
//
//    $form_builder->setMethod('post');
//    $form_builder->setAction($app['url_generator']->generate('student', array('slug' => $slug) ));
//
//    $form_builder->add('dev','number');
//    $form_builder->add('design','number');
//    $form_builder->add('market','number');
//    $form_builder->add('culture','number');
//    $form_builder->add('submit','submit');
//
//    $form = $form_builder->getForm();
//
//    $form->handleRequest($request);
//
//    if($form->isSubmitted())
//    {
//        $form_data = $form->getData();
//
//        if($form->isValid())
//        {
//            $student->update($form_data['dev'], $form_data['design'], $form_data['market'], $form_data['culture'], $slug);
//        }
//    }
//
//    $theStudent = $student->getStudent($slug);
//
//    // View
//    $data = array(
//        'data' => $theStudent,
//        'form' => $form->createView()
//    );
//
//    return $app['twig']->render('pages/student.twig', $data);
//})
//    ->assert('type', '/w')
//    ->bind('student');
//
//// Error
//$app->error(function (\Exception $e, $code) use ($app)
//{
//    if($app['debug'] == true)
//        die($e);
//    return $app['twig']->render('pages/error.twig');
//});