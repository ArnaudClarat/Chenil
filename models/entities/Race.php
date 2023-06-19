<?php

class Race extends AbstractEntity {
    protected $id;
    protected $name;
    protected $specie;
    protected $animals;
    protected static $dao = "RaceDAO";

    public function __construct ($name, $specie, $id = false) {
        $this->id = $id;
        $this->name = $name;
        $this->specie = $specie;
    }

    public function __get($prop) {
        if ($prop == "animals") {
            return $this->animals();
        } elseif ($prop == "specie") {
            return $this->specie();
        } elseif (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function animals() {
        return $this->hasMany(Animal::class, 'animals', 'race_id');
    }

    public function specie() {
        return $this->belongsTo(Specie::class, 'specie');
    }
}