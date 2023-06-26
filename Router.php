<?php

class Router {
    
    private $data;
    private $url;
    private $post;
    private $get;
    private $controller = false;
    private $routes;
    private $action = false;
    private $actions;
    private $id = false;
    private $logfile = 'router.log';
    
    public function __construct ($url) {
        $this->url = $url;
        $this->post = $_POST;
        $this->get = $_GET;
        $this->data = count($this->post) ? $this->post : $this->get;
        
        //tableau associatif pour définir une correspondance URL <-> Controller
        $this->routes = [
            "/" => "AnimalController",
            "animals" => "AnimalController",
            "owners" => "OwnerController",
            "races" => "RaceController",
            "species" => "SpecieController",
            "stays" => "StayController"
        ];
        
        //liste des actions autorisées
        $this->actions = ["list", "show", "create", "store", "edit", "update", "destroy", "where"];
        
        $this->analyze(); 
        //$this->debug($this->data);
        $this->run();
    }
    
    private function analyze () {
        $this->clean_url();  
        //Si pas de controlleur on part sur une 404
        if (!$this->detect_controller()) {
            http_response_code(404);
            print 'Not found';
            die();
        }
        
        
        if ($this->detect_id()) {
            array_shift($this->url); 
        }
        
        $this->detect_action();
        if ($this->action == "list" && $this->id) {
            $this->action = "show";
        } else if ($this->action == "edit" && $this->id) {
            $this->action = "edit";
        } else if ($this->action == "where" && $this->id) {
            $this->action = "where";
        } else if ($this->action == "update" && !empty($_POST)) {
            $this->action = "update";
        } else if ($this->action == "store" && !empty($_POST)) {
            $this->action = "store";
        } else if ($this->action == "create") {
            $this->action = "create";
        } else {
            $this->action = "list";
        }
        
    }
    
    private function clean_url () {
        //J'enleve tout ce qui se trouve après le "?" S'il y en a un dans l'URL
        if (strpos($this->url, "?")) {
            $this->url = strstr($this->url, '?', true);
        }
        //Je transforme la string de l'url en un tableau, le substr me permet de virer le premier /
        $this->url = explode("/", substr($this->url, 1));
    }
    
    private function detect_controller () {
        //si je n'ai rien dans mon tableau a l'index 0 ou si cest une valeur numérique => controlleur par défaut
        if (!$this->url[0] || is_numeric($this->url[0])) {
            return $this->controller = $this->routes["/"];
        }
        
        //si dans mon tableau route j'ai une equivalence, je l'utilise
        if (isset($this->routes[$this->url[0]])) {
            $this->controller = $this->routes[$this->url[0]];
            //l'array shift vire le premier elem de mon tableau car plus besoin
            array_shift($this->url);
            return true;
        }
        return false;
    }
    
    private function detect_id () {
        if (isset($this->url[0])) {
            if(is_numeric($this->url[0])) {
                return $this->id = $this->url[0];
            }
        return false;
        }
    }
    
    private function detect_action () {
        if (isset($this->url[0]) && $this->url[0]) {
            //je verifie si l'action existe dans mon URL
            if(!in_array($this->url[0], $this->actions)) {
                return false;
            }
            return $this->action = $this->url[0];
        }
        return $this->action = "list";
    }
    
    private function run () {
        $this->controller = new $this->controller();
        if ($this->id && !$this->data) {
            return $this->controller->{$this->action}($this->id);
        } else if (!$this->id && $this->data) {
            $this->controller->{$this->action}($this->data);
        }
        return $this->controller->{$this->action}($this->id, $this->data);
    }
    
    private function debug ($data) {
        var_dump($this->controller, $this->id, $this->action);
        $content = date('Y-m-d H:i:s').' - '.$this->controller.', '.$this->id.', '.$this->action.PHP_EOL;    
        file_put_contents($this->logfile, $content, FILE_APPEND);
        var_dump($data);
    }
}