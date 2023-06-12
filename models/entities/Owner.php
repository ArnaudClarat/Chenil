<?php

class Owner extends AbstractEntity {
    private $id;
    private $name;
    private $forename;
    private $dob;
    private $mail;
    private $phone;
    protected static $dao = "OwnerDAO";

    public function __construct ($name, $forename, $dob, $mail, $phone, $id = false) {
        $this->id = $id;
        $this->name = $name;
        $this->forename = $forename;
        $this->dob = $dob;
        $this->mail = $mail;
        $this->phone = $phone;
    }
}