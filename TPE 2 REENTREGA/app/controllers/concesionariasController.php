<?php
include_once 'app/models/concesionariasModel.php';
include_once 'app/views/concesionariasView.php';
include_once 'app/models/vehiculosModel.php';

class ConcesionariasController{
    private $modelVehiculo;
    private $model;
    private $view;
    
    function __construct(){
        $this->model = new ConcesionariasModel;
        $this->modelVehiculo = new VehiculosModel;
        $this->view = new ConcesionariasView;
    }

    public function showConcesionarias(){
        // obtenemos las concesionarias por tipo
        $concesionarias = $this->model->getAllConcesionarias();

        // Verificamos si hay concesionarias
        if (empty($concesionarias)) {
            $this->view->showError("Error, no hay concesionarias"); 
        } else {
            // Actualizamos la vista
            $this->view->imprimirConcesionarias($concesionarias);
        }
        $this->view->showFormConcesionarias();
    }

    public function showConcesionariasById($id) { 
        $concesionaria = $this->model->getConcesionariaById($id);        
        if (!$concesionaria) {
            return $this->view->showError("Error, no hay concesionarias");
        }
        $id_concesionaria = $concesionaria->id;  
        $vehiculos = $this->modelVehiculo->getVehiculoByConcesionaria($id_concesionaria);             
        return $this->view->imprimirConcesionariaById($concesionaria, $vehiculos); 
    }

    public function addConcesionaria() {
        // TODO: validar entrada de datos
        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            return $this->view->showError("falta completar la nombre");
        }

        if(!isset($_POST['lugar']) || empty($_POST['lugar'])){
            return $this->view->showError("falta completar el lugar");
        }

        if(!isset($_POST['direccion']) || empty($_POST['direccion'])){
            return $this->view->showError("falta completar el direccion");
        }

        if(!isset($_POST['email']) || empty($_POST['email'])){
            return $this->view->showError("falta completar el email");
        }

        $nombre = $_POST['nombre'];
        $lugar = $_POST['lugar'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];

        $this->model->insertConcesionaria($nombre, $lugar, $direccion, $email);

        header("Location: " . BASE_URL . 'concesionarias'); 
    }

    public function editConcesionaria($id){
        // obtenemos la Concesionaria por tipo
        $concesionaria = $this->model->getConcesionariaById($id);

        // Verificamos si hay Concesionaria
        if (empty($concesionaria)) {
            $this->view->showError("Error, no hay concesionaria"); 
        } else {
            // Actualizamos la vista
            $this->view->showFormEdit($concesionaria);
        }
    }


    public function updateConcesionaria($id){

        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            return $this->view->showError("falta completar la nombre");
        }

        if(!isset($_POST['lugar']) || empty($_POST['lugar'])){
            return $this->view->showError("falta completar el lugar");
        }

        if(!isset($_POST['direccion']) || empty($_POST['direccion'])){
            return $this->view->showError("falta completar el direccion");
        }

        if(!isset($_POST['email']) || empty($_POST['email'])){
            return $this->view->showError("falta completar el email");
        }

        $nombre = $_POST['nombre'];
        $lugar = $_POST['lugar'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];

        $this->model->editarConcesionaria($id, $nombre, $lugar, $direccion, $email);

       header('Location:'. BASE_URL . 'concesionarias');  
    }

    public function deleteConcesionaria($id) {
        $concesionaria = $this->model->getConcesionariaById($id);
        if(empty($concesionaria)){
            $this->view->showError("no hay ninguna concesionaria");
            return;
        }
        $this->model->deleteConcesionariaById($id);
        header("Location: " . BASE_URL . 'concesionarias');
    }

    public function showError(){
        $this->view->showError();
    }
}

