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

	
	NuevoUsuario($_POST['id'], $_POST['nombres'], $_POST['usuario'] , $_POST['password'], $_POST['tipo']);
	
	function NuevoUsuario($id,$nom_user,$user,$pass,$tipo)
	{
		include '../conexion.php';
		$sentencia= "INSERT INTO usuarios (id, nombres, usuario, password, tipo) VALUES ('".$id."', '".$nom_user."', '".$user."', '".$pass."', '".$tipo."') ";
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Usuario Ingresado Exitosamante!!");
	window.location.href='usuarios.php';
</script>