<?php 
	include_once '../../DB/ControladorBD.php';

	$Con =conectar();
	
	if(isset($_GET['id_usuario']))
	{
		$id_usuario=(int) $_GET['id_usuario'];

		$SQL ="DELETE FROM usuarios WHERE id_usuario =$id_usuario";
		$resultado = consultar($Con,$SQL);
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
