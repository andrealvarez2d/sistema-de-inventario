<?php
    include_once('../conexion/conexion.php');
    session_start();
    $codigo = $_POST['codigo'];

    if(isset($_POST['btn']) && $_POST['btn'] == 'SI'){
        $QUERYdel = "DELETE from productos WHERE codigo='$codigo'";
        $rsQUERYdel = mysqli_query($con, $QUERYdel) or die('Error: ' . mysqli_error($con));
        if($rsQUERYdel == true){
            header('Location: ../productos.php');
        }
        if($rsQUERYdel == false){
        echo 'Error no se pudo Eliminar el producto';
        echo '<a href="productos.php">Regresar</a>';
        }
        }else if(isset($_POST['btn']) && $_POST['btn'] == 'NO'){
            header('Location: ../productos.php');
        }
        unset($_POST['btn']);
        mysqli_close($con);
?>