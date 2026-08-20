<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta - V2compuclick</title>
</head>
<body>
    <h1>Registrar Venta</h1>
    <form action="index.php?controller=venta&action=guardar" method="POST">
        <label>Cliente ID:</label><input type="number" name="cliente_id" required><br>
        <label>Tipo Pago ID:</label><input type="number" name="tipopago_id" required><br>
        <label>Total Venta:</label><input type="number" step="0.01" name="total" required><br>
        
        <h3>Ítems de Venta (Simulación de estructura de productos)</h3>
        <p><i>(Ajusta los inputs según la maquetación de tu carrito o formulario dinámico)</i></p>
        <label>Computador ID:</label><input type="number" name="productos[0][computador_id]">
        <label>Cantidad:</label><input type="number" name="productos[0][cantidad]">
        <label>Precio Unitario:</label><input type="number" step="0.01" name="productos[0][precio]"><br><br>

        <button type="submit">Finalizar Venta</button>
    </form>
    <a href="index.php?controller=venta&action=index">Cancelar</a>
</body>
</html>