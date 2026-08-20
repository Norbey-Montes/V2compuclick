<?php
require_once '../config/Database.php';

class Ubicacion {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getDepartamentos() {
        $stmt = $this->db->query("SELECT * FROM departamento");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCiudadesByDepartamento($departamento_id) {
        $stmt = $this->db->prepare("SELECT * FROM ciudad WHERE departamento_id = ?");
        $stmt->execute([$departamento_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCiudades() {
        $stmt = $this->db->query("SELECT c.*, d.nombre as departamento FROM ciudad c JOIN departamento d ON c.departamento_id = d.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>