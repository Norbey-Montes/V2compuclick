<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Venta</title>
</head>
<body>

    <h1>Crear Venta</h1>

    <form action="/ventas" method="POST">
        <label>Cliente ID:</label>
        <input type="number" name="cliente_id" required><br><br>

        <label>Tipo Pago ID:</label>
        <input type="number" name="tipopago_id" required><br><br>

        <label>Total Venta:</label>
        <input type="number" step="0.01" name="total" placeholder="0.00" required><br><br>

        <h3>Ítems de Venta</h3>

        <label>Computador ID:</label>
        <input type="number" name="computadores[0][computador_id]" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="computadores[0][cantidad]" value="1" required><br><br>

        <label>Precio Unitario:</label>
        <input type="number" step="0.01" name="computadores[0][precio]" placeholder="0.00" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/ventas"><button>Volver</button></a>

</body>
</html>