<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>

    <h1>Crear Cliente</h1>

    <form action="/clientes/guardar" method="POST">
        <label>ID Persona:</label>
        <input type="number" name="persona_id"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/clientes">Volver</a>

</body>
</html>