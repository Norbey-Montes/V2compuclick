<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor - V2compuclick</title>
</head>
<body>
    <h1>Editar Proveedor</h1>
    <form action="index.php?controller=proveedor&action=actualizar&id=<?= $proveedor['id'] ?>" method="POST">
        <label>ID de Persona:</label><input type="number" name="persona_id" value="<?= $proveedor['persona_id'] ?>" required><br>
        <label>Empresa:</label><input type="text" name="empresa" value="<?= $proveedor['empresa'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?controller=proveedor&action=index">Cancelar</a>
</body>
</html>