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

	
	NuevoProducto($_POST['nombre_producto'], $_POST['precio_producto'] , $_POST['stock'], $_POST['id_categoria']);
	
	function NuevoProducto($nom_prod,$precio_prod,$stock,$id_cat)
	{
		include '../conexion.php';
		$sentencia= "INSERT INTO productos (nombre_producto, precio_producto, stock, id_categoria) VALUES ('".$nom_prod."', '".$precio_prod."', '".$stock."', '".$id_cat."') ";
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
		$sentencia= "UPDATE categorias SET productos_categoria = productos_categoria+1 WHERE id_categoria='".$id_cat."'";
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='productos.php';
</script>