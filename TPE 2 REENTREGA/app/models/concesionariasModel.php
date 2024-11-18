<?php
require_once 'app/models/config.php';

class concesionariasModel {
    private $db;

    public function __construct() {
       $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }
 
    public function getConcesionariaById($id){
        $query = $this->db->prepare('SELECT * FROM concesionarias WHERE id = ?');
        $query->execute([$id]);
        $concesionaria = $query->fetch(PDO::FETCH_OBJ);

        return $concesionaria;
    }

    public function getAllConcesionarias(){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM concesionarias');
        $query->execute();
        // obtengo la rta
        $concesionarias = $query->fetchAll(PDO::FETCH_OBJ);
        // retorno los vehiculos
        return $concesionarias; 
    }

    public function getConcesionariasxLugar($lugar){
        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM concesionarias WHERE lugar = ?');
        $query->execute([$lugar]);
        // obtengo la rta
        $concesionarias = $query->fetchAll(PDO::FETCH_OBJ);
        // retorno las concesionarias
        return $concesionarias; 
    }

    public function insertConcesionaria($nombre, $lugar, $direccion, $email) {
        $query = $this->db->prepare("INSERT INTO concesionarias (nombre, lugar, direccion, email) VALUES (?, ?, ?, ?)");
        $query->execute([$nombre, $lugar, $direccion, $email]);

        return $this->db->lastInsertId();
    }

    public function editarConcesionaria($id, $nombre, $lugar, $direccion, $email) {
        $query = $this->db->prepare("UPDATE concesionarias SET nombre = ?, lugar = ?, direccion=?, email=? WHERE concesionarias.id = ?");
        $query->execute([$nombre, $lugar, $direccion, $email, $id]);
    }

    /*
      Elimina una tarea dado su id.
     */
    public function deleteConcesionariaById($id) {
        $query = $this->db->prepare('DELETE FROM concesionarias WHERE id = ?');
        $query->execute([$id]);
    }

}