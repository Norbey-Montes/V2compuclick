<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente - V2compuclick</title>
</head>
<body>
    <h1>Vincular Cliente</h1>
    <form action="index.php?controller=cliente&action=guardar" method="POST">
        <label>ID de Persona Existente:</label>
        <input type="number" name="persona_id" required><br>
        <button type="submit">Guardar Cliente</button>
    </form>
    <a href="index.php?controller=cliente&action=index">Cancelar</a>
</body>
</html>