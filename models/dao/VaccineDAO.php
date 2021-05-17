<?php

class VaccineDAO extends AbstractDAO {
    public function __construct() {
        parent::__construct('vaccines', 'vacId');
    }

    public function create ($result) {
        return new Vaccine(
            $result['id'],
            $result['name'],
            $result['description']
        );
    }
}