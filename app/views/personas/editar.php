<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona - V2compuclick</title>
</head>
<body>
    <h1>Editar Persona</h1>
    <form action="index.php?controller=persona&action=actualizar&id=<?= $persona['id'] ?>" method="POST">
        <label>Tipo Documento ID:</label><input type="number" name="tipodoc_id" value="<?= $persona['tipodoc_id'] ?>" required><br>
        <label>Documento:</label><input type="text" name="documento" value="<?= $persona['documento'] ?>" required><br>
        <label>Nombres:</label><input type="text" name="nombres" value="<?= $persona['nombres'] ?>" required><br>
        <label>Apellidos:</label><input type="text" name="apellidos" value="<?= $persona['apellidos'] ?>" required><br>
        <label>Dirección:</label><input type="text" name="direccion" value="<?= $persona['direccion'] ?>"><br>
        <label>Teléfono:</label><input type="text" name="telefono" value="<?= $persona['telefono'] ?>"><br>
        <label>Email:</label><input type="email" name="email" value="<?= $persona['email'] ?>"><br>
        <label>Tipo Persona ID:</label><input type="number" name="tipopersona_id" value="<?= $persona['tipopersona_id'] ?>" required><br>
        <label>Ciudad ID:</label><input type="number" name="ciudad_id" value="<?= $persona['ciudad_id'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php?controller=persona&action=index">Cancelar</a>
</body>
</html>