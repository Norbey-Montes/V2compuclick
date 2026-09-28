<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proveedor</title>
</head>
<body>

    <h1>Crear Proveedor</h1>

    <form action="/proveedores/guardar" method="POST">
        <label>ID Persona:</label>
        <input type="number" name="persona_id"><br><br>

        <label>Empresa:</label>
        <input type="text" name="empresa"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/proveedores">Volver</a>

</body>
</html>