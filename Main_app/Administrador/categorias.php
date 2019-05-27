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
<title>Categorias</title>
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
<div class="todocatg">
  
  <div id="cabeceracatg">
  	<img src="../../img/swirl.png" width="1188" id="img1">
  </div>

  <div id="contenidocatg">
    <div class="background trans">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
      <form action="" id="formLg">
  		<thead>
  			<th>Id Categoria</th>
  			<th>Nombre Categoria</th>
  			<th>Descripción Categoria</th>
  			<th>Productos Categoria</th>
  			<th> <a href="nuevo_categ1.php"> <button type="button" class="btn btn-info">Nueva</button> </a> </th>
  		</thead>

      <?php
        include "../conexion.php";
        $sentecia="SELECT * FROM categorias";
        $resultado= $mysqli->query($sentecia) or die (mysqli_error($mysqli));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['id_categoria']; echo "</td>";
            echo "<td>"; echo $fila['nombre_categoria']; echo "</td>";
            echo "<td>"; echo $fila['descripcion_categoria']; echo "</td>";
            echo "<td>"; echo $fila['productos_categoria']; echo "</td>";
            echo "<td><a href='modif_categ1.php?id_categoria=".$fila['id_categoria']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar_categ.php?id_categoria=".$fila['id_categoria']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>

     
  		</form>
  	</table>
  </div>
  </div>
  
	<div id="footer">
  		<img src="../../img/swirl2.png" id="img2">
  	</div>

</div>

</body>
</html>