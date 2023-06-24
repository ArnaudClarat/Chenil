<?php

abstract class AbstractController implements ControllerInterface {
	protected $entity_class;
	protected $folder;

	public function __construct($entity_class, $folder) {
		$this->entity_class = $entity_class;
		$this->folder = $folder;
	}

	public function list () {
        $entities = $this->entity_class::all();
        return include "../views/{$this->folder}/list.php";
	}

	public function show ($id) {
		$entity = $this->entity_class::find($id);
		if ($entity) {
			return include "../views/{$this->folder}/one.php";
		}
		return include "../views/notfound.php";
	}

    public function create () {
        return include "../views/{$this->folder}/create.php";
    }

    public function edit ($id) {
        $entity = $this->entity_class::find($id);
        if ($entity) {
            return include "../views/{$this->folder}/edit.php";
        }
        return include "../views/{$this->folder}/notfound.php";
    }

    public function store ($data) {
        $entity = new $this->entity_class($data["name"]);
        $entity->save();
        return include "../views/{$this->folder}/store.php";
    }

    public function update ($id, $data) {
        $entity = $this->entity_class::find($data["id"]);
        if ($entity) {
            $entity->name = $data["name"] ? $data["name"] : $entity->name;
            $entity->save();
            return include "../views/{$this->folder}/update.php";
        }
        return include "../views/{$this->folder}/notfound.php";
    }

    public function destroy($id) {
    	if ($entity_class::find($id)->delete()) {
			return include "../views/{$this->folder}/destroy.php";
    	}
    	return include "../views/{$this->folder}/notfound.php";
    }
}