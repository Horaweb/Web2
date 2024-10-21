<?php
require_once 'app/models/config.php';

class VehiculosModel{
    protected $db;

    function __construct(){
        $this->db = new PDO('mysql:host='.MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    function getVehiculos(){

        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos');
        $query->execute();

        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);

        // retorno los vehiculos
        return $vehiculos; 

    }

    function getVehiculosxTipo($tipo){

        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE tipo = ?');
        $query->execute([$tipo]);

        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);

        // retorno los vehiculos
        return $vehiculos; 

    }

    function getVehiculosxMarca($marca){

        // hago la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE marca = ?');
        $query->execute([$marca]);

        // obtengo la rta
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);

        // retorno los vehiculos 
        return $vehiculos;

    }

    function insertVehiculo($marca, $modelo, $año, $tipo) {
        $query = $this->db->prepare("INSERT INTO vehiculos (marca, modelo, año, tipo) VALUES (?, ?, ?, ?)");
        $query->execute([$marca, $modelo, $año, $tipo, false]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
     */
    function deleteVehiculoxId($id) {
        $query = $this->db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

}