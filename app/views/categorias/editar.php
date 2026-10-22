<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
</head>
<body>

    <h1>Editar Categoría</h1>

    <form action="/categorias/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $categoria['id'] ?? '' ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $categoria['nombre'] ?? '' ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="/categorias">Cancelar</a>

</body>
</html>