<?php

class Stay extends AbstractEntity {
    private $id;
    private $dateIn;
    private $dateOut;
    private $animal;
    protected static $dao = "StayDAO";

    public function __construct ($dateIn, $dateOut, $animal, $id = false) {
        $this->id = $id;
        $this->dateIn = $dateIn;
        $this->dateOut = $dateOut;
        $this->animal = $animal;
    }
}