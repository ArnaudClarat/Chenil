<?php

class Animal extends AbstractEntity {
    private $puce;
    private $name;
    private $sex;
    private $steril;
    private $dob;
    private $owner;
    private $race;
    private $specie;
    protected static $dao = "AnimalDAO";

    public function __construct ($puce, $name, $sex, $steril, $dob, $owner, $race, $specie) {
        $this->puce = $puce;
        $this->name = $name;
        $this->sex = $sex;
        $this->steril = $steril;
        $this->dob = $dob;
        $this->owner = $owner;
        $this->race = $race;
        $this->specie = $specie;
    }
}