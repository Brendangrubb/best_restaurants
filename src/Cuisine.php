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
                $new_cuisine = new Cuisine($id, $cuisine);

                array_push($all_cuisines, $new_cuisine);
            }

            return $all_cuisines;
        }

        function addCuisine()
        {
            $GLOBALS['DB']->exec("INSERT INTO cuisine (type) VALUES ('{$this->getType()}');");
            $this->id = $GLOBALS['DB']->lastInsertID();
        }
    }
?>
