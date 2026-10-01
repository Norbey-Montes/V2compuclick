<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Computador</title>
</head>
<body>

    <h1>Editar Computador</h1>

    <form action="/computadores/actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $computador['id'] ?? ''; ?>">

        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $computador['modelo'] ?? ''; ?>"><br><br>

        <label>Procesador:</label>
        <input type="text" name="procesador" value="<?php echo $computador['procesador'] ?? ''; ?>"><br><br>

        <label>RAM:</label>
        <input type="text" name="ram" value="<?php echo $computador['ram'] ?? ''; ?>"><br><br>

        <label>Almacenamiento:</label>
        <input type="text" name="almacenamiento" value="<?php echo $computador['almacenamiento'] ?? ''; ?>"><br><br>

        <label>Precio Compra:</label>
        <input type="number" step="0.01" name="preciocompra" value="<?php echo $computador['preciocompra'] ?? ''; ?>"><br><br>

        <label>Precio Venta:</label>
        <input type="number" step="0.01" name="precioventa" value="<?php echo $computador['precioventa'] ?? ''; ?>"><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="/computadores">Cancelar</a>

</body>
</html>