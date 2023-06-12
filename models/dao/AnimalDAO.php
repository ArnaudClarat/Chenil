<?php

class AnimalDAO extends AbstractDAO {

    public function __construct () {
        parent::__construct('animals');
    }
    
    //instancie un objet
    function create ($result) {
        return empty($data["puce"]) ? false : new Animal(
            $result['name'],
            $result['sex'],
            $result['steril'],
            $result['dob'],
            $result['owner_id'],
            $result['race_id'],
            $result['specie_id'],
            $result['puce'] ?? false
        );
    }

    //bla bla bla
    function store ($animal) {
        return parent::insert(
            $this->db->prepare(
                "INSERT INTO {$this->table} (name, sex, steril, DOB, owner_id, race_id, specie_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [
                    htmlspecialchars($animal->name),
                    htmlspecialchars($animal->sex),
                    htmlspecialchars($animal->steril),
                    htmlspecialchars($animal->dob),
                    htmlspecialchars($animal->owner->id),
                    htmlspecialchars($animal->race->id),
                    htmlspecialchars($animal->specie->id)
                ], $animal));
    }

    public function update($pokemon) {
        return parent::insert(
            $this->db->prepare(
                "UPDATE {$this->table} SET (name, sex, steril, DOB, owner_id, race_id, specie_id) = (?, ?, ?, ?, ?, ?, ?) WHERE puce = ?"), [
                    htmlspecialchars($animal->name),
                    htmlspecialchars($animal->sex),
                    htmlspecialchars($animal->steril),
                    htmlspecialchars($animal->dob),
                    htmlspecialchars($animal->owner->id),
                    htmlspecialchars($animal->race->id),
                    htmlspecialchars($animal->specie->id),
                    htmlspecialchars($animal->puce)
                ], $pokemon);
        }
}