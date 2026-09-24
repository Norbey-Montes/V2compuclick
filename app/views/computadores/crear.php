<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Computador</title>
</head>
<body>

    <h1>Crear Computador</h1>

    <form action="/computadores/guardar" method="POST">
        <label>Marca:</label>
        <input type="text" name="marca"><br><br>

        <label>Modelo:</label>
        <input type="text" name="modelo"><br><br>

        <label>Procesador:</label>
        <input type="text" name="procesador"><br><br>

        <label>RAM:</label>
        <input type="text" name="ram"><br><br>

        <label>Almacenamiento:</label>
        <input type="text" name="almacenamiento"><br><br>

        <label>Precio Compra:</label>
        <input type="number" step="0.01" name="preciocompra"><br><br>

        <label>Precio Venta:</label>
        <input type="number" step="0.01" name="precioventa"><br><br>

        <label>ID Proveedor:</label>
        <input type="number" name="proveedor_id"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/computadores">Volver</a>

</body>
</html>