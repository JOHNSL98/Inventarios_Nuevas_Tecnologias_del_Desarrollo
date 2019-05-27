<?php
	session_start();

	if (isset($_SESSION['usuario'])) {

		if($_SESSION['usuario']['tipo'] != "Empleado"){
			header("Location: ../Administrador/Administrador.php");
		}

	} else {
		header('Location: ../../index.php');
	}


 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Empleado</title>
        <link rel="stylesheet" href="../../css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    	<?php
    	include("barra.php");
    	 ?>
        <div class="main">
         <form action="" id="formLg">
            <h1>Bienvenido Empleado</h1>
            <img src="../../img/admin.png" width="200" height="220">
            <h3>Nombre: <?php echo $_SESSION['usuario']['nombres']?></h3>
         </form>
        </div>
    </body>
</html>