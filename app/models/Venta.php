<?php

require_once __DIR__ . '/../../config/Database.php';

class Venta {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        try {
            // Revisa que el nombre de la tabla coincida con tu base de datos en phpMyAdmin
            $query = "SELECT * FROM ventas";
            $consultar = $this->db->prepare($query);
            $consultar->execute();
            return $consultar->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}