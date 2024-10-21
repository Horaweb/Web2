<?php
include_once 'app/models/vehiculosModel.php';
include_once 'app/views/vehiculosView.php';

class VehiculosController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new VehiculosModel;
        $this->view = new VehiculosView;
    }

    function showVehiculos(){

        // obtenemos los vehiculos por tipo
        $vehiculos = $this->model->getVehiculos();

        // Verificamos si hay vehículos
        if (empty($vehiculos)) {
            $this->view->showError(); 
        } else {
            // Actualizamos la vista
            $this->view->imprimirVehiculos($vehiculos);
        }
    }

    function showVehiculosxTipo($tipo){

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

    function showVehiculosxMarca($marca){

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

    function addVehiculo() {
        // TODO: validar entrada de datos

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $tipo = $_POST['tipo'];

        $id = $this->model->insertVehiculo($marca, $modelo, $año, $tipo);

        header("Location: " . BASE_URL); 
    }
   
    function deleteVehiculo($id) {
        $this->model->deleteVehiculoxId($id);
        header("Location: " . BASE_URL);
    }


    function showError(){
        $this->view->showError();
    }
}