<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Delete Operation
	if(isset($_GET['id_usuario']))
	{//Get ID_USER
		$id_usuario=(int) $_GET['id_usuario'];
		//SQL statement to delete record
		$SQL ="DELETE FROM usuarios WHERE id_usuario =$id_usuario";
		$Result = Consult($Con,$SQL);//Execute SQL statement
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
?>
