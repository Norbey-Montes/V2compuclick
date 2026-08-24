<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Compra - V2compuclick</title>
</head>
<body>
    <h1>Registrar Abastecimiento de Compra</h1>
    <form action="index.php?controller=compra&action=guardar" method="POST">
        <label>Proveedor ID:</label><input type="number" name="proveedor_id" required><br>
        <label>Total Compra:</label><input type="number" step="0.01" name="total" required><br>
        
        <h3>Ítems Comprados</h3>
        <label>Computador ID:</label><input type="number" name="productos[0][computador_id]" required>
        <label>Cantidad:</label><input type="number" name="productos[0][cantidad]" required>
        <label>Costo Unitario:</label><input type="number" step="0.01" name="productos[0][precio]" required><br><br>

        <button type="submit">Registrar Compra y Sumar Stock</button>
    </form>
    <a href="index.php?controller=compra&action=index">Cancelar</a>
</body>
</html>
