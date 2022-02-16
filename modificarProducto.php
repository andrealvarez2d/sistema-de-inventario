<?php
    include_once('conexion/conexion.php');
    session_start();
    $code = $_GET["codigo"];
    $QUERYmod = "SELECT * FROM productos WHERE codigo='$code'";
    $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
    $fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
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
    <form name="form8" action="procesos/proceMP.php" method="post">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Modificar Producto</h2>
    <input type="hidden" name="codigo" value="<?php echo $fileQUERYmod['codigo']; ?>"><br/>
    <label>Nombre:</label><br/>
    <input type="text" name="nombre" value="<?php echo $fileQUERYmod['nombreProducto']; ?>" required><br/>
    <label>Precio:</label><br/>
    <input type="number" name="precio" step="0.01" value="<?php echo $fileQUERYmod['precio']; ?>" required><br/>
    <label>Cantidad:</label><br/>
    <input type="number" name="cantidad" value="<?php echo $fileQUERYmod['cantidad']; ?>" required><br/>
    <br/>
    <input type="submit" value="Modificar">
    <a href="productos.php">Regresar a lista de productos</a>
</div>
</body>
</html>
