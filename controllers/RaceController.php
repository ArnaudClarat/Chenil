<?php 
class RaceController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Race::class, 'races');
    }
}