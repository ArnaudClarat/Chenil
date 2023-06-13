<?php

class RaceDAO extends AbstractDAO {
    public function __construct()
    {
        parent::__construct('races', 'racId');
    }

    function create ($result) {
        return new Race(
            $result['name'],
            $result['id']
        );
    }
}