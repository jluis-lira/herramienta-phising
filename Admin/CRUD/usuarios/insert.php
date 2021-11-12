<?php 
	include_once '../../DB/ControladorBD.php';
	
	$Con =conectar();

	if(isset($_POST['guardar'])){
		$id_usuario = $_POST['id_usuario'];
		$username = $_POST['username'];
		$contrasena = $_POST['contrasena'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$numero = $_POST['numero'];
		$correo = $_POST['correo'];
		$status = $_POST['status'];
		$tipo = $_POST['tipo'];

		if(!empty($id_usuario) && !empty($username) && !empty($contrasena) 
		&& !empty($nombre) && !empty($apellido) && !empty($numero)
		&& !empty($correo) && !empty($status)&& !empty($tipo) ){
			
			$SQL ="INSERT INTO usuarios VALUES(NULL,'$username','$contrasena','$nombre','$apellido',
			$numero,'$correo',$status,'$tipo')";
			$resultado = consultar($Con,$SQL);

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
	<div class="contenedor">
		<h2>Agregar usuario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_usuario" placeholder="ID" class="input__text">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="username" placeholder="UserName" class="input__text">
				<input type="text" name="apellido" placeholder="Apellido" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="contrasena" placeholder="Contrasena" class="input__text">
				<input type="text" name="numero" placeholder="Numero" class="input__text">
			</div>
			<div class="form-group">
				<input type="email" name="correo" placeholder="Correo" class="input__text">
				<input type="text" name="status" placeholder="Status" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="tipo" placeholder="Tipo" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
