<?php
class vehiculosView{

    function imprimirVehiculos($vehiculos){
        include 'templates/listas/listaVehiculos.phtml';
    }

    function imprimirVehiculoById($vehiculo, $concesionaria){
        include 'templates/listas/listarVehiculosDetalles.phtml';
    }

    function imprimirVehiculosxTipo($vehiculos, $tipo){
        include 'templates/listas/listaVehiculosxTipo.phtml';
    }

    function imprimirItems(){
        include 'templates/listas/listaItems.phtml';
    }

    function imprimirVehiculosxMarca($vehiculos, $marca){
        include 'templates/listas/listaVehiculosxMarca.phtml';
    }

    function showFormVehiculos(){
        include 'templates/forms/formNuevoV.phtml';  
    }

    function showFormEdit($vehiculo){
        include 'templates/forms/formEditarVehiculo.phtml';  
    }

    function showError($error = ''){
        include 'templates/error.phtml';
    }
}