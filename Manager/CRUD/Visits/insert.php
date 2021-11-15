<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//INSERT Operation
	if(isset($_POST['save'])){
		$ip = $_POST['ip'];
		$date_visit = $_POST['date_visit'];

		if(!empty($ip) && !empty($date_visit) ){
			
			$SQL ="INSERT INTO engagement VALUES(NULL,'$ip','$date_visit')";
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
	<div class="cont_modify">
		<h2>Agregar Visita</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="ip" placeholder="IP" class="input_txt">
				<input type="text" name="date_visit" placeholder="date_visit" class="input_txt">
			</div>
			<div class="form_edit">
				<a href="index.php" class="btn btn_cancel">Cancelar</a>
				<input type="submit" name="save" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>
