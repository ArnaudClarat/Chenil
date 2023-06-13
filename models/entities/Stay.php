<?php

class Stay extends AbstractEntity {
    protected $id;
    protected $dateIn;
    protected $dateOut;
    protected $animal;
    protected static $dao = "StayDAO";

    public function __construct ($dateIn, $dateOut, $animal, $id = false) {
        $this->id = $id;
        $this->dateIn = $dateIn;
        $this->dateOut = $dateOut;
        $this->animal = $animal;
    }
}