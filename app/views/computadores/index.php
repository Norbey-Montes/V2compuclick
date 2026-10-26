<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Computadores</title>
</head>
<body>

    <h1>Listado Computadores</h1>

    <!-- Botón / Enlace para Crear Computador -->
    <a href="/computadores/crear"><button>Crear Computador</button></a>
    <br><br>

    <!-- Alertas visuales de éxito -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'actualizado'): ?>
        <div>
            <b>¡Actualizado con éxito!</b> El computador se ha modificado correctamente.
        </div>
        <br>
    <?php endif; ?>

    <?php if (isset($_GET['exito']) && $_GET['exito'] == 'eliminado'): ?>
        <div style="color: red;">
            <b>¡Eliminado con éxito!</b> El registro del computador se ha borrado correctamente.
        </div>
        <br>
    <?php endif; ?>

    <?php if (!empty($computadores)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computadores as $comp): ?>
                <tr>
                    <td><?= $comp['id'] ?></td>
                    <td><?= $comp['marca'] ?? 'Sin Marca' ?></td>
                    <td><?= $comp['modelo'] ?></td>
                    <td><?= $comp['procesador'] ?></td>
                    <td><?= $comp['ram'] ?></td>
                    <td><?= $comp['almacenamiento'] ?></td>
                    <td>$<?= number_format($comp['preciocompra'], 2) ?></td> 
                    <td>$<?= number_format($comp['precioventa'], 2) ?></td>
                    <td><?= $comp['proveedor'] ?? 'Sin Proveedor' ?></td>
                    <td>
                        <a href="/computadores/editar?id=<?= $comp['id'] ?>">Editar</a> |
                        
                        <!-- FORMULARIO POST PARA ELIMINAR DENTRO DEL MISMO TD -->
                        <form action="/computadores/eliminar" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este computador?');">
                            <input type="hidden" name="id" value="<?= $comp['id'] ?>">
                            <button type="submit" style="color: red; background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay computadores para mostrar.</p>
    <?php } ?>

    <br><br>

    <h1>Computador Consultado</h1>

    <?php if (!empty($computadorConsultado)) { ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>RAM</th>
                    <th>Almacenamiento</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computadorConsultado as $comp): ?>
                <tr>
                    <td><?= $comp['id'] ?></td>
                    <td><?= $comp['modelo'] ?></td>
                    <td><?= $comp['procesador'] ?></td>
                    <td><?= $comp['ram'] ?></td>
                    <td><?= $comp['almacenamiento'] ?></td>
                    <td>$<?= number_format($comp['preciocompra'], 2) ?></td>
                    <td>$<?= number_format($comp['precioventa'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay información del computador consultado para mostrar.</p>
    <?php } ?>

</body>
</html>