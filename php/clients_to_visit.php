<?php
        $file_temp=file_exists("Temp/$UsuarioS.php");
        if($file_temp){
        include "Temp/$UsuarioS.php";}
        include "arrays/neighborhoods.php";
            $cola_b=0;
            while($cola_b <= $cant_neighb){
               $cola_b2 = $cola_b++; 
                $cola = $Barrs[$cola_b2];  
            $cola2=0;
             if($queryClients -> rowCount() > 0){
             foreach($resultsClients as $result) {
             include "Class/client.php";
             $lat_client=floatval($latitud_c);
             $long_client=floatval($longitud_c);
             $per_lat=$lat_client-$lat;
             $per_long=$long_client-$long;
            
             $visita_unix=strtotime("$Visita");
                    if(($fecha_actual>=$visita_unix && "$cola"=="$Barrio" && $RutaV==$RutaC && $per_lat<0.0005 && $per_lat>-0.0005 && $per_long<0.0005 && $per_long>-0.0005 && $per_lat<>0 && $per_long<>0)
                    or($fecha_actual>=$visita_unix && "$cola"=="$Barrio" && $RutaV==$RutaC && $profile=="admin")){
                    $cola2_b2=$cola2++;
                    // if($cola2==1){echo "<b> $Barrio </b>";};
                     if($IdVendedor==0){  
                        echo "<div>";
                        echo "<p class='p_br'> $NameCli ($Direccion $Barrio)</p>";
                        //if($profile=='rep'){
                        echo "<a href='php/sale.php?id_cli=$IdCli&name_cli=$NameCli&seccion=sale'> Registrar visita </a>";
                        //}
                        echo "<a href='tel:$TelCli'> Llamar </a> </p>";
                        echo "<a href='https://www.google.com/maps/@$latitud_c,$longitud_c,20z'> Maps </a> </p>";
                        if($profile=='admin'){
                        echo "<a href='php/position2.php?user=$UsuarioS&client=$IdCli'> Actualizar ubicacion </a>";
                        }
                        echo "</div>";
                     }
                    if($IdVendedor<>0 && $IdVendedor<>$id_us_s){
                    echo "<p class='p_green'>  $IdVendedor -> $NameCli </p>";
                    echo "</div>";
                    }}}
                    
                    }}
?>