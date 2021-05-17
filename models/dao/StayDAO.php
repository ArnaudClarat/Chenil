<?php

class StayDAO extends AbstractDAO {
    public function __construct()
    {
        parent::__construct('stay', 'staId');
    }

    function create ($result) {
        return new Stay(
            $result['id'],
            $result['dateIn'],
            $result['dateOut'],
            $result['animal']
        );
    }





}