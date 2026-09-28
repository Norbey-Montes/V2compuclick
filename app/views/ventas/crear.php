<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Venta</title>
</head>
<body>

    <h1>Crear Venta</h1>

    <form action="/ventas/guardar" method="POST">
        <label>Cliente ID:</label>
        <input type="number" name="cliente_id"><br><br>

        <label>Tipo Pago ID:</label>
        <input type="number" name="tipopago_id"><br><br>

        <label>Total Venta:</label>
        <input type="number" step="0.01" name="total"><br><br>

        <h3>Ítems de Venta</h3>

        <label>Computador ID:</label>
        <input type="number" name="productos[0][computador_id]"><br><br>

        <label>Cantidad:</label>
        <input type="number" name="productos[0][cantidad]"><br><br>

        <label>Precio Unitario:</label>
        <input type="number" step="0.01" name="productos[0][precio]"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/ventas">Volver</a>

</body>
</html>