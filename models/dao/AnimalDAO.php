<?php

class AnimalDAO extends AbstractDAO {

    public function __construct () {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('animals', 'aniId');
    }

    public function user ($user_id) {

        return $this->belongsTo(new UserDAO(), $user_id);
    }

    //instancie un objet
    function create ($result) {
        return new Animal(
            $result['id'],
            $result['name'],
            $result['sex'],
            $result['steril'],
            $result['dob'],
            $result['puce'],
            $result['user'],
            $result['race'],
            $result['specie']
        );
    }

    function delete ($data) {
        if(empty($data['id'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?");
            $statement->execute([
                $data['id']
            ]);
        } catch(PDOException $e) {
            print $e->getMessage();
        }
    }

    function store ($data) {
        if(empty($data['name']) || empty($data['sex']) || empty($data['dob'])) {
            return false;
        }

        $animal = $this->create(
            [
                'id'=> 0,
                'name'=> $data['name'],
                'sex'=>$data['sex'],
                'steril'=>$data['steril'],
                'dob'=>$data['dob'],
                'puce'=>$data['puce'],
                'user'=>$data['user'],
                'race'=>$data['race'],
                'specie'=>$data['specie']
            ]
        );

        if ($animal) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (aniName, aniSex, anisteril, aniDOB, aniPuce, aniUseId, aniRacId, aniSpeId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($animal->__get('name')),
                    htmlspecialchars($animal->__get('sex')),
                    htmlspecialchars($animal->__get('steril')),
                    htmlspecialchars($animal->__get('dob')),
                    htmlspecialchars($animal->__get('puce')),
                    htmlspecialchars($animal->__get('user')),
                    htmlspecialchars($animal->__get('race')),
                    htmlspecialchars($animal->__get('specie'))
                ]);
                return true;
            } catch(PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }
}