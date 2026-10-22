<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
</head>
<body>

    <h1>Editar Persona</h1>

    <form action="/personas/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $persona['id'] ?? '' ?>">

        <label>Tipo Doc ID:</label><br>
        <input type="text" name="tipodoc_id" value="<?= $persona['tipodoc_id'] ?? '' ?>"><br><br>

        <label>Documento:</label><br>
        <input type="text" name="documento" value="<?= $persona['documento'] ?? '' ?>"><br><br>

        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="<?= $persona['nombres'] ?? '' ?>"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="<?= $persona['apellidos'] ?? '' ?>"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= $persona['direccion'] ?? '' ?>"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $persona['telefono'] ?? '' ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $persona['email'] ?? '' ?>"><br><br>

        <label>Tipo Persona ID:</label><br>
        <input type="text" name="tipopersona_id" value="<?= $persona['tipopersona_id'] ?? '' ?>"><br><br>

        <label>Ciudad ID:</label><br>
        <input type="text" name="ciudad_id" value="<?= $persona['ciudad_id'] ?? '' ?>"><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="/personas">Cancelar</a>

</body>
</html>