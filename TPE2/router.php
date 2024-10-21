<?php
require_once 'libs/response.php';
require_once 'app/controllers/vehiculosController.php';
require_once 'app/controllers/concesionariasController.php';




// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();


// verifica datos obligatorios
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}else {
    $vehiculosController = new VehiculosController();
    $vehiculosController->showError();
    die();
}





$params = explode('/', $action);

switch($params[0]){

    case 'todo':
            $vehiculosController = new VehiculosController();
            $vehiculosController->showVehiculos();
    break;


    case 'tipo':
        if (!empty($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            $vehiculosController = new VehiculosController();
            $vehiculosController->showVehiculosxTipo($tipo);
        }else {
            $vehiculosController->showError();
        }
    break;


    case 'marca':
        if (!empty($_GET['marca'])) {
            $marca = $_GET['marca'];
            $vehiculosController = new VehiculosController();
            $vehiculosController->showVehiculosxMarca($marca);
        }else {
            $vehiculosController->showError();
        }
    break;


    case 'add':
        $vehiculosController = new VehiculosController();
        $vehiculosController->addVehiculo();
        break;


    case 'delete':
        $vehiculosController = new VehiculosController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $vehculosController->deleteVehiculo($id);
        break;



        case 'showLogin':
            $adminController = new adminController();
            $adminController->showLogin();
            break;

        case 'login':
            $adminController = new adminController();
            $adminController->login();
            break;

        case 'logout':
            $adminController = new adminController();
            $adminController->logout();


    default:
        $vehiculosController = new vehiculosController();
        $vehiculosController->showError();
    break;

}




