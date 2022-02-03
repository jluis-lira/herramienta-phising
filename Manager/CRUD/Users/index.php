<?php
	//Connection to DB
	include_once '../../DB/DB_driver.php';
	$Con = connect();
	//Select Operation
	$SQL ='SELECT * FROM users ORDER BY id_user DESC';
	$Result = Consult($Con,$SQL);//Execute SQL statement
	//Metodo search
	if(isset($_POST['btn_search']))
	{
		$search_txt=$_POST['search'];
		
		$SQL ="SELECT * FROM users WHERE first_name LIKE '%$search_txt%' OR last_name LIKE '%$search_txt%';";
		$Result = Consult($Con,$SQL);
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