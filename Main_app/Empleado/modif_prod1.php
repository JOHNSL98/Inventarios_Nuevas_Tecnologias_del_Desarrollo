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
 
<?php
  
  $consulta=ConsultarProducto($_GET['id_producto']);

  function ConsultarProducto( $id_producto )
  {
   include '../conexion.php';
   $sentencia="SELECT * FROM productos WHERE id_producto='".$id_producto."' ";
   $resultado= $mysqli->query($sentencia) or die ("Error al consultar producto".mysqli_error($mysqli)); 
   $fila=$resultado->fetch_assoc();

   return [
    $fila['nombre_producto'],
    $fila['precio_producto'],
    $fila['stock'],
    $fila['id_categoria']
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
  		<span> <h1>Modificar Producto</h1> </span>
  		<br>
	  <form action="modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id_producto"  value="<?php echo $_GET['id_producto']?>">

      <label>Stock: </label>
      <input type="text" id="stock" name="stock" value="<?php echo $consulta[2] ?>"><br><br>
  		
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