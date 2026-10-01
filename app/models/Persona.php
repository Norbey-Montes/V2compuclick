<?php

require_once __DIR__ . '/../../config/Database.php';

class Persona
{
    private $connection;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->connection = $database->connect();
        } catch (PDOException $e) {
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT p.*, 
                           td.nombre as tipodoc, 
                           tp.nombre as tipopersona, 
                           c.nombre as ciudad 
                    FROM persona p 
                    LEFT JOIN tipodoc td ON p.tipodoc_id = td.id
                    LEFT JOIN tipopersona tp ON p.tipopersona_id = tp.id
                    LEFT JOIN ciudad c ON p.ciudad_id = c.id";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM persona WHERE id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($tipodoc_id, $documento, $nombres, $apellidos, $direccion, $telefono, $email, $tipopersona_id, $ciudad_id)
    {
        try {
            $sql = "INSERT INTO persona (tipodoc_id, documento, nombres, apellidos, direccion, telefono, email, tipopersona_id, ciudad_id) 
                    VALUES (:tipodoc_id, :documento, :nombres, :apellidos, :direccion, :telefono, :email, :tipopersona_id, :ciudad_id)";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':tipodoc_id', $tipodoc_id);
            $consulta->bindParam(':documento', $documento);
            $consulta->bindParam(':nombres', $nombres);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':direccion', $direccion);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':tipopersona_id', $tipopersona_id);
            $consulta->bindParam(':ciudad_id', $ciudad_id);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar la persona: " . $nombres . " " . $apellidos . " Error SQL: " . $e->getMessage();
        }
    }
}