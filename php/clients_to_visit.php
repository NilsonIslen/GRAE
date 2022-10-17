<?php
        $file_temp=file_exists("Temp/$id_us_s.php");
        if($file_temp){
        include "Temp/$id_us_s.php";}
        include "arrays/neighborhoods.php";
            $cola_b=0;
            while($cola_b <= $cant_neighb){
               $cola_b2 = $cola_b++; 
               $cola = $Barrs[$cola_b2];  
            $cola2=0;
            $clientspv=0;
             if($queryClients -> rowCount() > 0){
             foreach($resultsClients as $result) {
             include "Class/client.php";
             $Fecha = date('d-m-Y');
             $fecha_actual=strtotime("$Fecha");
             $visita_unix=strtotime("$Visita");
                    if($fecha_actual>=$visita_unix){$clientspv2=$clientspv++;}
                    if(($fecha_actual>=$visita_unix && "$cola"=="$Barrio" && $RutaV==$RutaC)
                    or($fecha_actual>=$visita_unix && "$cola"=="$Barrio" && $profile=="admin")){
                    $cola2_b2=$cola2++;

                    if($neighborhood==$Barrio){
                    echo "<div>";
                        echo "<p class='p_br'> $NameCli ($Direccion $Barrio)</p>";
                        if($profile=='rep'){
                        echo "<a href='php/sale.php?id_cli=$IdCli&name_cli=$NameCli&seccion=sale'> Registrar visita </a>";
                        }
                        echo "<a href='tel:$TelCli'> Llamar </a> </p>";
                        echo "<a href='$maps'> Maps </a> </p>";
                    echo "</div>";
                    continue;
                    }
                    if($cola2==1){echo "<a href='php/secciones.php?seccion=change_neighborhoods&barrio=$Barrio'> $Barrio </a>";};
                }}}}
?>