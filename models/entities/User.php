<?php

class User {
    private $id;
    private $name;
    private $forename;
    private $dob;
    private $mail;
    private $phone;

    public function __construct ($id, $name, $forename, $dob, $mail, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->forename = $forename;
        $this->dob = $dob;
        $this->mail = $mail;
        $this->phone = $phone;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set ($prop, $value) {
        if(property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}