<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Persona</title>
</head>
<body>

    <h1>Crear Persona</h1>

    <form action="/personas/guardar" method="POST">
        <label>Tipo Documento ID:</label>
        <input type="number" name="tipodoc_id"><br><br>

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

        <label>Tipo Persona ID:</label>
        <input type="number" name="tipopersona_id"><br><br>

        <label>Ciudad ID:</label>
        <input type="number" name="ciudad_id"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="/personas">Volver</a>

</body>
</html>