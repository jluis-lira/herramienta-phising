<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con =connect();
	//Select Operation
	if(isset($_GET['id_user'])){
		$id_user=(int) $_GET['id_user'];
		$SQL ="SELECT * FROM users WHERE id_user = $id_user;";
		$Result = mysqli_fetch_array(Consult($Con,$SQL));
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['save'])){
		$id_user=$_POST['id_user'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$type=$_POST['type'];
		$id_user=(int) $_GET['id_user'];

		if(!empty($id_user) && !empty($username) && !empty($password) 
		&& !empty($first_name) && !empty($last_name) && !empty($phone) 
		&& !empty($email)  && !empty($status) && !empty($type) ){

			$SQL =" UPDATE users SET id_user=$id_user,username=$username,
			password=$password,first_name=$first_name,last_name=$last_name,phone=$phone,
			email=$email,status=$status,type=$type 
			WHERE id_user=$id_user;";
			Consult($Con,$SQL);
			header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts - CRM RESORT</title>
        <link href="../../css/styles.css" rel="stylesheet" />
		<link href="../../css/estilo.css" rel="stylesheet" >
    </head>
    <!-- DASHBOARD -->
    <body class="sb-nav-fixed">
        <!-- MAIN MENU -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
             <!-- TITLE -->
            <a class="navbar-brand" href="#">CRM RESORT</a>
            <!-- SEARCH BAR -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="search..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- USER SETTINGS MENU -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuracion</a>
                        <a class="dropdown-item" href="#">Actividades</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- SIDEBAR & NAVIGATION  -->
        <div id="layoutSidenav">
            <!-- SIDEBAR -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <!-- SECCIONES -->
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                             <!-- SECTIONS 1-->
                             <div class="sb-sidenav-menu-heading">Graficas</div>
                            <a class="nav-link" href="../../SCREENS/charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                             <!-- SECTIONS 2-->
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Visitas 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../visits/index.php">Registros</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuarios.
                            </a>
                        </div>
                    </div>
                    <!-- SESSION USER-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Home Sesion como:</div>
                        User
                    </div>
                </nav>
            </div>
            <!-- NAVIGATION -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!-- TITLE -->
                        <h1 class="mt-4">Usuarios</h1>
                        <!-- SUBTITLE -->
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Registros</li>
                        </ol>
                        <!-- RECORDS -->
						<div class="cont_modify">
							<h2>EDITAR USUARIO</h2>
							<form action="" method="post">
								<div class="form-group">
									<input type="text" name="id_user" value="<?php if($Result) echo $Result['id_user']; ?>" class="input_txt">
									<input type="text" name="first_name" value="<?php if($Result) echo $Result['first_name']; ?>" class="input_txt">
								</div>
								<div class="form-group">
									<input type="text" name="username" value="<?php if($Result) echo $Result['username']; ?>" class="input_txt">
									<input type="text" name="last_name" value="<?php if($Result) echo $Result['last_name']; ?>" class="input_txt">
								</div>
								<div class="form-group">
									<input type="text" name="password" value="<?php if($Result) echo $Result['password']; ?>" class="input_txt">
									<input type="text" name="phone" value="<?php if($Result) echo $Result['phone']; ?>" class="input_txt">
								</div>
								<div class="form-group">
									<input type="text" name="email" value="<?php if($Result) echo $Result['email']; ?>" class="input_txt">
									<input type="text" name="status" value="<?php if($Result) echo $Result['status']; ?>" class="input_txt">
								</div>
								<div class="form-group">
									<input type="text" name="type" value="<?php if($Result) echo $Result['type']; ?>" class="input_txt">
								</div>
								<div class="form_edit">
									<a href="index.php" class="btn btn_cancel">Cancelar</a>
									<input type="submit" name="save" value="Guardar" class="btn btn_primary">
								</div>
							</form>
						</div>
                    </div>
                </main> 
                <!-- FOOTER-->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; RESORT</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script defer src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script defer src="../js/scripts.js"></script>
		<script src="../../js/validate_delete.js"></script>
    </body>
</html>
