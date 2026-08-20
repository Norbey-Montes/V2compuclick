<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Catálogos Paramétricos - V2compuclick</title>
</head>
<body>
    <h1>Administración de Catálogos (<?= ucfirst($tabla ?? 'marca') ?>)</h1>
    
    <p>Seleccionar tabla a gestionar: 
        <a href="index.php?controller=catalogo&action=index&tabla=marca">Marcas</a> | 
        <a href="index.php?controller=catalogo&action=index&tabla=tipodoc">Tipo Doc</a> | 
        <a href="index.php?controller=catalogo&action=index&tabla=tipopago">Tipo Pago</a> | 
        <a href="index.php?controller=catalogo&action=index&tabla=tipopersona">Tipo Persona</a> | 
        <a href="index.php?controller=catalogo&action=index&tabla=departamento">Departamentos</a> | 
        <a href="index.php?controller=catalogo&action=index&tabla=ciudad">Ciudades</a>
    </p>

    <form action="index.php?controller=catalogo&action=guardar" method="POST">
        <input type="hidden" name="tabla" value="<?= $tabla ?? 'marca' ?>">
        <label>Nombre del nuevo parámetro:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Agregar</button>
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="index.php">Volver al inicio</a>
</body>
</html>