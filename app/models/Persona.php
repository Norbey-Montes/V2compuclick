<?php
require_once '../config/Database.php';

class Persona {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT p.*, td.nombre as tipodoc, tp.nombre as tipopersona, c.nombre as ciudad 
                                  FROM persona p 
                                  JOIN tipodoc td ON p.tipodoc_id = td.id
                                  JOIN tipopersona tp ON p.tipopersona_id = tp.id
                                  JOIN ciudad c ON p.ciudad_id = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM persona WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO persona (tipodoc_id, documento, nombres, apellidos, direccion, telefono, email, tipopersona_id, ciudad_id) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['tipodoc_id'], $data['documento'], $data['nombres'], 
            $data['apellidos'], $data['direccion'], $data['telefono'], 
            $data['email'], $data['tipopersona_id'], $data['ciudad_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE persona SET tipodoc_id=?, documento=?, nombres=?, apellidos=?, direccion=?, telefono=?, email=?, tipopersona_id=?, ciudad_id=? WHERE id=?");
        return $stmt->execute([
            $data['tipodoc_id'], $data['documento'], $data['nombres'], 
            $data['apellidos'], $data['direccion'], $data['telefono'], 
            $data['email'], $data['tipopersona_id'], $data['ciudad_id'], $id
        ]);
    }
}
?>