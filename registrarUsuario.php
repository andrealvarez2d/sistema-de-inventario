<?php
    include_once('conexion/conexion.php');
    session_start();
    $user = null;
    $pwd = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Registrar'){
        if(isset($_POST['usuario']) && isset($_POST['contra']) && !empty($_POST['usuario']) && !
        empty($_POST['contra'])){
            $user = $_POST['usuario'];
            $pwd = md5($_POST['contra']);
            $query = "INSERT INTO usuario (nombreUsuario, password) values('$user', '$pwd')";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

            if($rsQuery == true){

            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['usuario']);
            unset($_POST['contra']);
            unset($user);
            unset($pwd);
            echo 'Registro realizado', '<br />';

        }
        if($rsQuery == false){
            session_destroy();
            header('Location: index.php');
            echo 'error', '<br />';
        }
    }else{
        session_destroy();
        header('Location: index.php');
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
    <form name="form2" action="registrarUsuario.php" method="post">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Registrar usuario</h2>
    <label>Usuario:</label><br/>
    <input type="text" name="usuario" required><br/>
    <label>Password:</label><br/>
    <input type="password" name="contra" required><br/>

    <br/>
    <input type="submit" value="Registrar" name="btn">
    <a href="index.php">Regresar al login</a>
    </div>
</body>
</html>