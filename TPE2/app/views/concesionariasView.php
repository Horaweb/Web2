<?php


class concesionariasView{

    function imprimirConcesionarias($concesionarias){
        include 'templates/layout/header.phtml';
        include 'templates/listas/listaConcesionarias.phtml';
    }



    function showError(){
        include 'templates/error.phtml';
    }
}