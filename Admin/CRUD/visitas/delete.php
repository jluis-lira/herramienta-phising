<?php 
	include_once '../../DB/ControladorBD.php';
	$Con =conectar();
	if(isset($_GET['id_visit']))
	{
		$id_visit=(int) $_GET['id_visit'];
		$SQL ="DELETE FROM usuarios WHERE id_visit =$id_visit";
		$resultado = consultar($Con,$SQL);
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
