<?php
    class Cuisine
    {
        private $id;
        private $type;

        function __construct($id = null, $type)
        {
            $this->id = $id;
            $this->type = $type;
        }

        function getId()
        {
            return $this->id;
        }

        function setType($new_type)
        {
            $this->type = $new_type;
        }

        function getType()
        {
            return $this->type;
        }

        function deleteCuisines()
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id = {$this->getId()};");
        }

        static function deleteAllCuisines()
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines;");
        }

        static function getAllCuisines()
        {
            $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
            $all_cuisines = array();

            foreach ($returned_cuisines as $cuisine) {
                $id = $cuisine['id'];
                $type = $cuisine['type'];
                $new_cuisine = new Cuisine($id, $type);

                array_push($all_cuisines, $new_cuisine);
            }

            return $all_cuisines;
        }

        function addCuisine()
        {
            $GLOBALS['DB']->exec("INSERT INTO cuisines (type) VALUES ('{$this->getType()}');");
            $this->id = $GLOBALS['DB']->lastInsertID();
        }

        function deleteCuisine()
        {
            $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id = {$this->getId()};");
        }

        function getAllRestaurants()
        {
            $restaurants = array();
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants WHERE cuisine_id = {$this->getId()};");
                foreach($returned_restaurants as $restaurant) {
                    $id = $restaurant['id'];
                    $name = $restaurant['name'];
                    $price = $restaurant['price'];
                    $quadrant = $restaurant['quadrant'];
                    $cuisine_id = $restaurant['cuisine_id'];
                    $new_restaurant = new Restaurant($id, $name, $price, $quadrant, $cuisine_id);
                    array_push($restaurants, $new_restaurant);
                }
            return $restaurants;
        }

        static function find($search_id)
        {
            $found_cuisine = null;
            $cuisines = Cuisine::getAllCuisines();
            foreach($cuisines as $cuisine) {
                $cuisine_id = $cuisine->getId();
                if ($cuisine_id == $search_id) {
                  $found_cuisine = $cuisine;
                }
            }

            return $found_cuisine;
        }
    }
?>
