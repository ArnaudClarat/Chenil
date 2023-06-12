<?php 
class VaccineController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Vaccine::class, 'vaccines');
    }
}