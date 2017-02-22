<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Restaurant.php';

    $server = 'mysql:host=localhost:8889;dbname=best_restaurants_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class NewRestaurantTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
          Restaurant::deleteAllRestaurants();
        }
        //Getter Tests
        function test_getId()
        {
            $id = 3;
            $name = '';
            $price = 0;
            $location = '';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

            $result = $test_Restaurant->getId();

            $this->assertEquals(3, $result);
        }

        function test_getName()
        {
            $id = 3;
            $name = 'dots';
            $price = 0;
            $location = '';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

            $result = $test_Restaurant->getName();

            $this->assertEquals('dots', $result);
        }

        function test_getPrice()
        {
            $id = 3;
            $name = 'dots';
            $price = 2;
            $location = '';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

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
            $id = 3;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

            $result = $test_Restaurant->getQuadrant();

            $this->assertEquals('SE', $result);
        }
        //End Getter Tests

        function test_addRestaurant()
        {
            $id = null;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

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
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);
            $test_Restaurant->addRestaurant();

            $id2 = null;
            $name2 = 'jam';
            $price2 = 1;
            $location2 = 'SE';
            $test_Restaurant2 = new Restaurant($id, $name, $price, $location);
            $test_Restaurant2->addRestaurant();

            $getAll_array = Restaurant::getAllRestaurants();

            $this->assertEquals([$test_Restaurant, $test_Restaurant2], $getAll_array);
        }

        function test_deleteRestaurants()
        {
            $id = null;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);
            $test_Restaurant->addRestaurant();

            $id2 = null;
            $name2 = 'jam';
            $price2 = 1;
            $location2 = 'SE';
            $test_Restaurant2 = new Restaurant($id, $name, $price, $location);
            $test_Restaurant2->addRestaurant();

            Restaurant::deleteAllRestaurants();

            $getAll_array = Restaurant::getAllRestaurants();
            $this->assertEquals([], $getAll_array);

        }

    }
?>
