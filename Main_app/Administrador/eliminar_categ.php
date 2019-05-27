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
	EliminarCategoria($_GET['id_categoria']);

	function EliminarCategoria($id_categoria)
	{
		include '../conexion.php';
		$sentencia="DELETE FROM categorias WHERE id_categoria='".$id_categoria."' ";
		$mysqli->query($sentencia) or die ("Error al eliminar".mysqli_error($mysqli));

	}
?>

<script type="text/javascript">
	alert("Categoria Eliminada!!");
	window.location.href='categorias.php';
</script>