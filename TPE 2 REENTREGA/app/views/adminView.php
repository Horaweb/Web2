<?php
class AdminView{

    public function showForm(){
        include 'templates/forms/formLogin.phtml';
    }
    public function showError($error = ''){
        include 'templates/error.phtml';
    }
}