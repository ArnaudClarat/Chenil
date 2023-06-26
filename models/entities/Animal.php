<?php

class Animal extends AbstractEntity {
    protected $id;
    protected $name;
    protected $sex;
    protected $steril;
    protected $dob;
    protected $parent;
    protected $child;
    protected $owner;
    protected $race;
    protected static $dao = "AnimalDAO";

    public function __construct ($id, $name, $sex, $steril, $dob, $parent, $owner, $race) {
        $this->id = $id;
        $this->name = $name;
        $this->sex = $sex;
        $this->steril = $steril;
        $this->dob = $dob;
        $this->parent = $parent;
        $this->child = '0';
        $this->owner = $owner;
        $this->race = $race;
    }

    public function __get($prop) {
        if ($prop == "owner") {
            return $this->owner();
        } elseif ($prop == "race") {
            return $this->race();
        } elseif ($prop == "parent") {
            return $this->parent();
        } elseif ($prop == "child") {
            return $this->child();
        } elseif (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function parent() {
        return $this->belongsTo(Animal::class, "parent");
    }

    public function owner() {
        return $this->belongsTo(Owner::class, "owner");
    }

    public function race() {
        return $this->belongsTo(Race::class, "race");
    }

    public function child() {
        $child = $this->hasMany(Animal::class, "child", 'parent_id');
        if (!$child) {
            return $this->empty();
        }
        return $child[0];
    }

    public static function first ($attr, $value) {
        $attr = ($attr == 'id') ? 'puce' : $attr;
        return ($value == 0) ? 
            new Animal(
                '0',
                'Inconnu',
                'M',
                '0',
                'yyyy-mm-dd',
                '0',
                '0',
                '0'
            ) :
            (new static::$dao)->first($attr, $value); 
    }

    public static function find ($id) {
        return ($id == 0) ? 
            Animal::empty() :
            (new static::$dao)->fetch($id);
    }

    public static function empty() {
        return new Animal(
            '0',
            'Inconnu',
            'M',
            '0',
            'yyyy-mm-dd',
            '0',
            '0',
            '0'
        );
    }

}