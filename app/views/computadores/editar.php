<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Computador - V2compuclick</title>
</head>
<body>
    <h1>Editar Computador</h1>
    <form action="index.php?controller=computador&action=actualizar&id=<?= $computador['id'] ?>" method="POST">
        <label>Marca ID:</label><input type="number" name="marca_id" value="<?= $computador['marca_id'] ?>" required><br>
        <label>Modelo:</label><input type="text" name="modelo" value="<?= $computador['modelo'] ?>" required><br>
        <label>Procesador:</label><input type="text" name="procesador" value="<?= $computador['procesador'] ?>" required><br>
        <label>RAM:</label><input type="text" name="ram" value="<?= $computador['ram'] ?>" required><br>
        <label>Almacenamiento:</label><input type="text" name="almacenamiento" value="<?= $computador['almacenamiento'] ?>" required><br>
        <label>Precio:</label><input type="number" step="0.01" name="precio" value="<?= $computador['precio'] ?>" required><br>
        <label>Stock:</label><input type="number" name="stock" value="<?= $computador['stock'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?controller=computador&action=index">Cancelar</a>
</body>
</html>