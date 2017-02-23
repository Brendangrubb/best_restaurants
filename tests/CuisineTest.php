<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__.'/../src/Cuisine.php';

    $server = 'mysql:host=localhost:8889;dbname=best_restaurants_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CuisineTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Cuisine::deleteAllCuisines();
            Restaurant::deleteAllRestaurants();
        }

        function test_getId()
        {
            $id = 1;
            $type = 'Italian';
            $new_cuisine = new Cuisine($id, $type);

            $result = $new_cuisine->getId();

            $this->assertEquals(1, $result);
        }

        function test_getType()
        {
            $id = 4;
            $type = 'Vietnamese';
            $new_cuisine = new Cuisine($id, $type);

            $result = $new_cuisine->getType();

            $this->assertEquals('Vietnamese', $result);
        }

        function test_addCuisine()
        {
            $id = null;
            $type = 'Thai';
            $test_Cuisine = new Cuisine($id, $type);

            $test_Cuisine->addCuisine();

            $result_array = array();
            array_push($result_array, $test_Cuisine);
            $getAll_array = Cuisine::getAllCuisines();
            $this->assertEquals($getAll_array, $result_array);
        }

        function test_getAllCuisines()
        {
            $result_array = array();

            $id = null;
            $name = 'German';
            $test_Cuisine = new Cuisine($id, $name);
            $test_Cuisine->addCuisine();

            $id2 = null;
            $name2 = 'Irish';
            $test_Cuisine2 = new Cuisine($id, $name);
            $test_Cuisine2->addCuisine();

            $getAll_array = Cuisine::getAllCuisines();

            $this->assertEquals([$test_Cuisine, $test_Cuisine2], $getAll_array);
        }

        function test_deleteCuisines()
        {
            $id = null;
            $name = 'American';
            $test_Cuisine = new Cuisine($id, $name);
            $test_Cuisine->addCuisine();

            $id2 = null;
            $name2 = 'Mongolian';
            $test_Cuisine2 = new Cuisine($id, $name);
            $test_Cuisine2->addCuisine();

            Cuisine::deleteAllCuisines();

            $getAll_array = Cuisine::getAllCuisines();
            $this->assertEquals([], $getAll_array);
        }

        function test_deleteCuisine()
        {
            $id = null;
            $name = 'French';
            $test_Cuisine = new Cuisine($id, $name);
            $test_Cuisine->addCuisine();

            $id2 = null;
            $name2 = 'Canadian';
            $test_Cuisine2 = new Cuisine($id, $name);
            $test_Cuisine2->addCuisine();

            $test_Cuisine->deleteCuisine();

            $getAll_array = Cuisine::getAllCuisines();

            $this->assertEquals([$test_Cuisine2], $getAll_array);
        }
    }
?>
