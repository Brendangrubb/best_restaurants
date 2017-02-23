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

        
    }
?>
