<?php

class Race extends AbstractEntity {
    protected $id;
    protected $name;
    protected $animals;
    protected static $dao = "RaceDAO";

    public function __construct ($name, $id = false) {
        $this->id = $id;
        $this->name = $name;
    }

    public function __get($prop) {
        if ($prop == "animals") {
            return $this->animals();
        } elseif (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function animals() {
        return $this->hasMany(Animal::class, 'animals', 'race_id');
    }
}