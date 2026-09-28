<?php

require_once __DIR__ . '/../../config/Database.php';

class Categoria {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM categorias";
        $consultar = $this->db->prepare($query);
        $consultar->execute();
        return $consultar->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($nombre) {
        $query = "INSERT INTO categorias (nombre) VALUES (:nombre)";
        $consultar = $this->db->prepare($query);
        $consultar->bindParam(':nombre', $nombre);
        return $consultar->execute();
    }
}