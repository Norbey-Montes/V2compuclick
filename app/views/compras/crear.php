<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Compra</title>
</head>
<body>

    <h1>Crear Compra</h1>

    <form action="/compras" method="POST">
        <label>ID Proveedor:</label>
        <input type="number" name="proveedor_id" value="1" required><br><br>

        <label>Fecha:</label>
        <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>" required><br><br>

        <label>Total Compra:</label>
        <input type="number" step="0.01" name="total" placeholder="0.00" required><br><br>

        <h3>Ítems Comprados</h3>

        <label>ID Computador:</label>
        <input type="number" name="productos[0][computador_id]" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="productos[0][cantidad]" value="1" required><br><br>

        <label>Costo Unitario:</label>
        <input type="number" step="0.01" name="productos[0][precio]" placeholder="0.00" required><br><br>

        <button type="submit">Guardar Compra</button>
    </form>

    <br>
    <a href="/compras">Volver</a>

</body>
</html>