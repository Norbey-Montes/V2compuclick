<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proveedor - V2compuclick</title>
</head>
<body>
    <h1>Registrar Nuevo Proveedor</h1>
    <form action="index.php?controller=proveedor&action=guardar" method="POST">
        <label>ID de Persona:</label><input type="number" name="persona_id" required><br>
        <label>Empresa:</label><input type="text" name="empresa" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php?controller=proveedor&action=index">Cancelar</a>
</body>
</html>