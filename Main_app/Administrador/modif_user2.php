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
	
	ModificarProducto($_POST['id'], $_POST['nombres'], $_POST['usuario'], $_POST['password'], $_POST['tipo'] );

	function ModificarProducto($id, $nom_user, $user, $pass, $tipo)
	{
		include '../conexion.php';
		echo $sentencia="UPDATE usuarios SET nombres='".$nom_user."', usuario='".$usuario."', password='".$pass."', tipo='".$tipo."' WHERE id='".$id."' ";
		$mysqli->query($sentencia) or die ("Error al actualizar datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='usuarios.php';
</script>