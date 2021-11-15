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

	if(isset($_POST['save'])){
		$id_visit=$_POST['id_visit'];
		$ip=$_POST['ip'];
		$date_visit=$_POST['date_visit'];
		$id_visit=(int) $_GET['id_visit'];

		if(!empty($id_visit) && !empty($ip) && !empty($date_visit) ){

			$SQL =" UPDATE engagement SET id_visit=$id_visit,ip='$ip',date_visit='$date_visit' WHERE id_visit=$id_visit;";
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
	<div class="cont_modify">
		<h2>EDITAR VISITA</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_visit" value="<?php if($Result) echo $Result['id_visit']; ?>" class="input_txt">
				<input type="text" name="ip" value="<?php if($Result) echo $Result['ip']; ?>" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="date_visit" value="<?php if($Result) echo $Result['date_visit']; ?>" class="input_txt">
			</div>
			<div class="form_edit">
				<a href="index.php" class="btn btn_cancel">Cancelar</a>
				<input type="submit" name="save" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>
