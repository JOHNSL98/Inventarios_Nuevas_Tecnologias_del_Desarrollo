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
	EliminarProducto($_GET['id_producto'], $_GET['id_categoria']);

	function EliminarProducto($id_producto, $id_cat)
	{
		include '../conexion.php';
		$sentencia="DELETE FROM productos WHERE id_producto='".$id_producto."' ";
		$mysqli->query($sentencia) or die ("Error al eliminar".mysqli_error($mysqli));
		$sentencia= "UPDATE categorias SET productos_categoria = productos_categoria-1 WHERE id_categoria='".$id_cat."'";
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Producto Eliminado!!");
	window.location.href='productos.php';
</script>