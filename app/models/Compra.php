<?php

require_once __DIR__ . '/../../config/Database.php';

class Compra {
    private $connection;

    public function __construct() {
        try {
            $database = new Database();
            $this->connection = $database->connect();
        } catch (PDOException $e) {
            $this->connection = null;
        }
    }

    public function getAll() {
        try {
            $sql = "SELECT 
                        c.id,
                        prov.empresa,
                        c.fecha,
                        c.total
                    FROM compra c
                    LEFT JOIN proveedor prov ON c.proveedor_id = prov.id
                    ORDER BY c.id DESC";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT 
                        c.*, 
                        prov.empresa 
                    FROM compra c
                    LEFT JOIN proveedor prov ON c.proveedor_id = prov.id
                    WHERE c.id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function guardar($proveedor_id, $fecha, $total, $productos) {
        try {
            // 1. Insertar la cabecera en la tabla 'compra'
            $sqlCompra = "INSERT INTO compra (proveedor_id, fecha, total) VALUES (:proveedor_id, :fecha, :total)";
            $consultaCompra = $this->connection->prepare($sqlCompra);
            $consultaCompra->bindParam(':proveedor_id', $proveedor_id);
            $consultaCompra->bindParam(':fecha', $fecha);
            $consultaCompra->bindParam(':total', $total);
            $consultaCompra->execute();

            $compra_id = $this->connection->lastInsertId();

            // 2. Insertar los ítems en la tabla 'descripcompra'
            if (!empty($productos)) {
                $sqlDetalle = "INSERT INTO descripcompra (compra_id, computador_id, cantidad, precio) 
                               VALUES (:compra_id, :computador_id, :cantidad, :precio)";
                $consultaDetalle = $this->connection->prepare($sqlDetalle);

                foreach ($productos as $item) {
                    $consultaDetalle->bindParam(':compra_id', $compra_id);
                    $consultaDetalle->bindParam(':computador_id', $item['computador_id']);
                    $consultaDetalle->bindParam(':cantidad', $item['cantidad']);
                    $consultaDetalle->bindParam(':precio', $item['precio']);
                    $consultaDetalle->execute();
                }
            }

            return true;
        } catch (PDOException $e) {
            echo "Error al guardar la compra. Error SQL: " . $e->getMessage();
            return false;
        }
    }
}