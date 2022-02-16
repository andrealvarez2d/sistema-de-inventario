<?php
    include_once('conexion/conexion.php');
    session_start();
    $nombre = null;
    $precio = null;
    $cantidad = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Guardar'){
        if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad']) && !empty($_POST['nombre']) && !
        empty($_POST['precio']) && !empty($_POST['cantidad'])){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $query = "INSERT INTO productos (nombreProducto, precio, cantidad) values('$nombre', '$precio', '$cantidad')";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

            if($rsQuery == true){

            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['nombre']);
            unset($_POST['precio']);
            unset($_POST['cantidad']);
            unset($nombre);
            unset($precio);
            unset($cantidad);
            echo 'Registro realizado', '<br />';

        }
        if($rsQuery == false){
            session_destroy();
            header('Location: agregarProducto.php');
            echo 'error', '<br />';
        }
    }else{
        session_destroy();
        header('Location: agregarProducto.php');
        echo 'error', '<br />';
        }
        }
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
    <form name="form4" action="agregarProducto.php" method="post">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Agregar Producto</h2>
    <label>Nombre:</label><br/>
    <input type="text" name="nombre" required><br/>
    <label>Precio:</label><br/>
    <input type="number" name="precio" step="0.01" required><br/>
    <label>Cantidad:</label><br/>
    <input type="number" name="cantidad" required><br/>

    <br/>
    <input type="submit" value="Guardar" name="btn">
    <a href="productos.php">Regresar a la lista</a>
    </div>
</body>
</html>