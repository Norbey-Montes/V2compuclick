<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
</head>
<body>
    <h2>Crear Nueva Categoría</h2>

    <form action="/categorias/guardar" method="POST">
        <div>
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Ej: Accesorios">
        </div>
        <br>
        <button type="submit">Guardar</button>
        <a href="/categorias">Cancelar</a>
    </form>
</body>
</html>