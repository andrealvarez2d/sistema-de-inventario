<?php
    include_once('conexion/conexion.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/inventory.png">
    <title>Sistema de Carga de Inventario</title>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Lista de Productos</h2>
    <table class="table table-striped table-hover">
    <tr>
        <td>Codigo</td>
        <td>Nombre del producto</td>
        <td>Precio</td>
        <td>Cantidad</td>
        <td>Opciones</td>
    </tr>
    <?php
    $query = "Select * from productos";
    $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
    while($fileQUERY = mysqli_fetch_assoc($rsquery)){
    ?>
    <tr>
        <td><?php echo $fileQUERY['codigo']; ?></td>
        <td><?php echo $fileQUERY['nombreProducto']; ?></td>
        <td><?php echo $fileQUERY['precio']; ?></td>
        <td><?php echo $fileQUERY['cantidad']; ?></td>
        <td>
            <a href="modificarProducto.php?codigo=<?php echo $fileQUERY['codigo']; ?>">Modificar</a>
            <a href="eliminarProducto.php?codigo=<?php echo $fileQUERY['codigo']; ?>">Borrar</a>
        </td>
    </tr>
    <?php } ?>
    </table>
    <?php
    mysqli_close($con);
    ?>
    <br/>
    <a href="agregarProducto.php" title="Regresar">Agregar producto</a>
    <a href="menu.php" title="Regresar">Regresar al menu</a>
    </div>
</body>
</html>