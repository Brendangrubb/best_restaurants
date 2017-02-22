<?php
    require_once __DIR__.'/../src/Restaurant.php';

    class NewRestaurantTest extends PHPUnit_Framework_TestCase
    {
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

        // function test_Price()
        // {
        //
        // }
        //
        // function test_Quadrant()
        // {
        //
        // }


    }
?>
