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

    public function getById($id)
    {
        try {
            $sql = "SELECT 
                        prov.id AS proveedor_id,
                        prov.empresa,
                        prov.persona_id,
                        p.nombres,
                        p.apellidos,
                        p.telefono,
                        p.email
                    FROM proveedor prov
                    LEFT JOIN persona p ON prov.persona_id = p.id
                    WHERE prov.id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($empresa, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion)
    {
        try {
            // 1. Guardar primero al representante en la tabla 'persona'
            $sqlPersona = "INSERT INTO persona (tipodoc_id, tipopersona_id, ciudad_id, nombres, apellidos, documento, telefono, email, direccion) 
                           VALUES (:tipodoc_id, :tipopersona_id, :ciudad_id, :nombres, :apellidos, :documento, :telefono, :email, :direccion)";
            $consultaPersona = $this->connection->prepare($sqlPersona);
            $consultaPersona->bindParam(':tipodoc_id', $tipodoc_id);
            $consultaPersona->bindParam(':tipopersona_id', $tipopersona_id);
            $consultaPersona->bindParam(':ciudad_id', $ciudad_id);
            $consultaPersona->bindParam(':nombres', $nombres);
            $consultaPersona->bindParam(':apellidos', $apellidos);
            $consultaPersona->bindParam(':documento', $documento);
            $consultaPersona->bindParam(':telefono', $telefono);
            $consultaPersona->bindParam(':email', $email);
            $consultaPersona->bindParam(':direccion', $direccion);
            $consultaPersona->execute();

            $persona_id = $this->connection->lastInsertId();

            // 2. Guardar el proveedor con el persona_id generado
            $sql = "INSERT INTO proveedor (persona_id, empresa) VALUES (:persona_id, :empresa)";
            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':persona_id', $persona_id);
            $consulta->bindParam(':empresa', $empresa);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar el proveedor: " . $empresa . " Error SQL: " . $e->getMessage();
            return false;
        }
    }
}