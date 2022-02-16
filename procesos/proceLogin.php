<?php
    include_once('../conexion/conexion.php');
    session_start();
    $user = null;
    $pwd = null;

    if(isset($_POST['btn']) && $_POST['btn'] == 'Entrar'){
        if(isset($_POST['usuario']) && isset($_POST['contra']) && !empty($_POST['usuario']) && !
        empty($_POST['contra'])){
            //echo 'Recibio del POST', '<br />';
            $user = $_POST['usuario'];
            $pwd = md5($_POST['contra']);
            //$pwd = $_POST['contra'];
            //echo $user, '<br />';
            //echo $pwd, '<br />';
            $query = "Select * From usuario Where nombreUsuario='$user' And password='$pwd'";
            $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));
            $fileQUERY = mysqli_fetch_array($rsQuery);
            //$NofileQUERY = mysqli_num_rows($rsQuery);
            //echo $query;
            if($rsQuery == true){

            $_SESSION['usuarioID'] = $fileQUERY['usuarioID'];
            $_SESSION['nombreUsuario'] = $fileQUERY['nombreUsuario'];

            echo '<br />';
            //echo 'UsuarioID session:', $_SESSION['usuarioID'],'<br >';
            //echo 'nombreUsuario session:', $_SESSION['nombreUsuario'],'<br >';
            //echo 'Inicio', '<br />';
            header('Location: ../menu.php');
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['usuario']);
            unset($_POST['contra']);
            unset($user);
            unset($pwd);
            }
            if($rsQuery == false){
                session_destroy();
                header('Location: index.php');
                echo 'error', '<br />';
            }
        }
        }
?>