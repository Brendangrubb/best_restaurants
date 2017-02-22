<?php
    class Restaurant
    {
        private $id;
        private $name;
        private $price;
        private $quadrant;

        function __construct($id = null, $name, $price, $quadrant)
        {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->quadrant = $quadrant;
        }
        //ID getter
        function getId()
        {
            return $this->id;
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
    }

?>
