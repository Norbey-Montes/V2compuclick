<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente - V2compuclick</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="index.php?controller=cliente&action=actualizar&id=<?= $cliente['id'] ?>" method="POST">
        <label>ID de Persona:</label>
        <input type="number" name="persona_id" value="<?= $cliente['persona_id'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?controller=cliente&action=index">Cancelar</a>
</body>
</html>