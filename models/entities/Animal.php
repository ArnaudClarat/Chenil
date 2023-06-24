<?php

class Animal extends AbstractEntity {
    protected $id;
    protected $name;
    protected $sex;
    protected $steril;
    protected $dob;
    protected $owner;
    protected $race;
    protected static $dao = "AnimalDAO";

    public function __construct ($id, $name, $sex, $steril, $dob, $owner, $race) {
        $this->id = $id;
        $this->name = $name;
        $this->sex = $sex;
        $this->steril = $steril;
        $this->dob = $dob;
        $this->owner = $owner;
        $this->race = $race;
    }

    public function __get($prop) {
        if ($prop == "owner") {
            return $this->owner();
        } elseif ($prop == "race") {
            return $this->race();
        } elseif (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function owner() {
        return $this->belongsTo(Owner::class, "owner");
    }

    public function race() {
        return $this->belongsTo(Race::class, "race");
    }
}