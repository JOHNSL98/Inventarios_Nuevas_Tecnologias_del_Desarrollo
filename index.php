<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] == "Administrador"){
              header('Location: Main_app/Administrador/Administrador.php');

        } else if($_SESSION['usuario']['tipo'] == "Empleado") {
              header('Location: Main_app/Empleado/Empleado.php');
        }

    }

 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Login Inventarios</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
    <div class="main">
     <form action="" id="formLg">
        <input type="text" name="usuariolg" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Usuario" required>
        <input type="password" name="passlg"  pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Contraseña" required>
        <input type="submit" class="botonlg"  value="Iniciar Sesión" >
     </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
  </html>
