<?php

require_once __DIR__ . '/../../config/Database.php';

class Proveedor
{
    private $connection;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->connection = $database->connect();
        } catch (PDOException $e) {
            $this->connection = null;
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT 
                        prov.id AS proveedor_id,
                        prov.empresa,
                        CONCAT(p.nombres, ' ', p.apellidos) AS representante,
                        p.telefono
                    FROM proveedor prov
                    LEFT JOIN persona p ON prov.persona_id = p.id";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}