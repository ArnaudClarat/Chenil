<?php

class Specie extends AbstractEntity {
    private $id;
    private $name;
    protected static $dao = "SpecieDAO";

    public function __construct ($name, $id = false) {
        $this->id = $id;
        $this->name = $name;
    }
}