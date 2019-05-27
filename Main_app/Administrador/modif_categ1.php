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
  
  $consulta=ConsultarCategoria($_GET['id_categoria']);

  function ConsultarCategoria( $id_categoria )
  {
   include '../conexion.php';
   $sentencia="SELECT * FROM categorias WHERE id_categoria='".$id_categoria."' ";
   $resultado= $mysqli->query($sentencia) or die ("Error al consultar categoria".mysqli_error($mysqli)); 
   $fila=$resultado->fetch_assoc();

   return [
    $fila['nombre_categoria'],
    $fila['descripcion_categoria']
   ];
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Categoria</title>
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
  		<span> <h1>Modificar Categoria</h1> </span>
  		<br>
	  <form action="modif_categ2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id_categoria"  value="<?php echo $_GET['id_categoria']?>">
  		<label>Nombre Categoria: </label>
  		<input type="text" id="nombre_categoria" name="nombre_categoria" value="<?php echo $consulta[0] ?>" ><br>
  		
  		<label>Descripción Categoria: </label>
  		<input type="text" id="descripcion_categoria" name="descripcion_categoria" value="<?php echo $consulta[1] ?>"><br>
  		
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