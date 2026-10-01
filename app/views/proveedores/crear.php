<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proveedor</title>
</head>
<body>

    <h1>Crear Proveedor</h1>

    <form action="/proveedores" method="POST">
        <h3>Datos de la Empresa</h3>
        <label>Nombre de la Empresa:</label>
        <input type="text" name="empresa" required><br><br>

        <h3>Datos del Representante</h3>
        <label>Tipo Documento:</label>
        <select name="tipodoc_id">
            <option value="1">CC - Cédula de Ciudadanía</option>
            <option value="2">NIT - Número de Identificación Tributaria</option>
            <option value="3">CE - Cédula de Extranjería</option>
        </select><br><br>

        <label>Tipo Persona:</label>
        <select name="tipopersona_id">
            <option value="2">Persona Jurídica</option>
            <option value="1">Persona Natural</option>
        </select><br><br>

        <label>Ciudad ID:</label>
        <input type="number" name="ciudad_id" value="1"><br><br>

        <label>Nombres del Representante:</label>
        <input type="text" name="nombres" required><br><br>

        <label>Apellidos del Representante:</label>
        <input type="text" name="apellidos" required><br><br>

        <label>Documento / NIT:</label>
        <input type="text" name="documento" required><br><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono"><br><br>

        <label>Email:</label>
        <input type="text" name="email"><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion"><br><br>

        <button type="submit">Guardar Proveedor</button>
    </form>

    <br>
    <a href="/proveedores">Volver</a>

</body>
</html>