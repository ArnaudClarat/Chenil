<?php 
class AnimalController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Animal::class, 'animals');
    }

    public function edit ($id) {
        $entity = $this->entity_class::find($id);
        if ($entity) {
            $owners = Owner::all();
            $species = Specie::all();
            $races = Race::all();
            return include "../views/{$this->folder}/edit.php";
        }
        return include "../views/{$this->folder}/notfound.php";
    }
}