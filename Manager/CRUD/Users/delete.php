<?php 
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Delete Operation
	if(isset($_GET['id_user']))
	{//Get ID_USER to Delete
		$id_user=(int) $_GET['id_user'];
		//SQL statement to delete record
		$SQL ="DELETE FROM users WHERE id_user =$id_user";
		$Result = Consult($Con,$SQL);//Execute SQL statement
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
?>