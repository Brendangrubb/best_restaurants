<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Restaurant.php';
    require_once __DIR__.'/../src/Cuisine.php';

    $server = 'mysql:host=localhost:8889;dbname=best_restaurants_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class NewRestaurantTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Cuisine::deleteAllCuisines();
            Restaurant::deleteAllRestaurants();
        }
        // Getter Tests
        function test_getId()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = '';
            $price = 0;
            $location = '';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $result = $test_Restaurant->getId();

            $this->assertEquals(true, is_numeric($result));
        }

        function test_getName()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = 3;
            $name = 'dots';
            $price = 0;
            $location = '';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);

            $result = $test_Restaurant->getName();

            $this->assertEquals('dots', $result);
        }

        function test_getPrice()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = 3;
            $name = 'dots';
            $price = 2;
            $location = '';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);

            $result = $test_Restaurant->getPrice();
            if ($result == 1) {
                $result = '$';
            } elseif ($result == 2) {
                $result = '$$';
            } elseif ($result == 3) {
                $result = '$$$';
            } else {
                $result = '$$$$';
            }

            $this->assertEquals('$$', $result);
        }

        function test_getQuadrant()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = 3;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);

            $result = $test_Restaurant->getQuadrant();

            $this->assertEquals('SE', $result);
        }

        function test_getCuisineId()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = '';
            $price = 0;
            $location = '';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $result = $test_Restaurant->getCuisineId();

            $this->assertEquals(true, is_numeric($result));
        }
        //End Getter Tests

        function test_addRestaurant()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);

            $test_Restaurant->addRestaurant();

            $result_array = array();
            array_push($result_array, $test_Restaurant);
            $getAll_array = Restaurant::getAllRestaurants();
            $this->assertEquals($getAll_array, $result_array);
        }

        function test_getAllRestaurants()
        {
            $result_array = array();

            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $id2 = null;
            $name2 = 'jam';
            $price2 = 1;
            $location2 = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant2 = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant2->addRestaurant();

            $getAll_array = Restaurant::getAllRestaurants();

            $this->assertEquals([$test_Restaurant, $test_Restaurant2], $getAll_array);
        }

        function test_deleteRestaurants()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $id2 = null;
            $name2 = 'jam';
            $price2 = 1;
            $location2 = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant2 = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant2->addRestaurant();

            Restaurant::deleteAllRestaurants();

            $getAll_array = Restaurant::getAllRestaurants();
            $this->assertEquals([], $getAll_array);
        }

        function test_updateRestaurant()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'bye and bye';
            $price = 1;
            $location = 'NE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);

            $test_Restaurant->addRestaurant();
            $test_Restaurant->updateRestaurant(4, 'SE');

            $getAll_array = Restaurant::getAllRestaurants();

            $this->assertEquals([$test_Restaurant->getId(), 4, 'SE'], [$getAll_array[0]->getId(), $getAll_array[0]->getPrice(), $getAll_array[0]->getQuadrant()]);
        }

        function test_deleteRestaurant()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'sweet hereafter';
            $price = 3;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $id2 = null;
            $name2 = 'departure';
            $price2 = 4;
            $location2 = 'SW';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant2 = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant2->addRestaurant();

            $test_Restaurant->deleteRestaurant();

            $getAll_array = Restaurant::getAllRestaurants();

            $this->assertEquals([$test_Restaurant2], $getAll_array);
        }

        function test_FindId()
        {
            $id = null;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);
            $new_cuisine->addCuisine();

            $id = null;
            $name = 'sweet hereafter';
            $price = 3;
            $location = 'SE';
            $cuisine_id = $new_cuisine->getId();
            $test_Restaurant = new Restaurant($id, $name, $price, $location, $cuisine_id);
            $test_Restaurant->addRestaurant();

            $name2 = 'restaurant';
            $test_Restaurant2 = new Restaurant($id, $name2, $price, $location, $cuisine_id);
            $test_Restaurant2->addRestaurant();

            $result = Restaurant::find($test_Restaurant->getId());

            $this->assertEquals($test_Restaurant, $result);
        }
    }
?>
