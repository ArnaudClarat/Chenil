<?php

class Animal {
    private $id;
    private $name;
    private $sex;
    private $steril;
    private $dob;
    private $puce;
    private $user;
    private $race;
    private $specie;

    public function __construct ($id, $name, $sex, $steril, $dob, $puce, $user, $race, $specie) {
        $this->id = $id;
        $this->name = $name;
        $this->sex = $sex;
        $this->steril = $steril;
        $this->dob = $dob;
        $this->puce = $puce;
        $this->user = $user;
        $this->race = $race;
        $this->specie = $specie;
    }


    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
        return "No property ";
    }

    public function __set ($prop, $value) {
        if(property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}