<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../src/Restaurant.php';
    require_once __DIR__.'/../src/Cuisine.php';
    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=best_restaurants';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../views'));



    //INDEX ROUTES

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAllCuisines()));
    });

    $app->get('/restaurants', function() use ($app) {
        return $app['twig']->render('restaurants.html.twig');
    });

    $app->post('/cuisines', function() use ($app) {
        $cuisine = new Cuisine($id = null, $_POST['type']);
        $cuisine->addCuisine();

        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAllCuisines()));
    });

    $app->get('/cuisine/{id}', function($id) use ($app) {
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->getAllRestaurants()));
    });

    $app->post('/restaurants', function() use ($app) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quadrant = $_POST['quadrant'];
        $cuisine_id = $_POST['cuisine_id'];
        $restaurant = new Restaurant($id = null, $name, $price, $quadrant, $cuisine_id);
        $restaurant->addRestaurant();
        $cuisine = Cuisine::find($cuisine_id);

        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'restaurants' => $restaurant->getAllRestaurants()));
    });

    $app->post('/delete_restaurants', function() use ($app) {
        $cuisine = Cuisine::getAllCuisines();
        Restaurant::deleteAllRestaurants();
        return $app['twig']->render('index.html.twig', array('cuisines' => $cuisine));
    });

    $app->post('/delete_cuisines', function() use ($app) {
        Cuisine::deleteAllCuisines();
        $cuisine = Cuisine::getAllCuisines();
        return $app['twig']->render('index.html.twig', array('cuisines' => $cuisine));
    });

    return $app;
?>
