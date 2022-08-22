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
                    if($OAM400g5>0 or $OAM550g5>0 or $OAM700g10>0 or $OAM800g20>0 or $o_masax1k>0){
                    if($cola2==1){echo "<div> <b> $Barrio </b>";};

                    if($IdVendedor==$id_us_s){  
                echo "<p> <hr> </p>";
                if($profile=='admin'){
                echo "<form action='php/position2.php' method='POST'>";
                echo "<input type='hidden' name='user' value='$UsuarioS'>"; 
                echo "<input type='hidden' name='client' value='$IdCli'>"; 
                echo "<input class='latitud' type='hidden' name='latitud' value=''>";
                echo "<input class='longitud' type='hidden' name='longitud' value=''>";
                echo "<button type='submit' name='upload_position2'> Actualizar ubicacion en $NameCli</button>";
                echo "</form>";
                }
                        echo "<p class='p_br'> $NameCli </p>";
                        echo "<p class='p_br'> $Direccion </p>";
                        echo "<a href='tel:$TelCli'> Llamar </a> </p>";
                        include "Forms/regVenta.php";
                        echo "<a href='php/secciones.php?seccion=cancelar_visita&client=$IdCli'> Cancelar </a>";
                        exit();
                    }
                    if($IdVendedor==0){   
                    echo "<p> <a href='php/secciones.php?seccion=record_visit&client=$IdCli'> $NameCli </a> </p>";
                    }
                    if($IdVendedor<>0 && $IdVendedor<>$id_us_s){
                    echo "<p class='p_green'>  $IdVendedor -> $NameCli </p>";
                    }}}}
                    echo "</div>";

                    if($OAM400g5<=0 && $OAM550g5<=0 && $OAM700g10<=0 && $OAM800g20<=0 && $o_masax1k<=0){
                        echo "<div>";
                        echo "<p> Para ver los clientes que actualmente estan esparando visita </p>";
                        echo "<p> debes contar con producto disponible.</p>";
                        echo "<p> lo puedes adquirir en la direccion:</p>";
                        echo "<p> Carrera 30a # 50a 65 Barrio Eucaliptus (Manizales - Caldas)</p>";
                        echo "<p> movil de contacto: 3008188284";
                        echo "<p> Para contar con el apoyo del equipo ingresa a nuestro grupo de whatsapp a travez de la siguiente imagen:</p>";
                        echo "<p><a href='https://chat.whatsapp.com/FOrZ9xwootL56cCiYCzU3b'><img src='Imgs/banner_GROUP_whatsapp.png' width='250' height='90'></a></p>";
                        echo "</div>";
                        }}}
?>