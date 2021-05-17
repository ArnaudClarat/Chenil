<?php


class Stay
{
    private $id;
    private $dateIn;
    private $dateOut;
    private $animal;

    public function __construct ($id, $dateIn, $dateOut, $animal){
        $this->id = $id;
        $this->dateIn = $dateIn;
        $this->dateOut = $dateOut;
        $this->animal = $animal;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
        return "No property ";
    }

    public function __set ($prop, $value) {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}