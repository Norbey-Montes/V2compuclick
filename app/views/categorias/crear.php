<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Categoría</title>
</head>
<body>

    <h1>Crear Categoría</h1>

    <form action="/categorias" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/categorias">Volver</a>

</body>
</html>