<?php

class Race extends AbstractEntity {
    private $id;
    private $name;
    protected static $dao = "RaceDAO";

    public function __construct ($name, $id = false) {
        $this->id = $id;
        $this->name = $name;
    }
}