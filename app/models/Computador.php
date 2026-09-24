<?php

require_once __DIR__ . '/../../config/Database.php';

class Computador
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
            $sql = "SELECT 
                        comp.id,
                        comp.modelo, 
                        comp.procesador, 
                        comp.ram, 
                        comp.almacenamiento, 
                        comp.preciocompra,
                        comp.precioventa,
                        m.nombre AS marca,
                        prov.empresa AS proveedor
                    FROM computador comp  
                    LEFT JOIN marca m ON comp.marca_id = m.id
                    LEFT JOIN proveedor prov ON comp.proveedor_id = prov.id";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return []; 
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT id, modelo, procesador, ram, almacenamiento, preciocompra, precioventa 
                    FROM computador 
                    WHERE id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}