<?php
	function  connect (){//Get the values to connect DB
		$Result = parse_ini_file("DB_setup.ini");
		$Server=$Result['Server'];
		$User=$Result['User'];
		$Password=$Result['Password'];
		$DB=$Result['DB'];
		//Connect DB
		$Con = mysqli_connect($Server,$User,$Password,$DB);
		return $Con;
	}
	function Consult($Con, $SQL){//Execute DB queries	
		$Result= mysqli_query($Con,$SQL) Or die (mysqli_error($Con));
		return $Result;
	}
	function close ($Con){//Close DB query
		mysqli_close($Con);
	}
	function engagement (){//Get data from visits
        //Check previous records of visit
		$Con = connect();
		date_default_timezone_set("America/Mexico_city");
		$ip = $_SERVER['REMOTE_ADDR'];
		$SQL =
		"SELECT * FROM engagement WHERE ip='$ip' ORDER BY id_visit DESC;";
		$Result = Consult($Con,$SQL);
		$Registros = mysqli_num_rows($Result);
		//Create and validate visit
		if($Registros==0){
			$SQL ="INSERT INTO engagement (ip,date_visit) VALUES ('$ip',now());";
			Consult($Con,$SQL);
		}else{
            $row=mysqli_fetch_row($Result);
            $fRegistro=$row[2];
            $fActual=date("Y-m-d H:i:s");
            $fNueva=strtotime($fRegistro."+1 hour");
            $fNueva=date("Y-m-d H:i:s",$fNueva);
            if($fActual>=$fNueva){
            	$SQL =
				"INSERT INTO engagement (ip,date_visit) VALUES ('$ip',now());";
				Consult($Con,$SQL);
            }
        }//Check total visits
        $SQL="SELECT * FROM engagement;";
        $contVisitas=Consult($Con,$SQL);
        $visitas = mysqli_num_rows($contVisitas);
		print($visitas);
	}
?>