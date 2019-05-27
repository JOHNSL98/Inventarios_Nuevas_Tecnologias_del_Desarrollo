<?php
  session_start();

  if (isset($_SESSION['usuario'])) {

    if($_SESSION['usuario']['tipo'] != "Administrador"){
      header("Location: ../Empleado/Empleado.php");
    }

  } else {
    header('Location: ../../index.php');
  }


 ?>
 
<?php
  
  $consulta=ConsultarUsuario($_GET['id']);

  function ConsultarUsuario( $id )
  {
   include '../conexion.php';
   $sentencia="SELECT * FROM usuarios WHERE id='".$id."' ";
   $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli)); 
   $fila=$resultado->fetch_assoc();

   return [
    $fila['nombres'],
    $fila['usuario'],
    $fila['password'],
    $fila['tipo']
   ];
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Producto</title>
<style type="text/css">
@import url("../../css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
  
  <div id="cabecera">
  	<img src="../../img/swirl.png" width="1188" id="img1">
  </div>
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Usuario</h1> </span>
  		<br>
	  <form action="modif_user2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id"  value="<?php echo $_GET['id_producto']?>">
  		<label>Nombre Usuario: </label>
  		<input type="text" id="nombres" name="nombres" value="<?php echo $consulta[0] ?>" ><br>
  		
  		<label>Usuario: </label>
  		<input type="text" id="usuario" name="usuario" value="<?php echo $consulta[1] ?>"><br>

      <label>Password: </label>
      <input type="text" id="password" name="password" value="<?php echo $consulta[2] ?>"><br>
  		
  		<label>Tipo: </label>
  		<input type="text" id="" name="tipo" value="<?php echo $consulta[3] ?>"><br><br>
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  
	<div id="footer">
  		<img src="../../img/swirl2.png" id="img2">
  	</div>

</div>


</body>
</html>