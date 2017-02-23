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

    // $app->get('/cuisines', function() use ($app) {
    //     $all_cuisines = Cuisine::getAllCuisines();
    //     return $app['twig']->render('cuisines.html.twig', array('cuisines' => $all_cuisines));
    // });

    $app->post('/delete', function() use ($app) {
        Restaurant::deleteAllRestaurants();
        return $app['twig']->render('restaurants.html.twig');
    });

    $app->delete('/delete_single_restaurant', function() use ($app) {
        $restaurant = $_POST['delete_single_restaurant'];
        $restaurant->deleteRestaurant();
        return $app['twig']->render('restaurants.html.twig');
    });

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

    $app->post('/cuisines', function() use ($app) {
        $id = null;
        $type = $_POST['type'];
        $new_cuisine = new Cuisine($id, $type);

        $new_cuisine->addCuisine();

        $all_cuisines = Cuisine::getAllCuisines();
        return $app['twig']->render('cuisines.html.twig', array('cuisines' => $all_cuisines));
    });

    return $app;
?>
