<?php 

require_once 'ControllerFacade.php';

class Controller{
    private $controllerFacade;

    public function __construct() {
        $this->controllerFacade = new ControllerFacade();
    }

    public function view($view, $data = []) {
        $this->controllerFacade->view($view, $data);
    }

    public function model($model) {
        return $this->controllerFacade->model($model);
    }
}