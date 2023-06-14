<?php

class Owner extends AbstractEntity {
    protected $id;
    protected $name;
    protected $forename;
    protected $dob;
    protected $mail;
    protected $phone;
    protected $animals;
    protected static $dao = "OwnerDAO";

    public function __construct ($name, $forename, $dob, $mail, $phone, $id = false) {
        $this->id = $id;
        $this->name = $name;
        $this->forename = $forename;
        $this->dob = $dob;
        $this->mail = $mail;
        $this->phone = $phone;
    }

    public function __get($prop) {
        if ($prop == "animals") {
            return $this->animals();
        } elseif (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function animals() {
        return $this->hasMany(Animal::class, 'animals', 'owner_id');
    }
}