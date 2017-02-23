<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../src/Restaurant.php';
    require_once __DIR__.'/../src/Cuisine.php';
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=best_restaurants';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../views'));

    $app->get('/', function() use ($app) {

        return $app['twig']->render('index.html.twig');
    });

    $app->get('/cuisines', function() use ($app) {
        $all_cuisines = Cuisine::getAllCuisines();
        return $app['twig']->render('cuisines.html.twig', array('cuisines' => $all_cuisines));
    });

    $app->get('/restaurants', function() use ($app) {
        $all_restaurants = Restaurant::getAllRestaurants();
        return $app['twig']->render('restaurants.html.twig', array('restaurants' => $all_restaurants));
    });

    return $app;
?>
