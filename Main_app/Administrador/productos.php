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
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos</title>
<style type="text/css">
@import url("../../css/mycss.css");
</style>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../../css/main.css">
<link href="../../css/opaco.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <?php
      include("barra.php");
   ?>
<div class="todo">
  
  <div id="cabecera">
  	<img src="../../img/swirl.png" width="1188" id="img1">
  </div>
  
  <div id="contenido">
    <div class="background trans">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>Id Producto</th>
  			<th>Nombre Producto</th>
  			<th>Precio Producto</th>
  			<th>Stock</th>
        <th>Id Categoria</th>
  			<th> <a href="nuevo_prod1.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
  		</thead>

      <?php
        include "../conexion.php";
        $sentecia="SELECT * FROM productos";
        $resultado= $mysqli->query($sentecia) or die (mysqli_error($mysqli));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['id_producto']; echo "</td>";
            echo "<td>"; echo $fila['nombre_producto']; echo "</td>";
            echo "<td>"; echo $fila['precio_producto']; echo "</td>";
            echo "<td>"; echo $fila['stock']; echo "</td>";
            echo "<td>"; echo $fila['id_categoria']; echo "</td>";
            echo "<td><a href='modif_prod1.php?id_producto=".$fila['id_producto']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_prod.php?id_producto=".$fila['id_producto']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>

     
  		
  	</table>
  </div>
  </div>
  
	<div id="footer">
  		<img src="../../img/swirl2.png" id="img2">
  	</div>
    
</div>


</body>
</html>