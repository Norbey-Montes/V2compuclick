<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Persona</title>
</head>
<body>

    <h1>Crear Persona</h1>

    <form action="/personas" method="POST">
        <label>Tipo Documento:</label>
        <select name="tipodoc_id">
            <option value="1">CC - Cédula de Ciudadanía</option>
            <option value="2">NIT - Número de Identificación Tributaria</option>
            <option value="3">CE - Cédula de Extranjería</option>
        </select><br><br>

        <label>Documento:</label>
        <input type="text" name="documento"><br><br>

        <label>Nombres:</label>
        <input type="text" name="nombres"><br><br>

        <label>Apellidos:</label>
        <input type="text" name="apellidos"><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion"><br><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono"><br><br>

        <label>Email:</label>
        <input type="email" name="email"><br><br>

        <label>Tipo Persona:</label>
        <select name="tipopersona_id">
            <option value="1">Persona Natural</option>
            <option value="2">Persona Jurídica</option>
        </select><br><br>

        <label>Ciudad ID:</label>
        <input type="number" name="ciudad_id" value="1"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/personas">Volver</a>

</body>
</html>