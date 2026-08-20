<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Persona - V2compuclick</title>
</head>
<body>
    <h1>Registrar Nueva Persona</h1>
    <form action="index.php?controller=persona&action=guardar" method="POST">
        <label>Tipo Documento ID:</label><input type="number" name="tipodoc_id" required><br>
        <label>Documento:</label><input type="text" name="documento" required><br>
        <label>Nombres:</label><input type="text" name="nombres" required><br>
        <label>Apellidos:</label><input type="text" name="apellidos" required><br>
        <label>Dirección:</label><input type="text" name="direccion"><br>
        <label>Teléfono:</label><input type="text" name="telefono"><br>
        <label>Email:</label><input type="email" name="email"><br>
        <label>Tipo Persona ID:</label><input type="number" name="tipopersona_id" required><br>
        <label>Ciudad ID:</label><input type="number" name="ciudad_id" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php?controller=persona&action=index">Cancelar</a>
</body>
</html>