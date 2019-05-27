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

	
	NuevaCategoria($_POST['nombre_categoria'], $_POST['descripcion_categoria']);
	
	function NuevaCategoria($nom_categ,$descrip_categ)
	{
		include '../conexion.php';
		$sentencia= "INSERT INTO categorias (nombre_categoria, descripcion_categoria) VALUES ('".$nom_categ."', '".$descrip_categ."')";
		$mysqli->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($mysqli));
	}
?>

<script type="text/javascript">
	alert("Categoria Ingresada Exitosamante!!");
	window.location.href='categorias.php';
</script>