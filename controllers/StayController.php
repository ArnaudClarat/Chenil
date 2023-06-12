<?php 
class StayController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Stay::class, 'stays');
    }
}