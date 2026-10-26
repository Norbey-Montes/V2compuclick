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
                        p.*
                    FROM proveedor prov
                    INNER JOIN persona p ON prov.persona_id = p.id
                    WHERE prov.id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($empresa, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion)
    {
        try {
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

    public function actualizar($id, $persona_id, $empresa, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion)
    {
        try {
            $sqlPersona = "UPDATE persona SET 
                           tipodoc_id = :tipodoc_id, 
                           tipopersona_id = :tipopersona_id, 
                           ciudad_id = :ciudad_id, 
                           nombres = :nombres, 
                           apellidos = :apellidos, 
                           documento = :documento, 
                           telefono = :telefono, 
                           email = :email, 
                           direccion = :direccion 
                           WHERE id = :persona_id";

            $consultaPersona = $this->connection->prepare($sqlPersona);
            $consultaPersona->bindParam(':persona_id', $persona_id, PDO::PARAM_INT);
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

            $sql = "UPDATE proveedor SET empresa = :empresa WHERE id = :id";
            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':empresa', $empresa);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el proveedor: " . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM proveedor WHERE id = :id";
            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el proveedor: " . $e->getMessage();
            return false;
        }
    }
}