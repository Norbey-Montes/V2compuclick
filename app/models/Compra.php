<?php
require_once '../config/Database.php';

class Compra {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllcompras() {
        $stmt = $this->db->query("SELECT co.*, pr.empresa FROM compra co 
                                  JOIN proveedor pr ON co.proveedor_id = pr.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompraById($id) {
        $stmt = $this->db->prepare("SELECT co.*, pr.empresa FROM compra co 
                                    JOIN proveedor pr ON co.proveedor_id = pr.id 
                                    WHERE co.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDescripCompra($compra_id) {
        $stmt = $this->db->prepare("SELECT dc.*, comp.modelo, m.nombre as marca FROM descripcompra dc
                                    JOIN computador comp ON dc.computador_id = comp.id
                                    JOIN marca m ON comp.marca_id = m.id
                                    WHERE dc.compra_id = ?");
        $stmt->execute([$compra_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarCompra($cabecera, $detalles) {
        try {
            $this->db->beginTransaction();

            // Insertar cabecera de compra
            $stmt = $this->db->prepare("INSERT INTO compra (proveedor_id, fecha, total) VALUES (?, ?, ?)");
            $stmt->execute([$cabecera['proveedor_id'], $cabecera['fecha'], $cabecera['total']]);
            $compra_id = $this->db->lastInsertId();

            // Insertar detalles y sumar stock
            foreach ($detalles as $item) {
                $stmtDet = $this->db->prepare("INSERT INTO descripcompra (compra_id, computador_id, cantidad, precio) VALUES (?, ?, ?, ?)");
                $stmtDet->execute([$compra_id, $item['computador_id'], $item['cantidad'], $item['precio']]);

                // Actualizar inventario (aumenta stock)
                $stmtStock = $this->db->prepare("UPDATE computador SET stock = stock + ? WHERE id = ?");
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