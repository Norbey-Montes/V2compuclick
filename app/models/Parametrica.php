<?php
require_once __DIR__ . '/../../config/Database.php';

class Parametrica {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllFromTable($tabla) {
        // Validación básica de tablas permitidas por seguridad
        $permitidas = ['marca', 'tipodoc', 'tipopago', 'tipopersona', 'departamento', 'ciudad'];
        if (!in_array($tabla, $permitidas)) {
            return [];
        }
        $stmt = $this->db->query("SELECT * FROM `$tabla`");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertIntoTable($tabla, $data) {
        $permitidas = ['marca', 'tipodoc', 'tipopago', 'tipopersona', 'departamento', 'ciudad'];
        if (!in_array($tabla, $permitidas)) {
            return false;
        }
        $stmt = $this->db->prepare("INSERT INTO `$tabla` (nombre) VALUES (?)");
        return $stmt->execute([$data['nombre']]);
    }
}
?>
