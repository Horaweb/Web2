
<?php
class concesionariasView{

    public function imprimirConcesionarias($concesionarias){
        include 'templates/listas/listaConcesionarias.phtml';
    }

    public function imprimirConcesionariaById($concesionaria, $vehiculos){
        include 'templates/listas/listarUnidades.phtml';
    }

    public function imprimirConcesionariasxLugar($lugar){
        include 'templates/listas/listaConcesionariasxLugar.phtml';
    }


    public function showFormConcesionarias(){
        include 'templates/forms/formNuevoC.phtml';  
    }

    public function showFormEdit($concesionaria){
        include 'templates/forms/formEditarConcesionaria.phtml';  
    }

    public function showError($error = ''){
        include 'templates/error.phtml';
    }
}