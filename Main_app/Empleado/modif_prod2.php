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
	
	ModificarProducto($_POST['stock']);

	function ModificarProducto($stock)
	{
		include '../conexion.php';
		echo $sentencia="UPDATE productos SET stock='".$stock."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='productos.php';
</script>