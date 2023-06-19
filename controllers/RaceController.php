<?php 
class RaceController extends AbstractController {
    
    public function __construct() {
        parent::__construct(Race::class, 'races');
    }

    public function where($id) {
        $races = Race::where('specie_id',$id);
        $data = [];
        foreach($races as $race) {
            array_push($data, $race->id);
        }
        echo json_encode($data);
        die();
    }
}