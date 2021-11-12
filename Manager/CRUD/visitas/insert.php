<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//INSERT Operation
	if(isset($_POST['guardar'])){
		$ip = $_POST['ip'];
		$fecha = $_POST['fecha'];

		if(!empty($ip) && !empty($fecha) ){
			
			$SQL ="INSERT INTO engagement VALUES(NULL,'$ip','$fecha')";
			$Result = Consult($Con,$SQL);
				
			header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva visita</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Agregar Visita</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="ip" placeholder="IP" class="input__text">
				<input type="text" name="fecha" placeholder="Fecha" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
