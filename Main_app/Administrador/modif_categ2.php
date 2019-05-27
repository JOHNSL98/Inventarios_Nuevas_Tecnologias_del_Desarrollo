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
	
	ModificarCategoria($_POST['id_categoria'], $_POST['nombre_categoria'], $_POST['descripcion_categoria']);

	function ModificarCategoria($id_categoria, $nombre_categoria, $descripcion_categoria, $productos_categoria)
	{
		include '../conexion.php';
		echo $sentencia="UPDATE categorias SET nombre_categoria='".$nombre_categoria."', descripcion_categoria='".$descripcion_categoria."' WHERE id_categoria='".$id_categoria."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='categorias.php';
</script>