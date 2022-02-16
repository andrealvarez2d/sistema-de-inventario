<?php
    include_once('conexion/conexion.php');
    session_start();

    if(isset($_SESSION['usuarioID'])){
        $ID = $_SESSION['usuarioID'];
        $query = "Select * from usuario Where usuarioID='$ID'";
        $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
        $fileQUERYmod = mysqli_fetch_array($rsquery);
        $countQUERY = mysqli_num_rows($rsquery);
        if($countQUERY<=0){
        header('Location: index.php');
        }
        }else{
        header('Location: index.php');
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
    <form name="form3" action="borrarUsuarios.php" method="post">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Borrar usuario</h2>
    <label>¿Desea borrar este usuario?</label><br/>
    <input type="submit" value="SI" name="btn">
    <input type="submit" value="NO" name="btn">
    </div>
</body>
</html>
<?php

    if(isset($_POST['btn']) && $_POST['btn'] == 'SI'){
        $QUERYdel = "DELETE from usuario WHERE usuarioID='$ID'";
        //echo $QUERYmod;
        $rsQUERYdel = mysqli_query($con, $QUERYdel) or die('Error: ' . mysqli_error($con));
        if($rsQUERYdel == true){
        header('Location: index.php');
        }
        if($rsQUERYdel == false){
        echo 'Error no se pudo Eliminar el usuario';
        }
        }else if(isset($_POST['btn']) && $_POST['btn'] == 'NO'){
            header('Location: usuarios.php');
        }
        unset($_POST['btn']);
        mysqli_close($con);
?>