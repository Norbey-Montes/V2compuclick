<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Compra</title>
</head>
<body>

    <h1>Crear Compra</h1>

    <form action="/compras/guardar" method="POST">
        <label>ID Proveedor:</label>
        <input type="number" name="proveedor_id"><br><br>

        <label>Total Compra:</label>
        <input type="number" step="0.01" name="total"><br><br>

        <h3>Ítems Comprados</h3>

        <label>ID Computador:</label>
        <input type="number" name="productos[0][computador_id]"><br><br>

        <label>Cantidad:</label>
        <input type="number" name="productos[0][cantidad]"><br><br>

        <label>Costo Unitario:</label>
        <input type="number" step="0.01" name="productos[0][precio]"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/compras">Volver</a>

</body>
</html>