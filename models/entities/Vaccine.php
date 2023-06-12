<?php

class Vaccine extends AbstractEntity {
    private $id;
    private $name;
    private $description;
    protected static $dao = "VaccineDAO";

    public function __construct ($name, $description, $id = false){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}