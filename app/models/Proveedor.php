<?php
require_once '../config/Database.php';

class Proveedor {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllProveedores() {
        $stmt = $this->db->query("SELECT pr.id as proveedor_id, pr.empresa, p.* FROM proveedor pr 
                                  JOIN persona p ON pr.persona_id = p.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM proveedor WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO proveedor (persona_id, empresa) VALUES (?, ?)");
        return $stmt->execute([$data['persona_id'], $data['empresa']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE proveedor SET persona_id = ?, empresa = ? WHERE id = ?");
        return $stmt->execute([$data['persona_id'], $data['empresa'], $id]);
    }
}
?>