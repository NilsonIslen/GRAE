<?php
        $file_temp=file_exists("Temp/$id_us_s.php");
        if($file_temp){
        include "Temp/$id_us_s.php";}
        include "arrays/neighborhoods.php";
        include "arrays/time.php";

        $clients_global=1;
        $clients_global_on_hold=1;
        $clients_route=1;
        $clients_route_on_hold=1;
        if($queryClients -> rowCount() > 0){
        foreach($resultsClients as $result) {
        include "Class/client.php";
        $Fecha = date('d-m-Y');
        $fecha_actual=strtotime("$Fecha");
        $visita_unix=strtotime("$Visita");

        if($IdCli<>'' && $profile_client<>'inactive'){
        $clients_global_2=$clients_global++;}
        if($fecha_actual>=$visita_unix && $profile_client<>'inactive'){
        $clients_global_on_hold_2=$clients_global_on_hold++;}
        if($RutaC==$RutaV && $profile_client<>'inactive'){
        $clients_route_2=$clients_route++;}
        if($fecha_actual>=$visita_unix && $RutaC==$RutaV && $profile_client<>'inactive'){
        $clients_route_on_hold_2=$clients_route_on_hold++;}
        }}
        if($profile=="admin"){
        echo "<div>";
        echo "<p> <b> Global: $clients_global_2 clientes, $clients_global_on_hold_2 en espera.</b> </p>";
        echo "</div>";
        }
            $cola2=0;
            while($cola2 <= 1380){
            $cola3 = $cola2++; 
            $time2=$time[$cola3];
             if($queryClients -> rowCount() > 0){
             foreach($resultsClients as $result) {
             include "Class/client.php";
             $Fecha = date('d-m-Y');
             $fecha_actual=strtotime("$Fecha");
             $visita_unix=strtotime("$Visita");
                    if($fecha_actual>=$visita_unix
                    && $RutaV==$RutaC 
                    && $hour==$time2
                    && $profile_client<>'inactive'){
                        echo "<div>";
                        echo "<p> <b> Ruta$RutaC: $clients_route_2 clientes, $clients_route_on_hold_2 en espera.</b> </p>";
                        echo "</div>";
                        echo "<div>";
                        echo "<p> <b> $Barrio </b> </p>";
                        echo "<p class='p_br'>";
                        if($profile=="admin"){
                        echo "<a href='php/secciones.php?id_client=$IdCli&seccion=update_client'> $IdCli - $hour</a>";
                        }
                        echo " $NameCli <br />";
                        echo " $Direccion</p>";
                        echo "<p> <hr> </p>";
                        echo "<a href='tel:$TelCli'> Llamar </a> </p>";
                        echo "<p> <hr> </p>";
                        if($maps<>''){echo "<a href='$maps'> Maps </a> </p>";}
                        echo "<p> <hr> </p>";
                        echo "<a href='php/sale.php?id_cli=$IdCli&name_cli=$NameCli&prof_cli=$profile_client&seccion=sale'>
                        Registrar venta </a>";
                         echo "</div>";
            if($profile=="rep"){exit();}
                   }}
                   }}
                  
                

                   
?>