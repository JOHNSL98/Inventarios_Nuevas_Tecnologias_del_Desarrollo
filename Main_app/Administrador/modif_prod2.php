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
	
	ModificarProducto($_POST['id_producto'], $_POST['nombre_producto'], $_POST['precio_producto'], $_POST['stock'], $_POST['id_categoria'], $_POST['id_categoria2'] );

	function ModificarProducto($id_producto, $nombre_producto, $precio_producto, $stock, $id_categoria, $id_categoria2)
	{
		include '../conexion.php';
		$sentencia="UPDATE categorias SET productos_categoria = productos_categoria-1 WHERE id_categoria='".$id_categoria2."'";
		$mysqli->query($sentencia);
		$sentencia="UPDATE productos SET nombre_producto='".$nombre_producto."', precio_producto='".$precio_producto."', stock='".$stock."', id_categoria='".$id_categoria."' WHERE id_producto='".$id_producto."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
		$sentencia="UPDATE categorias SET productos_categoria = productos_categoria+1 WHERE id_categoria='".$id_categoria."'";
		$mysqli->query($sentencia);
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='productos.php';
</script>