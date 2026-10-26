<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ventas - V2compuclick</title>
</head>
<body>
    <h1>Listado de Ventas</h1>

    <!-- Alertas de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'registrado'): ?>
        <p><b>¡Registrado con éxito!</b> La venta se ha guardado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <p style="color: red;"><b>¡Eliminado con éxito!</b> La venta se ha borrado correctamente.</p>
    <?php endif; ?>

    <a href="/ventas/crear"><button>Crear Venta</button></a>
    <br><br>
    <?php if (!empty($ventas)) { ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Cliente</th>
                <th>Tipo Pago</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $ven): ?>
            <tr>
                <td><?= $ven['venta_id'] ?></td>
                <td><?= $ven['cliente'] ?? 'Sin Cliente' ?></td>
                <td><?= $ven['tipo_pago'] ?? 'Sin Tipo' ?></td>
                <td><?= $ven['fecha'] ?></td>
                <td>$<?= number_format($ven['total'], 2) ?></td>
                <td>
                    <a href="/ventas/ver?id=<?= $ven['venta_id'] ?>">Ver Detalle</a> |
                    
                    <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                    <form action="/ventas/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta venta?');">
                        <input type="hidden" name="id" value="<?= $ven['venta_id'] ?>">
                        <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p>No hay ventas para mostrar.</p>
    <?php } ?>
    <br><a href="/computadores"><button>Volver al inicio</button></a>
</body>
</html>