<?php

require_once __DIR__ . '/../../config/Database.php';

class Categoria
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
            $sql = "SELECT * FROM categorias";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT id, nombre 
                    FROM categorias 
                    WHERE id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($nombre)
    {
        try {
            $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar la categoría: " . $nombre . " Error SQL: " . $e->getMessage();
        }
    }
}