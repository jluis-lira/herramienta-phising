<?php
    for ($i=0; $i <500 ; $i++) { 
        //Crear IP con 4 numeros aleatorios
        $intA = mt_rand(1,254);
        $intB = mt_rand(1,254);
        $intC = mt_rand(1,254);
        $intD = mt_rand(1,254);
        // Crear Fecha del registro de la visita
            //1609455600->2021-01-01 00:00:00
            //1640991600->2022-01-01 00:00:00
            //1633039200->2021-10-01 00:00:00
            //1622498400->2021-06-01 00:00:00
        $intDateRandom = mt_rand(1622498400,1633039200);
        //IP
        $ipRandom = "$intA.$intB.$intC.$intD";
        $DateRandom = date("Y-m-d H:i:s",$intDateRandom);
        //Crear Registro
        $SQL="INSERT INTO `engagement` VALUES (NULL, '$ipRandom', '$DateRandom');";
        echo($SQL."<br>");
    }
    
?>