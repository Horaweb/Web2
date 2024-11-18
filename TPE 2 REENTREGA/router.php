<?php
require_once 'libs/response.php';
require_once 'app/middlewares/readSession.php';
require_once 'app/controllers/vehiculosController.php';
require_once 'app/controllers/concesionariasController.php';
require_once 'app/controllers/AdminController.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

if(!empty($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = 'home';
}

$params = explode('/', $action);

switch($params[0]){

    case 'home':
            $VehiculosController = new VehiculosController();
            $VehiculosController->showVehiculos();
    break;

    case 'vermas':
        $VehiculosController = new VehiculosController();
        $VehiculosController->showVehiculosById($params[1]);
    break;


    case 'items':
        $VehiculosController = new VehiculosController();
        $VehiculosController->showItems();
    break;

    case 'tipo':
        if (!empty($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            $VehiculosController = new VehiculosController();
            $VehiculosController->showVehiculosxTipo($tipo);
        }else {
            $VehiculosController = new VehiculosController();
            $VehiculosController->showError("Error");
        }
    break;

    case 'marca':
        if (!empty($_GET['marca'])) {
            $marca = $_GET['marca'];
            $VehiculosController = new VehiculosController();
            $VehiculosController->showVehiculosxMarca($marca);
        }else {
            $VehiculosController = new VehiculosController();
            $VehiculosController->showError("Error");
        }
    break;


    case 'add':
        $VehiculosController = new VehiculosController();
        $VehiculosController->addVehiculo();
    break;

    case "edit":
        $vehiculosController = new VehiculosController();
        $vehiculosController->editVehiculo($params[1]);
    break;

    case "update":
        $vehiculosController = new VehiculosController();
        $vehiculosController->updateVehiculo($params[1]);
    break;

    case 'delete':
        $VehiculosController = new VehiculosController();
        $VehiculosController->deleteVehiculo($params[1]);
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->deleteConcesionaria($params[1]);
    break;

        


    case 'concesionarias':
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->showConcesionarias();
    break;

    case 'verunidades':
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->showConcesionariasById($params[1]);
    break;

    case 'add':
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->addConcesionaria();
    break;

    case "editconcesionaria":
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->editConcesionaria($params[1]);
    break;

    case "updateconcesionarias":
        $ConcesionariasController = new ConcesionariasController();
        $ConcesionariasController->updateConcesionaria($params[1]);
    break;



    case 'showLogin':
        $AdminController = new AdminController();
        $AdminController->showLogin();
    break;

    case 'login':
        $AdminController = new AdminController();
        $AdminController->login();
    break;

    case 'logout':
        $AdminController = new AdminController();
        $AdminController->logout();
    break;


    default:
        echo "Error!, 404 page not found";
    break;

}




