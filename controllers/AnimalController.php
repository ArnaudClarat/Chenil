<?php 
class AnimalController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Animal::class, 'animals');
    }
}