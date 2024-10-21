<?php
include_once 'app/models/concesionariasModel.php';
include_once 'app/views/concesionariasView.php';

class concesionariasController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new concesionariasModel;
        $this->view = new concesionariasView;
    }

    function showConcesionarias(){

        // obtenemos las concesionarias
        $concesionarias = $this->model->getConcesionarias();

    }

    function showConcesionariaPorId($id){

        // obtenemos la concesionaria por Id
        $concesionaria = $this->model->getConcesionariaPorId($id);

        // Verificamos si hay vehículos
        if (empty($concesionaria)) {
            $this->view->showError(); 
        } else {
            // Actualizamos la vista
            $this->view->imprimirConcesionariaPorId($concesionarias, $id);
        }
    }

    

    function addConcesionaria() {
        // TODO: validar entrada de datos

        $nombre = $_POST['nombre'];
        $lugar = $_POST['lugar'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];

        $id = $this->model->insertConcesionaria($nombre, $lugar, $direccion, $email);

        header("Location: " . BASE_URL); 
    }
   
    function deleteConcesionaria($id) {
        $this->model->deleteConcesionariaXID($id);
        header("Location: " . BASE_URL);
    }


    function showError(){
        $this->view->showError();
    }
}
