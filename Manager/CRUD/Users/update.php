<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Select Operation
	if(isset($_GET['id_user'])){
		$id_user=(int) $_GET['id_user'];
		$SQL ="SELECT * FROM Users WHERE id_user = $id_user;";
		$Result = mysqli_fetch_array(Consult($Con,$SQL));
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['save'])){
		$id_user=$_POST['id_user'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$type=$_POST['type'];
		$id_user=(int) $_GET['id_user'];

		if(!empty($id_user) && !empty($username) && !empty($password) 
		&& !empty($first_name) && !empty($last_name) && !empty($phone) 
		&& !empty($email)  && !empty($status) && !empty($type) ){

			$SQL =" UPDATE Users SET id_user=$id_user,username=$username,
			password=$password,first_name=$first_name,last_name=$last_name,phone=$phone,
			email=$email,status=$status,type=$type 
			WHERE id_user=$id_user;";
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
	<title>Edición de Usuarios</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="cont_modify">
		<h2>EDITAR USUARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_user" value="<?php if($Result) echo $Result['id_user']; ?>" class="input_txt">
				<input type="text" name="first_name" value="<?php if($Result) echo $Result['first_name']; ?>" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="username" value="<?php if($Result) echo $Result['username']; ?>" class="input_txt">
				<input type="text" name="last_name" value="<?php if($Result) echo $Result['last_name']; ?>" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="password" value="<?php if($Result) echo $Result['password']; ?>" class="input_txt">
				<input type="text" name="phone" value="<?php if($Result) echo $Result['phone']; ?>" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?php if($Result) echo $Result['email']; ?>" class="input_txt">
				<input type="text" name="status" value="<?php if($Result) echo $Result['status']; ?>" class="input_txt">
			</div>
			<div class="form-group">
				<input type="text" name="type" value="<?php if($Result) echo $Result['type']; ?>" class="input_txt">
			</div>
			<div class="form_edit">
				<a href="index.php" class="btn btn_cancel">Cancelar</a>
				<input type="submit" name="save" value="Guardar" class="btn btn_primary">
			</div>
		</form>
	</div>
</body>
</html>
