<?php
	include_once '../../DB/ControladorBD.php';

	$Con =conectar();
	
	if(isset($_GET['id_usuario'])){
		$id_usuario=(int) $_GET['id_usuario'];
		$SQL ="SELECT * FROM usuarios WHERE id_usuario = $id_usuario;";
		$resultado = mysqli_fetch_array(consultar($Con,$SQL));
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$id_usuario=$_POST['id_usuario'];
		$username=$_POST['username'];
		$contrasena=$_POST['contrasena'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$numero=$_POST['numero'];
		$correo=$_POST['correo'];
		$status=$_POST['status'];
		$tipo=$_POST['tipo'];
		$id_usuario=(int) $_GET['id_usuario'];

		if(!empty($id_usuario) && !empty($username) && !empty($contrasena) 
		&& !empty($nombre) && !empty($apellido) && !empty($numero) 
		&& !empty($correo)  && !empty($status) && !empty($tipo) ){

			$SQL =" UPDATE usuarios SET id_usuario=$id_usuario,username=$username,
			contrasena=$contrasena,nombre=$nombre,apellido=$apellido,numero=$numero,
			correo=$correo,status=$status,tipo=$tipo 
			WHERE id_usuario=$id_usuario;";
			consultar($Con,$SQL);
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
	<title>Edición de usuarios</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR USUARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_usuario" value="<?php if($resultado) echo $resultado['id_usuario']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="username" value="<?php if($resultado) echo $resultado['username']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="contrasena" value="<?php if($resultado) echo $resultado['contrasena']; ?>" class="input__text">
				<input type="text" name="numero" value="<?php if($resultado) echo $resultado['numero']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
				<input type="text" name="status" value="<?php if($resultado) echo $resultado['status']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
