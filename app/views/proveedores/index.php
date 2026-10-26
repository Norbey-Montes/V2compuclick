<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
</head>
<body>
    <h1>Listado de Proveedores</h1>

    <!-- Alertas de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <p><b>¡Actualizado con éxito!</b> El proveedor se ha modificado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <p style="color: red;"><b>¡Eliminado con éxito!</b> El proveedor se ha borrado correctamente.</p>
    <?php endif; ?>

    <a href="/proveedores/crear"><button>Crear Proveedor</button></a>
    <br><br>
    <?php if (!empty($proveedores)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Representante</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $prov): ?>
            <tr>
                <td><?= $prov['proveedor_id'] ?></td>
                <td><?= $prov['empresa'] ?></td>
                <td><?= $prov['representante'] ?></td>
                <td><?= $prov['telefono'] ?? 'Sin Teléfono' ?></td>
                <td>
                    <a href="/proveedores/editar?id=<?= $prov['proveedor_id'] ?>">Editar</a> |
                    
                    <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                    <form action="/proveedores/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">
                        <input type="hidden" name="id" value="<?= $prov['proveedor_id'] ?>">
                        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay proveedores para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores"><button>Volver al inicio</button></a>
</body>
</html>