<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con = connect();
	//Select Operation
	$SQL ='SELECT * FROM usuarios ORDER BY id_usuario DESC';
	$Result = Consult($Con,$SQL);//Execute SQL statement
	//Metodo buscar
	if(isset($_POST['btn_buscar']))
	{
		$buscar_text=$_POST['buscar'];
		
		$SQL ="SELECT * FROM usuarios WHERE nombre LIKE '%$buscar_text%' OR apellido LIKE '%$buscar_text%';";
		$Result = Consult($Con,$SQL);
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>USUARIOS DEL SISTEMA</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>UserName</td>
				<td>Contraseña</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Numero</td>
				<td>Correo</td>
				<td>Status</td>
				<td>Tipo</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($Result as $Row):?>
				<tr >
					<td><?php echo $Row['id_usuario']; ?></td>
					<td><?php echo $Row['username']; ?></td>
					<td><?php echo $Row['contrasena']; ?></td>
					<td><?php echo $Row['nombre']; ?></td>
					<td><?php echo $Row['apellido']; ?></td>
					<td><?php echo $Row['numero']; ?></td>
					<td><?php echo $Row['correo']; ?></td>
					<td><?php echo $Row['status']; ?></td>
					<td><?php echo $Row['tipo']; ?></td>
					<td><a href="update.php?id_usuario=<?php echo $Row['id_usuario']; ?>" class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_usuario=<?php echo $Row['id_usuario']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<script src="../../../js/confirmacion.js"></script>

</body>
</html>