<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//SELECT Operation
	if(isset($_GET['id_visit'])){
		$id_visit=(int) $_GET['id_visit'];
		$SQL ="SELECT * FROM engagement WHERE id_visit = $id_visit;";
		$Result = mysqli_fetch_array(Consult($Con,$SQL));
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$id_visit=$_POST['id_visit'];
		$ip=$_POST['ip'];
		$fecha=$_POST['fecha'];
		$id_visit=(int) $_GET['id_visit'];

		if(!empty($id_visit) && !empty($ip) && !empty($fecha) ){

			$SQL =" UPDATE engagement SET id_visit=$id_visit,ip='$ip',fecha='$fecha' WHERE id_visit=$id_visit;";
			Consult($Con,$SQL);
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
	<title>Edición Visitas</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR VISITA</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_visit" value="<?php if($Result) echo $Result['id_visit']; ?>" class="input__text">
				<input type="text" name="ip" value="<?php if($Result) echo $Result['ip']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="fecha" value="<?php if($Result) echo $Result['fecha']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
