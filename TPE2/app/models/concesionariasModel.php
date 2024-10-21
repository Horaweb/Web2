<?php

class concesionariasModel {
    private $db;

    public function __construct() {
       $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }
 
    public function getConcesionariaById($id) {    
        $query = $this->db->prepare("SELECT * FROM concesionarias WHERE id = ?");
        $query->execute([$id]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $id;
    }
}