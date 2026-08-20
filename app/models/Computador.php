<?php
require_once '../config/Database.php';

class Computador {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllComputadores() {
        $stmt = $this->db->query("SELECT comp.*, m.nombre as marca FROM computador comp 
                                  JOIN marca m ON comp.marca_id = m.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM computador WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO computador (marca_id, modelo, procesador, ram, almacenamiento, precio, stock) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['marca_id'], $data['modelo'], $data['procesador'], 
            $data['ram'], $data['almacenamiento'], $data['precio'], $data['stock']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE computador SET marca_id=?, modelo=?, procesador=?, ram=?, almacenamiento=?, precio=?, stock=? WHERE id=?");
        return $stmt->execute([
            $data['marca_id'], $data['modelo'], $data['procesador'], 
            $data['ram'], $data['almacenamiento'], $data['precio'], $data['stock'], $id
        ]);
    }
}
?>