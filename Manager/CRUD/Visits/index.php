<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con = connect();
	//SELECT Operation
	$SQL ="SELECT * FROM engagement ORDER BY id_visit ASC";
	$Result = Consult($Con,$SQL);//Execute SQL statement
	//Metodo search
	if(isset($_POST['btn_search']))
	{
		$search_txt=$_POST['search'];

		$SQL ="SELECT * FROM engagement WHERE ip LIKE '%$search_txt%';";
		$Result = Consult($Con,$SQL);
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registros de Visitas</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="cont_modify">
		<h2>Recuento de Visitas</h2>
		<div class="search_bar">
			<form action="" class="search_form" method="post">
				<input type="text" name="search" placeholder="Buscar por IP" 
				value="<?php if(isset($search_txt)) echo $search_txt; ?>" class="input_txt">
				<input type="submit" class="btn" name="btn_search" value="Buscar">
				<a href="insert.php" class="btn btn_new">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>IP</td>
				<td>Fecha Visita</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($Result as $Row):?>
				<tr >
					<td><?php echo $Row['id_visit']; ?></td>
					<td><?php echo $Row['ip']; ?></td>
					<td><?php echo $Row['date_visit']; ?></td>
					<td><a href="update.php?id_visit=<?php echo $Row['id_visit']; ?>" class="btn_update" >Editar</a></td>
					<td><a href="delete.php?id_visit=<?php echo $Row['id_visit']; ?>" class="btn_delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<script src="../../js/validate_delete.js"></script>

</body>
</html>