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
    <form name="form1" action="procesos/proceLogin.php" method="post">
    <h1>Sistema de Carga de Inventario</h1>
    <h2>Inicio de sesion</h2>
    <label>Usuario:</label><br/>
    <input type="text" name="usuario" required><br/>
    <label>Password:</label><br/>
    <input type="password" name="contra" required><br/>

    <br/>
    <input type="submit" value="Entrar" name="btn">
    <a href="registrarUsuario.php">Registrar un nuevo usuario</a>
</div>
</body>
</html>