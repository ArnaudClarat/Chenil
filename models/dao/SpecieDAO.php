<?php

class SpecieDAO extends AbstractDAO {
    public function __construct()
    {
        parent::__construct('species', 'speId');
    }

    function create ($result) {
        return new Specie(
            $result['name'],
            $result['id']
        );
    }
}