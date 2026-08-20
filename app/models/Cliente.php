<?php
require_once '../config/Database.php';

class Cliente {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllClientes() {
        $stmt = $this->db->query("SELECT cl.id as cliente_id, p.* FROM clientes cl 
                                  JOIN persona p ON cl.persona_id = p.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO clientes (persona_id) VALUES (?)");
        return $stmt->execute([$data['persona_id']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE clientes SET persona_id = ? WHERE id = ?");
        return $stmt->execute([$data['persona_id'], $id]);
    }
}
?>