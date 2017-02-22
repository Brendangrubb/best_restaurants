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

        function test_Price()
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

        function test_Quadrant()
        {
            $id = 3;
            $name = 'dots';
            $price = 2;
            $location = 'SE';
            $test_Restaurant = new Restaurant($id, $name, $price, $location);

            $result = $test_Restaurant->getQuadrant();

            $this->assertEquals('SE', $result);
        }


    }
?>
