<?php
    require_once 'app/models/config.php';
    
class User {
    private $username = 'webadmin';
    private $password = 'admin';

    function authenticate($username, $password) {
        return $username === $this->username && $password === $this->password;
    }
}