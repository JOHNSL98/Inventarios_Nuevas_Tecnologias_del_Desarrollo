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
	EliminarUsuario($_GET['id']);

	function EliminarUsuario($id)
	{
		include '../conexion.php';
		$sentencia="DELETE FROM usuarios WHERE id='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al eliminar".mysqli_error($mysqli));

	}
?>

<script type="text/javascript">
	alert("Usuario Eliminado!!");
	window.location.href='usuarios.php';
</script>