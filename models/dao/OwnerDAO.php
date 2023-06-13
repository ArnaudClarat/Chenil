<?php

class OwnerDAO extends AbstractDAO {
    public function __construct() {
        parent::__construct('owners', 'id');
    }

    public function create ($result) {
        return new Owner(
            $result['name'],
            $result['forename'],
            $result['DOB'],
            $result['mail'],
            $result['tel'],
            $result['id']
        );
    }
}