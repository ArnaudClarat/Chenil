<?php

class AnimalDAO extends AbstractDAO {

    public function __construct () {
        parent::__construct('animals');
    }
    
    //instancie un objet
    function create ($data) {
        return empty($data["puce"]) ? false : new Animal(
            $data['puce'],
            $data['name'],
            $data['sex'],
            $data['steril'],
            $data['DOB'],
            $data['parent_id'],
            $data['owner_id'],
            $data['race_id']
        );
    }

    function store ($animal) {
        return parent::insert(
            $this->db->prepare(
                "INSERT INTO {$this->table} (name, sex, steril, DOB, parent_id, owner_id, race_id, specie_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [
                    htmlspecialchars($animal->name),
                    htmlspecialchars($animal->sex),
                    htmlspecialchars($animal->steril),
                    htmlspecialchars($animal->dob),
                    htmlspecialchars($animal->parent->id),
                    htmlspecialchars($animal->owner->id),
                    htmlspecialchars($animal->race->id)
                ], $animal));
    }

    public function update($animal) {
        return parent::insert(
            $this->db->prepare(
                "UPDATE {$this->table} SET name=?, sex=?, steril=?, DOB=?, parent_id=? owner_id=?, race_id=? WHERE puce=?"),
                [
                    htmlspecialchars($animal->name),
                    htmlspecialchars($animal->sex),
                    htmlspecialchars($animal->steril),
                    htmlspecialchars($animal->dob),
                    htmlspecialchars($animal->parent->id),
                    htmlspecialchars($animal->owner->id),
                    htmlspecialchars($animal->race->id),
                    htmlspecialchars($animal->id)
                ], $animal);
    }

    //Récupération d'un animal par son numéro de puce
    public function fetch($id) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE puce = ?");
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

    //Récupération de toutes les ids des entités
    public function ids() {
        try {
            $statement = $this->db->prepare("SELECT puce FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $resultTable = [];
            foreach ($results as $result => $k) {
                array_push($resultTable, $result);
            }
            return $resultTable;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            return false;
        }
    }  
}