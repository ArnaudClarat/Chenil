<?php
require_once('config.php');

abstract class AbstractDAO implements DAOInterface {
    protected $db;
    protected $table;

    public function __construct ($table) {
        $this->table = $table;
        $this->connect();
    }

    //Connexion à la db
    public function connect () {
        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $this->db = new PDO("mysql:host={$host};dbname=chenil", "$user", "$pass");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Création de toutes les entités
    public function createAll ($datas) {
        $entities = array();
        if($datas) {
            foreach ($datas as $data) {
                array_push($entities, $this->create($data));
            }
        return $entities;
        }
    }

    //Récuperation de toutes les entités
    public function fetchAll () {
        try {
            $statement = $this->db->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $this->createAll($results);
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    //Récupération de toutes les entités respectant $attr == $value
    public function fetchWhere ($attr, $value) {
        try {
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$attr} = ?");
            $statement->execute([$value]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $this->createAll($results);
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    //Récupération d'une entité par son id
    public function fetch($id) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        try {
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $this->create($result);
            }
            return false;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }    

    //Récupération d'une entité respectant $attr == $value
    public function first($attr, $value) {
        try {
            $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$attr} = ? LIMIT 1");
            $statement->execute([$value]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if($result) {
                return $this->create($result);
            }
            return false;
        } catch (PDOException $e) {
            var_dump($e);
            return false;
        }
    }

    //Insertion d'une entité en DB et update son id si nécéssaire
    public function insert($statement, $data, $entity = false) {
        try {
            $statement->execute($data);
            if ($entity && !$entity->id) {
                $entity->id = $this->db->lastInsertId();
            }
            return $entity;
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }

    //Gère la relation
    public function intermediate ($table, $key, $value, $foreign) {
        try {
            $statement = $this->db->prepare("SELECT {$foreign} FROM {$table} WHERE {$key} = ?");
            $statement->execute([$value]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $entities = [];
                foreach($results as $result) {
                    array_push($entities, $this->fetch($result[$foreign], false));
                }
                return $entities;
            }
            return false;            
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function associate_one ($table, $key, $foreign_key, $entity, $foreign) {
        try {
            $statement = $this->db->prepare("INSERT INTO {$table} ({$key}, {$foreign_key}) VALUES (?, ?)");
            return $this->insert($statement, [$entity->id, $foreign->id]);
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function associate ($table, $key, $foreign_key, $entity, $foreign) {
        if(is_array($foreign)) {
            $entities = [];
            foreach($foreign as $f) {
                 array_push($entities, $this->associate_one($table, $key, $foreign_key, $entity, $f));
            }
            return $entities;
        } else {
            return $this->associate_one($table, $key, $foreign_key, $entity, $foreign);
        }
    }

    public function dissociate ($table, $key, $foreign_key, $entity, $foreign = false) {
        try {
            if ($foreign) {
                $statement = $this->db->prepare("DELETE FROM {$table} WHERE {$key} = ? AND {$foreign_key} = ?");
                return $this->insert($statement, [$entity->id, $foreign->id]);
            }
            $statement = $this->db->prepare("DELETE FROM {$table} WHERE {$key} = ?");
            return $this->insert($statement, [$entity->id]);
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function destroy ($id) {
        $statement = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        try {
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function __get($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set($prop, $value) {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}
