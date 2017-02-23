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

    //HOME PAGE-ADD NEW RESTAURANT OR CUISINE
    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    //RESTAURANT PAGE & ROUTES-LIST AND DELETE RESTAURANTS
    $app->post('/restaurants', function() use ($app) {
        $id = null;
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quadrant = $_POST['quadrant'];
        $new_restaurant = new Restaurant($id, $name, $price, $quadrant);

        $new_restaurant->addRestaurant();

        $all_restaurants = Restaurant::getAllRestaurants();
        return $app['twig']->render('restaurants.html.twig', array('all_restaurants' => $all_restaurants));
    });

    $app->post('/delete_restaurants', function() use ($app) {
        Restaurant::deleteAllRestaurants();
        $all_restaurants = Restaurant::getAllRestaurants();
        return $app['twig']->render('restaurants.html.twig', array('all_restaurants' => $all_restaurants));
    });

    $app->delete('/delete_single_restaurant', function() use ($app) {
        $restaurant = $_POST['delete_single_restaurant'];
        $restaurant->deleteRestaurant();
        return $app['twig']->render('restaurants.html.twig');
    });

    //CUISINE PAGE & ROUTES-LIST AND DELETE CUISINES
    $app->post('/cuisines', function() use ($app) {
        $id = null;
        $type = $_POST['type'];
        $new_cuisine = new Cuisine($id, $type);

        $new_cuisine->addCuisine();

        $all_cuisines = Cuisine::getAllCuisines();
        return $app['twig']->render('cuisines.html.twig', array('cuisines' => $all_cuisines));
    });

    $app->post('/delete_cuisines', function() use ($app) {
        Cuisine::deleteAllCuisines();
        $all_cuisines = Cuisine::getAllCuisines();
        return $app['twig']->render('cuisines.html.twig', array('cuisines' => $all_cuisines));
    });







    return $app;
?>
