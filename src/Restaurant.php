<?php
    class Restaurant
    {
        private $id;
        private $name;
        private $price;
        private $quadrant;
        private $cuisine_id;

        function __construct($id = null, $name, $price, $quadrant, $cuisine_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->quadrant = $quadrant;
            $this->cuisine_id = $cuisine_id;
        }
        // ID getter
        function getId()
        {
            return $this->id;
        }

        // CATEGORY ID getter
        function getCuisineId()
        {
            return $this->cuisine_id;
        }

        //Name setter & getter
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }
        //Price setter & getter
        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function getPrice()
        {
            return $this->price;
        }
        //Quadrant setter & getter
        function setQuadrant($new_quadrant)
        {
            $this->quadrant = $new_quadrant;
        }

        function getQuadrant()
        {
            return $this->quadrant;
        }

        function addRestaurant()
        {
            $GLOBALS['DB']->exec("INSERT INTO restaurants (name, price, quadrant, cuisine_id) VALUES ('{$this->getName()}', {$this->getPrice()}, '{$this->getQuadrant()}', {$this->getCuisineId()});");
            $this->id = $GLOBALS['DB']->lastInsertID();
        }

        static function getAllRestaurants()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
            $all_restaurants = array();

            foreach ($returned_restaurants as $restaurant) {
                $id = $restaurant['id'];
                $name = $restaurant['name'];
                $price = $restaurant['price'];
                $quadrant = $restaurant['quadrant'];
                $cuisine_id = $restaurant['cuisine_id'];
                $new_restaurant = new Restaurant($id, $name, $price, $quadrant, $cuisine_id);

                array_push($all_restaurants, $new_restaurant);
            }

            return $all_restaurants;
        }

        static function deleteAllRestaurants()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants;");
        }

        function updateRestaurant($price_to_change, $quadrant_to_change)
        {
            if ($price_to_change != null) {
                $GLOBALS['DB']->exec("UPDATE restaurants SET price = {$price_to_change} WHERE id = {$this->getId()};");
            }
            if ($quadrant_to_change != null) {
                $GLOBALS['DB']->exec("UPDATE restaurants SET quadrant = '{$quadrant_to_change}' WHERE id = {$this->getId()};");
            }
        }

        function deleteRestaurant()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE id = {$this->getId()};");
        }

        static function find($search_id)
        {
            $found_restaurant = null;
            $restaurants = Restaurant::getAllRestaurants();
            foreach($restaurants as $restaurant) {
                $restaurant_id = $restaurant->getId();
                if ($restaurant_id == $search_id) {
                  $found_restaurant = $restaurant;
                }
            }
            return $found_restaurant;
        }
    }
?>
