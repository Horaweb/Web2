<?php
include_once 'app/models/vehiculosModel.php';
include_once 'app/models/concesionariasModel.php';
include_once 'app/views/vehiculosView.php';

class VehiculosController{
    private $model;
    private $modelConcesionarias;
    private $view;
    
    function __construct(){
        $this->model = new VehiculosModel;
        $this->modelConcesionarias = new concesionariasModel;
        $this->view = new VehiculosView;
    }

    public function showVehiculos(){
        // obtenemos los vehiculos por tipo
        $vehiculos = $this->model->getAll();

        // Verificamos si hay vehículos
        if (empty($vehiculos)) {
            $this->view->showError("Error, no hay vehiculos"); 
        } else {
            // Actualizamos la vista
            $this->view->imprimirVehiculos($vehiculos);
        }
        $this->view->showFormVehiculos();
    }

    public function showVehiculosById($id) { 
        $vehiculo = $this->model->getVehiculoById($id);        
        if (!$vehiculo) {
            return $this->view->showError("Error, no hay vehiculos");
        }    
        $id_concesionaria = $vehiculo->id_concesionaria;  
        $concecionaria = $this->modelConcesionarias->getConcesionariaById($id_concesionaria);     
        return $this->view->imprimirVehiculoById($vehiculo, $concecionaria); 
    }

    public function showItems(){
        $this->view->imprimirItems();
    }

    public function showVehiculosxTipo($tipo){
        // obtenemos los vehiculos por tipo
        $vehiculos = $this->model->getVehiculosxTipo($tipo);
        // Verificamos si hay vehículos
        if (empty($vehiculos)) {
            $this->view->showError(); 
        } else {
            // Actualizamos la vista
            $this->view->imprimirVehiculosxTipo($vehiculos, $tipo);
        }
    }
    public function showVehiculosxMarca($marca){

        // obtenemos los vehiculos por tipo
        $vehiculos = $this->model->getVehiculosxMarca($marca);

         // Verificamos si hay vehículos
         if (empty($vehiculos)) {
            $this->view->showError();
        } else {
            // Actualizamos la vista
            $this->view->imprimirVehiculosxMarca($vehiculos, $marca);
        }
    }

    public function addVehiculo() {
        // TODO: validar entrada de datos
        if(!isset($_POST['marca']) || empty($_POST['marca'])){
            return $this->view->showError("falta completar la marca");
        }

        if(!isset($_POST['modelo']) || empty($_POST['modelo'])){
            return $this->view->showError("falta completar el modelo");
        }

        if(!isset($_POST['año']) || empty($_POST['año'])){
            return $this->view->showError("falta completar el año");
        }

        if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
            return $this->view->showError("falta completar el tipo");
        }

        if(!isset($_POST['precio']) || empty($_POST['precio'])){
            return $this->view->showError("falta completar el precio");
        }

        if(!isset($_POST['concecionaria']) || empty($_POST['concecionaria'])){
            return $this->view->showError("falta completar la concecionaria");
        }

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $tipo = $_POST['tipo'];
        $precio = $_POST['precio'];
        $concesionaria = $_POST['concecionaria'];

        $this->model->insertVehiculo($marca, $modelo, $año, $tipo, $precio, $concesionaria);

        header("Location: " . BASE_URL . 'home'); 
    }

    public function editVehiculo($id){
        // obtenemos los vehiculos por tipo
        $vehiculo = $this->model->getVehiculoById($id);

        // Verificamos si hay vehículo
        if (empty($vehiculo)) {
            $this->view->showError("Error, ghchgcghno hay vehiculo"); 
        } else {
            // Actualizamos la vista
            $this->view->showFormEdit($vehiculo);
        }
    }
    

    public function updateVehiculo($id){

        if(!isset($_POST['marca']) || empty($_POST['marca'])){
            return $this->view->showError("falta completar la marca");
        }

        if(!isset($_POST['modelo']) || empty($_POST['modelo'])){
            return $this->view->showError("falta completar el modelo");
        }

        if(!isset($_POST['año']) || empty($_POST['año'])){
            return $this->view->showError("falta completar el año");
        }

        if(!isset($_POST['tipo']) || empty($_POST['tipo'])){
            return $this->view->showError("falta completar el tipo");
        }

        if(!isset($_POST['precio']) || empty($_POST['precio'])){
            return $this->view->showError("falta completar el precio");
        }

        if(!isset($_POST['concecionaria']) || empty($_POST['concecionaria'])){
            return $this->view->showError("falta completar la concecionaria");
        }

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $tipo = $_POST['tipo'];
        $precio = $_POST['precio'];
        $concesionaria = $_POST['concecionaria'];



        $this->model->editarVehiculo($id, $tipo, $marca, $modelo, $año, $precio, $concesionaria);

       header('Location:'. BASE_URL . 'home');  
    }

    public function deleteVehiculo($id) {
        $vehiculo = $this->model->getVehiculoById($id);
        if(empty($vehiculo)){
            $this->view->showError("no hay ningun vehiculo");
            return;
        }
        $this->model->deleteVehiculoById($id);
        header("Location: " . BASE_URL . 'home');
    }

    public function showError(){
        $this->view->showError();
    }
}

