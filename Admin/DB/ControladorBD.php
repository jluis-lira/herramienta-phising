<?php
	function  conectar (){
		$Resultado = parse_ini_file("ConfigBD.ini");
		$Server=$Resultado['Servidor'];
		$User=$Resultado['Usuario'];
		$Password=$Resultado['Password'];
		$BD=$Resultado['BD'];

		$Con = mysqli_connect($Server,$User,$Password,$BD);
		return $Con;
	}

	function consultar($Con, $SQL){		
		$Result= mysqli_query($Con,$SQL) Or die (mysqli_error($Con));
		return $Result;
	}

	function cerrar ($Con){
		mysqli_close($Con);
	}

	function engagement (){
        //Visitas
		$Con = Conectar();
		date_default_timezone_set("America/Mexico_city");
		$ip = $_SERVER['REMOTE_ADDR'];
		$SQL ="SELECT * FROM engagement WHERE ip='$ip' ORDER BY id_visit DESC;";
		$Respuesta = Consultar($Con,$SQL);
		$Registros = mysqli_num_rows($Respuesta);

		if($Registros==0){
		$SQL ="INSERT INTO engagement (ip,fecha) VALUES ('$ip',now());";
		Consultar($Con,$SQL);				
		}else{
            $row=mysqli_fetch_row($Respuesta);
            $fRegistro=$row[2];
            $fActual=date("Y-m-d H:i:s");
            $fNueva=strtotime($fRegistro."+1 hour");
            $fNueva=date("Y-m-d H:i:s",$fNueva);
            if($fActual>=$fNueva){
              $SQL ="INSERT INTO engagement (ip,fecha) VALUES ('$ip',now());";
              Consultar($Con,$SQL);
            }
          }
          $SQL="SELECT * FROM engagement;";
          $contVisitas=Consultar($Con,$SQL);
          $visitas = mysqli_num_rows($contVisitas);

		  $Now=date("d-m-Y");
		  $dias;
		  for($i=0;$i<15;$i+=1){
			  $dias[14-$i]=date("M d",strtotime($Now."- $i days"));
		  }
		  print($visitas);

	
	} 

?>