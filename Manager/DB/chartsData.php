<?php
//Connection to DB
    include_once 'DB_driver.php';
	$Con =connect();
    date_default_timezone_set("America/Mexico_city");//set up TIMEZONE
//Declare Arrays send data
    $data;//Main Array    
    $hoursVisits;//Visits in a specific hour of the last 6 months.
    $daysVisits;//Visits per day of the last 15 days.
    $monthsVisits;//Visits per month for the last 6 months.
//Declarate Variables
    $Today=date("d-m-Y");//Today´s Date 
    $days15ago=date("Y-m-d",strtotime($Today."- 14 days"));//Date of 15 days ago
    $months6ago=date("Y-m-1",strtotime($Today."- 5 months"));//Date of 6 months ago
//Declarate Arrays to store dates 
    $hoursArray;
    $daysArray;
    $monthsArray;
    for($i=0;$i<24;$i+=1){//Set hours range
        $hoursArray[$i]=$i." h";
    }
    for($i=0;$i<15;$i+=1){//Set day range
        $n=14-$i;
        $daysArray[$i]=date('M d',strtotime($Today."- $n days"));
    }
    for($i=0;$i<6;$i+=1){//Set month range
        $n=5-$i;
        $monthsArray[$i]=date("M Y",strtotime($Today."- $n months"));
    }
//SQL queries
    //Consult Visits Last 15 Days 
    //******DATE_FORMATE function depends on the DBM *****
    $SQLdays="SELECT DATE_FORMAT(date_visit,'%b %d') AS Dia,COUNT(DAY(date_visit))
    AS Visitas FROM engagement WHERE date_visit BETWEEN '$days15ago' AND now()
    GROUP by Dia Order by date_visit;";
    $dataDays= mysqli_fetch_all(Consult($Con,$SQLdays));
    //Consult Visits Last 6 Months
    $SQLmonths="SELECT DATE_FORMAT(date_visit,'%b %Y') AS Mes,COUNT(MONTH(date_visit)) 
    AS Visitas FROM engagement WHERE date_visit BETWEEN '$months6ago' AND now() 
    GROUP by Mes Order by date_visit;";
    $dataMonths= mysqli_fetch_all(Consult($Con,$SQLmonths));
    //Consult Visits according to the hour during the last 6 months 
    $SQLhours="SELECT DATE_FORMAT(date_visit,'%H h') AS hora, COUNT(HOUR(date_visit)) 
    AS Visitas FROM engagement WHERE date_visit BETWEEN '$months6ago' AND now() 
    GROUP by hora ORDER BY hora;";
    $dataHours= mysqli_fetch_all(Consult($Con,$SQLhours));    
//Count amount of data fetched from SQL queries
    $lenghtH=count($dataHours);
    $lenghtD=count($dataDays);
    $lenghtM=count($dataMonths);
//Assign visit data by hour
    if($lenghtH==24){//If the query returns ALL RESULTS 
        for($i=0;$i<24;$i+=1){
            $hoursVisits[$i]=array('hour'=>$dataHours[$i][0],
            'visits'=>$dataHours[$i][1]);
        }
    }elseif($lenghtH==0){
        for($i=0;$i<24;$i+=1){//If the query returns 0 RESULTS
            $hoursArray[$i]=array('hour'=>$hoursArray[$i],'visits'=>0);
        }
    }else{
        $temp=0;
        for($i=0;$i<24;$i+=1){//If the query returns INCOMPLETE RESULTS 
            if ($temp<$lenghtH) {
                if ($hoursArray[$i]==$dataHours[$temp][0]) {
                    $hoursVisits[$i]=array('hour'=>$dataHours[$temp][0],
                    'visits'=>$dataHours[$temp][1]);
                    $temp+=1;
                }else{
                    $hoursVisits[$i]=array('hour'=>$hoursArray[$i],'visits'=>0);
                }
            }else{
                $hoursVisits[$i]=array('hour'=>$hoursArray[$i],'visits'=>0);
            }
        }
    }
//Assign visit data by day
    if($lenghtD==15){
        for($i=0;$i<15;$i+=1){//If the query returns ALL RESULTS 
            $daysVisits[14-$i]=array('day'=>$dataDays[14-$i][0],
            'visits'=>$dataDays[14-$i][1]);
        }
    }elseif($lenghtD==0){
        for($i=0;$i<15;$i+=1){//If the query returns 0 RESULTS 
            $daysVisits[$i]=array('day'=>$daysArray[$i],'visits'=>0);
        }
    }else{
        $temp=0;
        for($i=0;$i<15;$i+=1){//If the query returns INCOMPLETE RESULTS 
            if($temp<$lenghtD){
                if ($daysArray[$i]==$dataDays[$temp][0]) {
                    $daysVisits[$i]=array('day'=>$dataDays[$temp][0],
                    'visits'=>$dataDays[$temp][1]);
                    $temp+=1;
                }else{
                    $daysVisits[$i]=array('day'=>$daysArray[$i],'visits'=>0);
                }
            }else{
                $daysVisits[$i]=array('day'=>$daysArray[$i],'visits'=>0);
            }
        }
    }
//Assign visit data by month
    if($lenghtM==6){
        for($i=0;$i<6;$i+=1){//If the query returns ALL RESULTS 
            $monthsVisits[5-$i]=array('month'=>$dataMonths[5-$i][0],
            'visits'=>$dataMonths[5-$i][1]);
        }
    }elseif($lenghtM==0){
        for($i=0;$i<6;$i+=1){//If the query returns 0 RESULTS 
            $monthsVisits[$i]=array('month'=>$monthsArray[$i],'visits'=>0);
        }
    }else{
        $temp=0;
        for($i=0;$i<6;$i+=1){//If the query returns INCOMPLETE RESULTS 
            if($temp<$lenghtM){
                if ($monthsArray[$i]==$dataMonths[$temp][0]) {
                    $monthsVisits[$i]=array('month'=>$dataMonths[$temp][0],
                    'visits'=>$dataMonths[$temp][1]);
                    $temp+=1;
                }else{
                    $monthsVisits[$i]=array('month'=>$monthsArray[$i],'visits'=>0);
                }
            }else{
                $monthsVisits[$i]=array('month'=>$monthsArray[$i],'visits'=>0);
            }
        }
    }
//Data sending 
    $data=array($daysVisits,$monthsVisits,$hoursVisits);//Object Arrangement
    echo json_encode($data);//Send data in JSON FORMAT
?>