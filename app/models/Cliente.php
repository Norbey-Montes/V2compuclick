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
            
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT 
                        c.id AS cliente_id,
                        c.persona_id,
                        p.nombres,
                        p.apellidos,
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

    public function getById($id)
    {
        try {
            $sql = "SELECT c.id AS cliente_id, c.persona_id, p.* 
                    FROM clientes c
                    INNER JOIN persona p ON c.persona_id = p.id
                    WHERE c.id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion)
    {
        try {
            // 1. Insertar en la tabla persona
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

            // 2. Insertar en la tabla clientes
            $sql = "INSERT INTO clientes (persona_id) VALUES (:persona_id)";
            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':persona_id', $persona_id);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar el cliente: " . $nombres . " " . $apellidos . " Error SQL: " . $e->getMessage();
            return false;
        }
    }

    public function actualizar($id, $persona_id, $tipodoc_id, $tipopersona_id, $ciudad_id, $nombres, $apellidos, $documento, $telefono, $email, $direccion)
    {
        try {
            // Actualizar datos de la persona asociada al cliente
            $sql = "UPDATE persona SET 
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

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':persona_id', $persona_id, PDO::PARAM_INT);
            $consulta->bindParam(':tipodoc_id', $tipodoc_id);
            $consulta->bindParam(':tipopersona_id', $tipopersona_id);
            $consulta->bindParam(':ciudad_id', $ciudad_id);
            $consulta->bindParam(':nombres', $nombres);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':documento', $documento);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':direccion', $direccion);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el cliente: " . $e->getMessage();
            return false;
        }
    }
}