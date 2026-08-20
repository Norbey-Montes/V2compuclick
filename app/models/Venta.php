<?php
require_once '../config/Database.php';

class Venta {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllVentas() {
        $stmt = $this->db->query("SELECT v.*, CONCAT(p.nombres, ' ', p.apellidos) as cliente, tp.nombre as tipopago 
                                  FROM venta v 
                                  JOIN clientes c ON v.cliente_id = c.id
                                  JOIN persona p ON c.persona_id = p.id
                                  JOIN tipopago tp ON v.tipopago_id = tp.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVentaById($id) {
        $stmt = $this->db->prepare("SELECT v.*, CONCAT(p.nombres, ' ', p.apellidos) as cliente, tp.nombre as tipopago 
                                    FROM venta v 
                                    JOIN clientes c ON v.cliente_id = c.id
                                    JOIN persona p ON c.persona_id = p.id
                                    JOIN tipopago tp ON v.tipopago_id = tp.id 
                                    WHERE v.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDescripVenta($venta_id) {
        $stmt = $this->db->prepare("SELECT dv.*, comp.modelo, m.nombre as marca FROM descripventa dv
                                    JOIN computador comp ON dv.computador_id = comp.id
                                    JOIN marca m ON comp.marca_id = m.id
                                    WHERE dv.venta_id = ?");
        $stmt->execute([$venta_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarVenta($cabecera, $detalles) {
        try {
            $this->db->beginTransaction();

            // Insertar cabecera de venta
            $stmt = $this->db->prepare("INSERT INTO venta (cliente_id, tipopago_id, fecha, total) VALUES (?, ?, ?, ?)");
            $stmt->execute([$cabecera['cliente_id'], $cabecera['tipopago_id'], $cabecera['fecha'], $cabecera['total']]);
            $venta_id = $this->db->lastInsertId();

            // Insertar detalles de venta y descontar stock
            foreach ($detalles as $item) {
                $stmtDet = $this->db->prepare("INSERT INTO descripventa (venta_id, computador_id, cantidad, precio) VALUES (?, ?, ?, ?)");
                $stmtDet->execute([$venta_id, $item['computador_id'], $item['cantidad'], $item['precio']]);

                // Actualizar inventario
                $stmtStock = $this->db->prepare("UPDATE computador SET stock = stock - ? WHERE id = ?");
                $stmtStock->execute([$item['cantidad'], $item['computador_id']]);
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
?>