<?php


class vehiculosView{

    function imprimirVehiculos($vehiculos){
        include 'templates/layout/header.phtml';
        include 'templates/listas/listaVehiculos.phtml';
    }

    function imprimirVehiculosxTipo($vehiculos, $tipo){
        include 'templates/layout/header.phtml';
        include 'templates/listas/listaVehiculosxTipo.phtml';
    }

    function imprimirVehiculosxMarca($vehiculos, $marca){
        include 'templates/layout/header.phtml';
        include 'templates/listas/listaVehiculosxMarca.phtml';
    }

    function showError(){
        include 'templates/error.phtml';
    }
}