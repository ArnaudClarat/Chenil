<?php 
class OwnerController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Owner::class, 'owners');
    }
}