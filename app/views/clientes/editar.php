<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="/clientes/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $cliente['cliente_id'] ?? '' ?>">
        <input type="hidden" name="persona_id" value="<?= $cliente['persona_id'] ?? '' ?>">

        <label>Tipo Documento ID:</label><br>
        <input type="text" name="tipodoc_id" value="<?= $cliente['tipodoc_id'] ?? '' ?>"><br><br>

        <label>Tipo Persona ID:</label><br>
        <input type="text" name="tipopersona_id" value="<?= $cliente['tipopersona_id'] ?? '' ?>"><br><br>

        <label>Ciudad ID:</label><br>
        <input type="text" name="ciudad_id" value="<?= $cliente['ciudad_id'] ?? '' ?>"><br><br>

        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="<?= $cliente['nombres'] ?? '' ?>"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="<?= $cliente['apellidos'] ?? '' ?>"><br><br>

        <label>Documento:</label><br>
        <input type="text" name="documento" value="<?= $cliente['documento'] ?? '' ?>"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $cliente['telefono'] ?? '' ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $cliente['email'] ?? '' ?>"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= $cliente['direccion'] ?? '' ?>"><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="/clientes">Cancelar</a>
</body>
</html>