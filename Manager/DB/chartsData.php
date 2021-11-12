<?php
    include_once 'DB_driver.php';//Connection to DB
    
	$Con =connect();

    date_default_timezone_set("America/Mexico_city");//set up TIMEZONE

    //Declarate Arrays
    $data;//Main Array 
    $hoursVisits;//Visits in a specific hour of the last 6 months.
    $daysVisits;//Visits per day of the last 15 days.
    $monthsVisits;//Visits per month for the last 6 months.
    //Declarate Variables
    $Today=date("d-m-Y");//Today´s Date 
    $days15ago=date("Y-m-d",strtotime($Today."- 14 days"));//Date of 15 days ago
    $months6ago=date("Y-m",strtotime($Today."- 5 months"));//Date of 6 months ago

    //Consultas SQL

    //Consult Visitas últimos 15 Dias
    //******La funcion DATE_FORMATE depende del DBM*****
    $SQLdays="SELECT DATE_FORMAT(fecha,'%b %d') AS Dia,COUNT(DAY(fecha)) AS Visitas 
    FROM engagement WHERE fecha BETWEEN '$days15ago' AND now() GROUP by Dia Order by fecha;";
    $dataDays= mysqli_fetch_all(Consult($Con,$SQLdays));
    //Consult Visitas últimos 6 meses
    $SQLmonths="SELECT DATE_FORMAT(fecha,'%b %Y') AS Mes,COUNT(MONTH(fecha)) AS Visitas 
    FROM engagement WHERE fecha BETWEEN '$months6ago' AND now() GROUP by Mes Order by fecha;";
    $dataMonths= mysqli_fetch_all(Consult($Con,$SQLmonths));
    //Consult Visitas en una hora especifica durante los últimos 6 meses
    $SQLhours="SELECT DATE_FORMAT(fecha,'%H h') AS hora, COUNT(HOUR(fecha)) AS Visitas 
    FROM engagement WHERE fecha BETWEEN '$months6ago' AND now() GROUP by hora ORDER BY hora;";
    $dataHours= mysqli_fetch_all(Consult($Con,$SQLhours));
    
    //Asignacion de Valores
    
    for($i=0;$i<15;$i+=1){//Asignar Datos Visitas últimos 15 Dias
        $daysVisits[14-$i]=array('day'=>$dataDays[14-$i][0],'visits'=>$dataDays[14-$i][1]);
    }
    for($i=0;$i<6;$i+=1){ //Asignar Datos Visitas últimos 6 Meses
        $monthsVisits[5-$i]=array('month'=>$dataMonths[5-$i][0],'visits'=>$dataMonths[5-$i][1]);
    }
    for($i=0;$i<24;$i+=1){ //Asignar Datos Visitas Tendencia por Horario
        $hoursVisits[23-$i]=array('hour'=>$dataHours[23-$i][0],'visits'=>$dataHours[23-$i][1]);
    }

        //Envio de Datos
    $data=array($daysVisits,$monthsVisits,$hoursVisits);//Arreglo de Objetos
    echo json_encode($data);//envio de Datos
?>