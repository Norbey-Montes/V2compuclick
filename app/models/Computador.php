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
                        comp.stock, 
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

    public function guardar($marca, $proveedor_id, $modelo, $procesador, $ram, $stock, $almacenamiento, $preciocompra, $precioventa)
    {
        try {
            // 1. Guardar el nombre de la marca en la tabla 'marca' y obtener su id generado
            $sqlMarca = "INSERT INTO marca (nombre) VALUES (:marca)";
            $consultaMarca = $this->connection->prepare($sqlMarca);
            $consultaMarca->bindParam(':marca', $marca);
            $consultaMarca->execute();
            $marca_id = $this->connection->lastInsertId();

            // 2. Guardar el computador asignándole el marca_id recién creado
            $sql = "INSERT INTO computador (marca_id, proveedor_id, modelo, procesador, ram, stock, almacenamiento, preciocompra, precioventa)
                    VALUES (:marca_id, :proveedor_id, :modelo, :procesador, :ram, :stock, :almacenamiento, :preciocompra, :precioventa)";
            
            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':marca_id', $marca_id);
            $consulta->bindParam(':proveedor_id', $proveedor_id);
            $consulta->bindParam(':modelo', $modelo);
            $consulta->bindParam(':procesador', $procesador);
            $consulta->bindParam(':ram', $ram);
            $consulta->bindParam(':stock', $stock);
            $consulta->bindParam(':almacenamiento', $almacenamiento);
            $consulta->bindParam(':preciocompra', $preciocompra);
            $consulta->bindParam(':precioventa', $precioventa);

            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar el computador: " . $modelo . " Error SQL: " . $e->getMessage();
        }
    }
}