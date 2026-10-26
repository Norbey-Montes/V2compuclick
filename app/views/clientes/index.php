<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>

    <!-- Alertas de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> El cliente se ha modificado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <p style="color: red;"><b>¡Eliminado con éxito!</b> El cliente se ha borrado correctamente.</p>
    <?php endif; ?>

    <a href="/clientes/crear"><button>Crear Cliente</button></a>
    <br><br>
    
    <?php if (!empty($clientes)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cli): ?>
            <tr>
                <td><?= $cli['cliente_id'] ?></td>
                <td><?= $cli['nombre_completo'] ?></td>
                <td><?= $cli['documento'] ?></td>
                <td><?= $cli['telefono'] ?></td>
                <td><?= $cli['email'] ?></td>
                <td><?= $cli['direccion'] ?></td>
                <td>
                    <a href="/clientes/editar?id=<?= $cli['cliente_id'] ?>">Editar</a> |
                    
                    <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                    <form action="/clientes/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                        <input type="hidden" name="id" value="<?= $cli['cliente_id'] ?>">
                        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay clientes registrados para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores"><button>Volver al inicio</button></a>
</body>
</html>