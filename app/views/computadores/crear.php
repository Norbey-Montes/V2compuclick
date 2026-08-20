<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Computador - V2compuclick</title>
</head>
<body>
    <h1>Registrar Nuevo Computador</h1>
    <form action="index.php?controller=computador&action=guardar" method="POST">
        <label>Marca ID:</label><input type="number" name="marca_id" required><br>
        <label>Modelo:</label><input type="text" name="modelo" required><br>
        <label>Procesador:</label><input type="text" name="procesador" required><br>
        <label>RAM:</label><input type="text" name="ram" required><br>
        <label>Almacenamiento:</label><input type="text" name="almacenamiento" required><br>
        <label>Precio:</label><input type="number" step="0.01" name="precio" required><br>
        <label>Stock:</label><input type="number" name="stock" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php?controller=computador&action=index">Cancelar</a>
</body>
</html>