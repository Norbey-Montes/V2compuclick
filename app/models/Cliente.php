<?php

require_once __DIR__ . '/../../config/Database.php';

class Cliente
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
                        c.id AS cliente_id,
                        CONCAT(p.nombres, ' ', p.apellidos) AS nombre_completo,
                        p.documento,
                        p.telefono,
                        p.email,
                        p.direccion
                    FROM clientes c
                    INNER JOIN persona p ON c.persona_id = p.id";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}