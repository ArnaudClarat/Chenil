<?php 
class AnimalController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Animal::class, 'animals');
    }

    public function show ($id) {
        $entity = $this->entity_class::find($id);
        if ($entity) {
            // Récupération de tous les enfants de $entity
            $child = $entity;
            $parents = [];
            while ($child->parent->name != 'Inconnu') {
                $parent = $child->parent;
                array_push($parents, $parent);
                $child = $parent;
            }
            // Récupération de tous les enfants de $entity
            $parent = $entity;
            $childs = [];
            while ($parent->child->name != 'Inconnu') {
                $child = $parent->child;
                array_push($childs, $child);
                $parent = $child;
            }
            // Nettoyage des variables temporaires
            unset($child, $parent);
            return include "../views/{$this->folder}/one.php";
        }
        return include "../views/notfound.php";
    }

    public function edit ($id) {
        $entity = Animal::find($id);
        if ($entity) {
            $owners = Owner::all();
            $species = Specie::all();
            $races = Race::all();
            $animals = Animal::all();
            return include "../views/{$this->folder}/edit.php";
        }
        return include "../views/{$this->folder}/notfound.php";
    }

    public function update ($id, $data) {
        $entity = Animal::find($id);
        if ($entity) {
            $entity->name = $data["name"] ? $data["name"] : $entity->name;
            $entity->sex = $data["sex"] ? $data["sex"] : $entity->sex;
            $entity->steril = $data["steril"] ? $data["steril"] : $entity->steril;
            $entity->dob = $data["dob"] ? $data["dob"] : $entity->dob;
            $entity->owner = $data["owner"] ? $data["owner"] : $entity->owner;
            $entity->race = $data["race"] ? $data["race"] : $entity->race;

            $entity->save();
            include "../views/{$this->folder}/update.php";
            include "../views/{$this->folder}/one.php";
            return;
        }
        return include "../views/{$this->folder}/notfound.php";
    }

    public function create () {
        $owners = Owner::all();
        $species = Specie::all();
        $races = Race::all();
        $animals = Animal::all();
        return include "../views/{$this->folder}/create.php";
    }

    public function store ($data) {
        $puces = Animal::ids();
        $race = Race::first('id', $data['race']);
        if (!in_array($data['id'], $puces)) {
            if ($data['specie'] == $race->specie->id) {
                var_dump("coucou");
                return;
            }
        }
        var_dump("pas coucou");
        return;
    }
}