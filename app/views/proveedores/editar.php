<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
</head>
<body>
    <h1>Editar Proveedor</h1>
    <form action="/proveedores/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $proveedor['proveedor_id'] ?? '' ?>">
        <input type="hidden" name="persona_id" value="<?= $proveedor['persona_id'] ?? '' ?>">

        <label>Empresa:</label><br>
        <input type="text" name="empresa" value="<?= $proveedor['empresa'] ?? '' ?>" required><br><br>

        <label>Tipo Documento ID:</label><br>
        <input type="text" name="tipodoc_id" value="<?= $proveedor['tipodoc_id'] ?? '' ?>"><br><br>

        <label>Tipo Persona ID:</label><br>
        <input type="text" name="tipopersona_id" value="<?= $proveedor['tipopersona_id'] ?? '' ?>"><br><br>

        <label>Ciudad ID:</label><br>
        <input type="text" name="ciudad_id" value="<?= $proveedor['ciudad_id'] ?? '' ?>"><br><br>

        <label>Nombres del Representante:</label><br>
        <input type="text" name="nombres" value="<?= $proveedor['nombres'] ?? '' ?>" required><br><br>

        <label>Apellidos del Representante:</label><br>
        <input type="text" name="apellidos" value="<?= $proveedor['apellidos'] ?? '' ?>" required><br><br>

        <label>Documento / NIT:</label><br>
        <input type="text" name="documento" value="<?= $proveedor['documento'] ?? '' ?>" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $proveedor['telefono'] ?? '' ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $proveedor['email'] ?? '' ?>"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= $proveedor['direccion'] ?? '' ?>"><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="/proveedores">Cancelar</a>
</body>
</html>