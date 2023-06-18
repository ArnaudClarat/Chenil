<?php

class StayDAO extends AbstractDAO {
    public function __construct()
    {
        parent::__construct('stays', 'id');
    }

    function create ($result) {
        return new Stay(
            $result['id'],
            $result['date_in'],
            $result['date_out'],
            $result['animal_id']
        );
    }





}