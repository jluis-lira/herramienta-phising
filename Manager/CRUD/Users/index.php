<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con = connect();
	//Select Operation
	$SQL ='SELECT * FROM Users ORDER BY id_user DESC';
	$Result = Consult($Con,$SQL);//Execute SQL statement
	//Metodo search
	if(isset($_POST['btn_search']))
	{
		$search_txt=$_POST['search'];
		
		$SQL ="SELECT * FROM Users WHERE first_name LIKE '%$search_txt%' OR last_name LIKE '%$search_txt%';";
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
	<div class="cont_modify">
		<h2>USUARIOS DEL SISTEMA</h2>
		<div class="search_bar">
			<form action="" class="search_form" method="post">
				<input type="text" name="search" placeholder="Buscar por nombre o apellido" 
				value="<?php if(isset($search_txt)) echo $search_txt; ?>" class="input_txt">
				<input type="submit" class="btn" name="btn_search" value="Buscar">
				<a href="insert.php" class="btn btn_new">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>UserName</td>
				<td>Contraseña</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Tel.</td>
				<td>Correo</td>
				<td>Estado</td>
				<td>Tipo</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($Result as $Row):?>
				<tr >
					<td><?php echo $Row['id_user']; ?></td>
					<td><?php echo $Row['username']; ?></td>
					<td><?php echo $Row['password']; ?></td>
					<td><?php echo $Row['first_name']; ?></td>
					<td><?php echo $Row['last_name']; ?></td>
					<td><?php echo $Row['phone']; ?></td>
					<td><?php echo $Row['email']; ?></td>
					<td><?php echo $Row['status']; ?></td>
					<td><?php echo $Row['type']; ?></td>
					<td><a href="update.php?id_user=<?php echo $Row['id_user']; ?>" class="btn_update" >Editar</a></td>
					<td><a href="delete.php?id_user=<?php echo $Row['id_user']; ?>" class="btn_delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<script src="../../js/validate_delete.js"></script>

</body>
</html>