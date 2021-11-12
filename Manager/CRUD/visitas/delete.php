<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Delete Operation
	if(isset($_GET['id_visit']))
	{//Get ID_VISIT to Delete
		$id_visit=(int) $_GET['id_visit'];
		//SQL statement to delete record
		$SQL ="DELETE FROM usuarios WHERE id_visit =$id_visit";
		$Result = Consult($Con,$SQL);//Execute SQL statement
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
?>
