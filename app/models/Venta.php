<?php

require_once __DIR__ . '/../../config/Database.php';

class Venta {
    private $connection;

    public function __construct() {
        try {
            $database = new Database();
            $this->connection = $database->connect();
            if ($this->connection) {
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            $this->connection = null;
        }
    }

    public function getAll() {
        if (!$this->connection) {
            return [];
        }

        try {
            $sql = "SELECT 
                        v.id AS venta_id,
                        CONCAT(p.nombres, ' ', p.apellidos) AS cliente,
                        tp.nombre AS tipo_pago,
                        v.fecha,
                        v.total
                    FROM venta v
                    LEFT JOIN clientes c ON v.cliente_id = c.id
                    LEFT JOIN persona p ON c.persona_id = p.id
                    LEFT JOIN tipopago tp ON v.tipopago_id = tp.id
                    ORDER BY v.id DESC";

            $consulta = $this->connection->query($sql);
            return $consulta ? $consulta->fetchAll(PDO::FETCH_ASSOC) : [];
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT 
                        v.*,
                        CONCAT(p.nombres, ' ', p.apellidos) AS cliente,
                        tp.nombre AS tipopago
                    FROM venta v
                    LEFT JOIN clientes c ON v.cliente_id = c.id
                    LEFT JOIN persona p ON c.persona_id = p.id
                    LEFT JOIN tipopago tp ON v.tipopago_id = tp.id
                    WHERE v.id = :id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getDetallesByVentaId($venta_id) {
        try {
            $sql = "SELECT 
                        dv.cantidad,
                        dv.precio,
                        comp.modelo,
                        m.nombre AS marca
                    FROM descripventa dv
                    INNER JOIN computador comp ON dv.computador_id = comp.id
                    LEFT JOIN marca m ON comp.marca_id = m.id
                    WHERE dv.venta_id = :venta_id";

            $consulta = $this->connection->prepare($sql);
            $consulta->bindParam(':venta_id', $venta_id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function guardar($cliente_id, $tipopago_id, $total, $computadores) {
        if (!$this->connection) {
            echo "Error: No hay conexión a la base de datos.";
            return false;
        }

        try {
            $fecha = date('Y-m-d H:i:s');

            // 1. Insertar la cabecera en la tabla 'venta'
            $sqlVenta = "INSERT INTO venta (cliente_id, tipopago_id, fecha, total) VALUES (:cliente_id, :tipopago_id, :fecha, :total)";
            $consultaVenta = $this->connection->prepare($sqlVenta);
            $consultaVenta->bindParam(':cliente_id', $cliente_id);
            $consultaVenta->bindParam(':tipopago_id', $tipopago_id);
            $consultaVenta->bindParam(':fecha', $fecha);
            $consultaVenta->bindParam(':total', $total);
            $consultaVenta->execute();

            $venta_id = $this->connection->lastInsertId();

            // 2. Insertar los detalles en la tabla 'descripventa'
            if (!empty($computadores)) {
                $sqlDetalle = "INSERT INTO descripventa (venta_id, computador_id, cantidad, precio) 
                               VALUES (:venta_id, :computador_id, :cantidad, :precio)";
                $consultaDetalle = $this->connection->prepare($sqlDetalle);

                foreach ($computadores as $item) {
                    if (!empty($item['computador_id'])) {
                        $consultaDetalle->bindParam(':venta_id', $venta_id);
                        $consultaDetalle->bindParam(':computador_id', $item['computador_id']);
                        $consultaDetalle->bindParam(':cantidad', $item['cantidad']);
                        $consultaDetalle->bindParam(':precio', $item['precio']);
                        $consultaDetalle->execute();
                    }
                }
            }

            return true;
        } catch (PDOException $e) {
            echo "Error de MySQL al guardar venta: " . $e->getMessage();
            return false;
        }
    }
}