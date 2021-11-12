<?php
	include_once '../../DB/ControladorBD.php';

	$Con = conectar();
	$SQL ="SELECT * FROM engagement ORDER BY id_visit ASC";
	$resultado = consultar($Con,$SQL);
	//Metodo buscar
	if(isset($_POST['btn_buscar']))
	{
		$buscar_text=$_POST['buscar'];

		$SQL ="SELECT * FROM engagement WHERE ip LIKE '%$buscar_text%';";
		$resultado = consultar($Con,$SQL);
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
	<div class="contenedor">
		<h2>Recuento de Visitas</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por IP" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>IP</td>
				<td>Fecha</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_visit']; ?></td>
					<td><?php echo $fila['ip']; ?></td>
					<td><?php echo $fila['fecha']; ?></td>
					<td><a href="update.php?id_visit=<?php echo $fila['id_visit']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_visit=<?php echo $fila['id_visit']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<script src="../../../js/confirmacion.js"></script>

</body>
</html>