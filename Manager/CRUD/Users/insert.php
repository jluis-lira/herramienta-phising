<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Insert Operation
	if(isset($_POST['save'])){
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		$type = $_POST['type'];

		if(!empty($id_user) && !empty($username) && !empty($password) 
		&& !empty($first_name) && !empty($last_name) && !empty($phone)
		&& !empty($email) && !empty($status)&& !empty($type) ){
			
			$SQL ="INSERT INTO Users VALUES(NULL,'$username','$password','$first_name','$last_name',
			$phone,'$email',$status,'$type')";
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
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="cont_modify">
		<h2>Agregar usuario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_user" placeholder="ID" class="input_txt">
				<input type="text" name="first_name" placeholder="first_name" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="username" placeholder="UserName" class="input_txt">
				<input type="text" name="last_name" placeholder="last_name" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="password" placeholder="password" class="input_txt">
				<input type="text" name="phone" placeholder="phone" class="input_txt">
			</div>
			<div class="form-group">
				<input type="email" name="email" placeholder="email" class="input_txt">
				<input type="text" name="status" placeholder="Status" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="type" placeholder="type" class="input_txt">
			</div>
			<div class="form_edit">
				<a href="index.php" class="btn btn_cancel">Cancelar</a>
				<input type="submit" name="save" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>
