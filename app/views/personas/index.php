<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Personas</h1>

    <!-- Alertas de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> La persona se ha modificado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <p style="color: red;"><b>¡Eliminado con éxito!</b> La persona se ha borrado correctamente.</p>
    <?php endif; ?>

    <a href="/personas/crear"><button>Nueva Persona</button></a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Doc</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['tipodoc'] ?></td>
                <td><?= $p['documento'] ?></td>
                <td><?= $p['nombres'] ?></td>
                <td><?= $p['apellidos'] ?></td>
                <td><?= $p['telefono'] ?></td>
                <td><?= $p['email'] ?></td>
                <td>
                    <a href="/personas/editar?id=<?= $p['id'] ?>">Editar</a> |
                    
                    <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                    <form action="/personas/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta persona?');">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><a href="/computadores"><button>Volver al inicio</button></a>
</body>
</html>