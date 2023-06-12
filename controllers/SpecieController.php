<?php 
class SpecieController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Specie::class, 'species');
    }
}