<?php
        $file_temp=file_exists("Temp/$id_us_s.php");
        if($file_temp){
        include "Temp/$id_us_s.php";}
        include "arrays/neighborhoods.php";
            $cola2=1;
            if(isset($_GET['seccion'])){
            $seccion = $_GET['seccion'];
            $cola4 = $_GET['cola4'];
            if($seccion=='omit'){
            $cola5 = $cola4+1;
            $cola2=$cola5;}}
            while($cola2 <= 100){
               $cola3 = $cola2++; 
            $clientspv=0;
            $comtrol=0;
             if($queryClients -> rowCount() > 0){
             foreach($resultsClients as $result) {
             include "Class/client.php";
             $Fecha = date('d-m-Y');
             $fecha_actual=strtotime("$Fecha");
             $visita_unix=strtotime("$Visita");
                    if($fecha_actual>=$visita_unix){$clientspv2=$clientspv++;}
                    if($fecha_actual>=$visita_unix
                    && $RutaV==$RutaC 
                    && $cola3==$cola
                    or ($fecha_actual>=$visita_unix
                    && $cola3==$cola
                    && $profile=="admin")){
                    echo "<div>";
                        echo "<p class='p_br'>";
                        echo " $NameCli <br />";
                        echo " $Barrio <br />";
                        echo " $Direccion</p>";
                        if($profile=='admin'){
                            echo "<p> Ruta $RutaC </p>";
                            }
                        if($profile=='rep'){
                        echo "<a href='php/sale.php?id_cli=$IdCli&name_cli=$NameCli&seccion=sale'> Registrar visita </a>";
                        }
                        echo "<a href='tel:$TelCli'> Llamar </a> </p>";
                        if($maps<>''){echo "<a href='$maps'> Maps </a> </p>";}
                        
                    echo "</div>";
                    $control2=$control++;
                   }}}
                   if($profile=="admin" && $cola3==1){
                    echo "<div>";
                    echo "<p> <b> Faltan $clientspv2 clientes por visitar </b> </p>";
                    echo "</div>";
                   }
                  if($control2>0){
                    echo "<div>";
                    echo "<a href='index2.php?seccion=omit&cola4=$cola3'> Aplazar </a>";
                    echo "</div>";
                    exit();}
                }
?>