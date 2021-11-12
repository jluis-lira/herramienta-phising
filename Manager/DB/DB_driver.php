<?php
	function  connect (){
		$Result = parse_ini_file("ConfigBD.ini");
		$Server=$Result['Servidor'];
		$User=$Result['Usuario'];
		$Password=$Result['Password'];
		$BD=$Result['BD'];

		$Con = mysqli_connect($Server,$User,$Password,$BD);
		return $Con;
	}

	function Consult($Con, $SQL){		
		$Result= mysqli_query($Con,$SQL) Or die (mysqli_error($Con));
		return $Result;
	}

	function cerrar ($Con){
		mysqli_close($Con);
	}

	function engagement (){
        //Visitas
		$Con = connect();
		date_default_timezone_set("America/Mexico_city");
		$ip = $_SERVER['REMOTE_ADDR'];
		$SQL ="SELECT * FROM engagement WHERE ip='$ip' ORDER BY id_visit DESC;";
		$Respuesta = Consult($Con,$SQL);
		$Registros = mysqli_num_rows($Respuesta);

		if($Registros==0){
		$SQL ="INSERT INTO engagement (ip,fecha) VALUES ('$ip',now());";
		Consult($Con,$SQL);				
		}else{
            $row=mysqli_fetch_row($Respuesta);
            $fRegistro=$row[2];
            $fActual=date("Y-m-d H:i:s");
            $fNueva=strtotime($fRegistro."+1 hour");
            $fNueva=date("Y-m-d H:i:s",$fNueva);
            if($fActual>=$fNueva){
              $SQL ="INSERT INTO engagement (ip,fecha) VALUES ('$ip',now());";
              Consult($Con,$SQL);
            }
          }
          $SQL="SELECT * FROM engagement;";
          $contVisitas=Consult($Con,$SQL);
          $visitas = mysqli_num_rows($contVisitas);

		  $Now=date("d-m-Y");
		  $dias;
		  for($i=0;$i<15;$i+=1){
			  $dias[14-$i]=date("M d",strtotime($Now."- $i days"));
		  }
		  print($visitas);

	
	} 

?>