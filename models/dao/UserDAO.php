<?php

class UserDAO extends AbstractDAO {
    public function __construct() {
        parent::__construct('users', 'useId');
    }

    public function create ($result) {
        return new User(
            $result['id'],
            $result['name'],
            $result['forename'],
            $result['dob'],
            $result['mail'],
            $result['phone']
        );
    }
}