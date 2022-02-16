<?php
    include_once('../conexion/conexion.php');
    session_start();

            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            $query = "UPDATE productos SET nombreProducto='$nombre', precio='$precio', cantidad='$cantidad' WHERE codigo='$codigo'";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

            if($rsQuery == true){
            header('Location: ../productos.php');
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['codigo']);
            unset($_POST['nombre']);
            unset($_POST['precio']);
            unset($_POST['cantidad']);
            unset($codigo);
            unset($nombre);
            unset($precio);
            unset($cantidad);
            }
            if($rsQuery == false){
                session_destroy();
                header('Location: ../productos.php');
                echo 'error', '<br />';
            }
?>