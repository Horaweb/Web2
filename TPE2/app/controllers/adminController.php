<?php

require_once 'app/models/usuarioModel.php';

class adminController {

    function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($user->authenticate($username, $password)) {
                $_SESSION['logged_in'] = true;
                header('Location: router.php?action=dashboard');
                exit;
            } else {
                echo "<p> Credenciales incorrectas.</p>";
                include 'templates/formLogin.php';
                return;
            }
        }
        include 'templates/formLogin.php';
    }

    public function logout() {
        session_destroy();
        header('Location: router.php?action=login');
        exit;
    }
}