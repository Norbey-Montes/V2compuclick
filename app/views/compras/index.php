<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Compras - V2compuclick</title>
</head>
<body>
    <h1>Gestión de Compras</h1>

    <!-- Alertas de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'registrado'): ?>
        <p><b>¡Registrado con éxito!</b> La compra se ha guardado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <p style="color: red;"><b>¡Eliminado con éxito!</b> La compra se ha borrado correctamente.</p>
    <?php endif; ?>

    <a href="/compras/crear"><button>Nueva Compra</button></a>
    <br><br>
    <?php if (!empty($compras)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $co): ?>
            <tr>
                <td><?= $co['id'] ?></td>
                <td><?= $co['empresa'] ?></td>
                <td><?= $co['fecha'] ?></td>
                <td>$<?= number_format($co['total'], 2) ?></td>
                <td>
                    <a href="/compras/ver?id=<?= $co['id'] ?>">Ver Detalle</a> |
                    
                    <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                    <form action="/compras/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta compra?');">
                        <input type="hidden" name="id" value="<?= $co['id'] ?>">
                        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay compras para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores"><button>Volver al inicio</button></a>
</body>
</html>