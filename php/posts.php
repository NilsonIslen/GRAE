<?php
require "../html/head2.html";
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
$Fecha = date('d-m-Y');
include "../dbRepAGD.php";
if(isset($_POST['HDespachos'])){
    $FechaHD = $_POST['Fecha'];
    $Resp= $_POST['Responsable'];
    $Vend = $_POST['Vendedor'];
    echo "<a href='../index2.php'> Regresar </a>";
    echo "<table align='center'>";
    echo "<tr align='center'>";
    echo "<td> Fecha </td> <td> Hora </td> <td> Responsable </td> <td> Vendedor </td> <td> AM400g5 </td> <td> AM550g5 </td> <td> AM700g10 </td> <td> AM800g20 </td> <td> Masax1k </td>";
    echo "</tr>";
    $SumAM400g5=0;
    $SumAM550g5=0;
    $SumAM700g10=0;
    $SumAM800g20=0;
    $Sum_masax1k=0;
    if($queryDel -> rowCount() > 0){
    foreach($resultsDel as $result) {
    include "../Class/delivery.php";
    if("$FechaHD"=="$FechaD" && "$Resp"=="$Responsable" && "$Vend"=="$Vendedor"){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="" && "$Resp"=="$Responsable" && "$Vend"=="$Vendedor"){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td> <td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="$FechaD" && "$Resp"=="" && "$Vend"=="$Vendedor"){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td> <td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="$FechaD" && "$Resp"=="$Responsable" && "$Vend"==""){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="$FechaD" && "$Resp"=="" && "$Vend"==""){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="" && "$Resp"=="$Responsable" && "$Vend"==""){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }
    if("$FechaHD"=="" && "$Resp"=="" && "$Vend"=="$Vendedor"){
        echo "<tr align='center'>";
        echo "<td> $FechaD </td> <td> $HoraD </td> <td> $Responsable </td> <td> $Vendedor </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
        echo "</tr>";
        $SumAM400g5+=$AM400g5;
        $SumAM550g5+=$AM550g5;
        $SumAM700g10+=$AM700g10;
        $SumAM800g20+=$AM800g20;
        $Sum_masax1k+=$masax1k;
    }}}
    echo "<td Colspan='4'> Total <td> $SumAM400g5 </td> <td> $SumAM550g5 </td> <td> $SumAM700g10 </td> <td> $SumAM800g20 </td><td> $Sum_masax1k </td>";
        echo "</table>";
        exit();}



        if(isset($_POST['HVentas'])){
            $UsuarioS = $_SESSION['usuario'];
            $ClaveS = $_SESSION['clave'];
            $FechaHV = $_POST['FechaHV'];
            $VendedorV = $_POST['VendedorV'];
            $ClienteV = $_POST['ClienteV'];
            echo "<a href='../index2.php'> Regresar </a>";       
            echo "<table align='center'>";
            echo "<tr align='center'>";
            echo "<td> Fecha </td> <td> Hora </td> <td> Vendedor </td> <td> Cliente </td> <td> Barrio </td> <td> AM400g5 </td> <td> AM550g5 </td> <td> AM700g10 </td> <td> AM800g20 </td> <td> masax1k </td>";
            echo "</tr>";
            $SumAM400g5=0;
            $SumAM550g5=0;
            $SumAM700g10=0;
            $SumAM800g20=0;
            $Sum_masax1k=0;
            if($queryVent -> rowCount() > 0){
            foreach($resultsVent as $result) {
            include "../Class/vent.php";
            if("$FechaHV"=="$FechaV" && "$VendedorV"=="$Vendedor" && "$ClienteV"=="$Cliente"){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td> <td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="$FechaV" && "$VendedorV"=="$Vendedor" && "$ClienteV"==""){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td> <td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="$FechaV" && "$VendedorV"=="" && "$ClienteV"=="$Cliente"){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="" && "$VendedorV"=="$Vendedor" && "$ClienteV"=="$Cliente"){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="$FechaV" && "$VendedorV"=="" && "$ClienteV"==""){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="" && "$VendedorV"=="$Vendedor" && "$ClienteV"==""){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }
            if("$FechaHV"=="" && "$VendedorV"=="" && "$ClienteV"=="$Cliente"){
                echo "<tr align='center'>";
                echo "<td> $FechaV </td> <td> $HoraV </td> <td> $Vendedor </td> <td> $Cliente </td> <td> $Barrio </td> <td> $AM400g5 </td> <td> $AM550g5 </td> <td> $AM700g10 </td> <td> $AM800g20 </td><td> $masax1k </td>";
                echo "</tr>";
                $SumAM400g5+=$AM400g5;
                $SumAM550g5+=$AM550g5;
                $SumAM700g10+=$AM700g10;
                $SumAM800g20+=$AM800g20;
                $Sum_masax1k+=$masax1k;
            }}}
            echo "<td Colspan='5'> Total <td> $SumAM400g5 </td> <td> $SumAM550g5 </td> <td> $SumAM700g10 </td> <td> $SumAM800g20 </td><td> $Sum_masax1k </td>";
               echo "</table>";
               echo "<a href='../index2.php'> Regresar </a>";
                exit(); 
                }


                if(isset($_POST['venta'])){ 
                    include "../arrays/visit_frequency.php";
                    $FechaV = date('d-m-Y');
                    $HoraV = date('H:i:s');
                    $hora = date('H:i');
                    $IdClient = $_POST['IdCli'];
                    $id_user = $_POST['id_us'];
                    $Vendedor = $_POST['Vendedor'];
                    $Cliente = $_POST['Cliente'];
                    $Barrio = $_POST['Barrio'];
                    $AM400g5 = $_POST['AM400g5'];
                    $AM550g5 = $_POST['AM550g5'];
                    $AM700g10 = $_POST['AM700g10'];
                    $AM800g20 = $_POST['AM800g20'];
                    $masax1k = $_POST['masax1k'];
                    $cambios = $_POST['cambios'];
                    if($AM400g5==''){$AM400g5=0;}
                    if($AM550g5==''){$AM550g5=0;}
                    if($AM700g10==''){$AM700g10=0;}
                    if($AM800g20==''){$AM800g20=0;}
                    if($masax1k==''){$masax1k=0;}
        $sql="insert into ventas2022(FechaV,HoraV,Vendedor,Cliente,Barrio,AM400g5,AM550g5,AM700g10,AM800g20,masax1k) values(:FechaV,:HoraV,:Vendedor,:Cliente,:Barrio,:AM400g5,:AM550g5,:AM700g10,:AM800g20,:masax1k)";
        $sql=$connect->prepare($sql);
        $sql->bindParam(':FechaV',$FechaV,PDO::PARAM_STR, 25);
        $sql->bindParam(':HoraV',$HoraV,PDO::PARAM_STR, 25);
        $sql->bindParam(':Vendedor',$Vendedor,PDO::PARAM_STR,25);
        $sql->bindParam(':Cliente',$Cliente,PDO::PARAM_STR,25);
        $sql->bindParam(':Barrio',$Barrio,PDO::PARAM_STR,25);
        $sql->bindParam(':AM400g5',$AM400g5,PDO::PARAM_STR,25);
        $sql->bindParam(':AM550g5',$AM550g5,PDO::PARAM_STR,25);
        $sql->bindParam(':AM700g10',$AM700g10,PDO::PARAM_STR,25);
        $sql->bindParam(':AM800g20',$AM800g20,PDO::PARAM_STR, 25);
        $sql->bindParam(':masax1k',$masax1k,PDO::PARAM_STR, 25);
        $sql->execute();
        $lastInsertId=$connect->lastInsertId();
        if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result) {
        include "../Class/user.php";
                    if($id_user==$id_us){
                    $RAM400g5=$OAM400g5-$AM400g5;
                    $RAM550g5=$OAM550g5-$AM550g5;
                    $RAM700g10=$OAM700g10-$AM700g10;
                    $RAM800g20=$OAM800g20-$AM800g20;
                    $R_masax1k=$o_masax1k-$masax1k;
                    $query ="UPDATE users SET customer=0, AM400g5=$RAM400g5, AM550g5=$RAM550g5, AM700g10=$RAM700g10, AM800g20=$RAM800g20, masax1k=$R_masax1k WHERE id_us=$id_user";
                    $result=$connect->query($query);
                }}}
                if($queryClients -> rowCount() > 0){
                    foreach($resultsClients as $result) {
                    include "../Class/client.php";
                        if($IdCli==$IdClient){
                        $neighborhood=$Barrio;
                        if($AM400g5==0 && $DAM400g5==0){$DemAM400g5=0;}
                        if($AM400g5>0 or $DAM400g5>0){$DemAM400g5=($AM400g5+$DAM400g5)/2;}
                        if($AM550g5==0 && $DAM550g5==0){$DemAM550g5=0;}
                        if($AM550g5>0 or $DAM550g5>0){$DemAM550g5=($AM550g5+$DAM550g5)/2;}
                        if($AM700g10==0 && $DAM700g10==0){$DemAM700g10=0;}
                        if($AM700g10>0 or $DAM700g10>0){$DemAM700g10=($AM700g10+$DAM700g10)/2;}
                        if($AM800g20==0 && $DAM800g20==0){$DemAM800g20=0;}
                        if($AM800g20>0 or $DAM800g20>0){$DemAM800g20=($AM800g20+$DAM800g20)/2;}
                        if($masax1k==0 && $d_masax1k==0){$Dem_masax1k=0;}
                        if($masax1k>0 or $d_masax1k>0){$Dem_masax1k=($masax1k+$d_masax1k)/100;}
                        if($cambios=='Si'){
                            $query ="UPDATE clients SET Visita='$FechaV',hour='$hora',IdVendedor=0, NameVendedor=0, AM400g5=$DemAM400g5, AM550g5=$DemAM550g5,AM700g10=$DemAM700g10, AM800g20=$DemAM800g20, masax1k=$Dem_masax1k, Pedido='<span><b>$Fecha a las $hora</b><br> Visitar para realizar cambio de producto</span>' WHERE IdCli=$IdClient";
                            $result=$connect->query($query);                            
                        }
                        if($cambios=='No'){
                            $query ="UPDATE clients SET Visita='$Visit[$Frec]',hour='$hora',IdVendedor=0, AM400g5=$DemAM400g5, AM550g5=$DemAM550g5,AM700g10=$DemAM700g10, AM800g20=$DemAM800g20, masax1k=$Dem_masax1k, Pedido='0' WHERE IdCli=$IdClient";
                            $result=$connect->query($query);
                        }      
                            }}}
                            $tAM400g5=$AM400g5*900;
                            $tAM550g5=$AM550g5*1200;
                            $tAM700g10=$AM700g10*1500;
                            $tAM800g20=$AM800g20*1900;
                            $t_masax1k=$masax1k*2000;
                            $ValTot=$tAM400g5+$tAM550g5+$tAM700g10+$tAM800g20+$t_masax1k;
                            echo "<div>";
                            echo "<table>";
                            echo "<tr>";
                            echo "<td colspan='2'> $Cliente </td>";
                            echo "<td colspan='2'> $neighborhood  </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Referencia </td>";
                            echo "<td> Cantidad </td>";
                            echo "<td> Valor Unitario </td>";
                            echo "<td> Valor Total </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> AM400g5 </td>";
                            echo "<td> $AM400g5 </td>";
                            echo "<td> $900 </td>";
                            echo "<td> $tAM400g5 </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> AM550g5 </td>";
                            echo "<td> $AM550g5 </td>";
                            echo "<td> $1200 </td>";
                            echo "<td> $tAM550g5 </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> AM700g10 </td>";
                            echo "<td> $AM700g10 </td>";
                            echo "<td> $1500 </td>";
                            echo "<td> $tAM700g10 </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> DAM800g20 </td>";
                            echo "<td> $AM800g20 </td>";
                            echo "<td> $1900 </td>";
                            echo "<td> $tAM800g20 </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Masax1k </td>";
                            echo "<td> $masax1k </td>";
                            echo "<td> $2500 </td>";
                            echo "<td> $t_masax1k </td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td colspan='3'> Valor total: </td>";
                            echo "<td> $ValTot </td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "<P> Registro exitoso </P>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "<div>";
    exit();
    }

    if(isset($_POST['despacho'])){
        $Fecha = date('d-m-Y');
        $Hora = date('H:i:s');
        $Responsable = $UsuarioS;
        $IdVendedor = $_POST['IdVendedor'];
        $AM400g5 = floatval($_POST['AM400g5']);
        $AM550g5 = floatval($_POST['AM550g5']);
        $AM700g10 = floatval($_POST['AM700g10']);
        $AM800g20 = floatval($_POST['AM800g20']);
        $masax1k = floatval($_POST['masax1k']);
        $Ruta = $_POST['Ruta'];
        if($queryUsers -> rowCount() > 0){
            foreach($resultsUsers as $result) {
            include "../Class/user.php";
                        if($IdVendedor==$id_us){
                            $RAM400g5=(floatval($OAM400g5)+$AM400g5);
                            $RAM550g5=(floatval($OAM550g5)+$AM550g5);
                            $RAM700g10=(floatval($OAM700g10)+$AM700g10);
                            $RAM800g20=(floatval($OAM800g20)+$AM800g20);
                            $R_masax1k=($o_masax1k+$masax1k);
                         $query ="UPDATE users SET AM400g5=$RAM400g5, AM550g5=$RAM550g5, AM700g10=$RAM700g10, AM800g20=$RAM800g20, masax1k=$R_masax1k, Ruta=$Ruta
                         WHERE id_us=$IdVendedor";
                        $result=$connect->query($query);
        $sql="insert into deliveries2022(FechaD,HoraD,Responsable,Vendedor,AM400g5,AM550g5,AM700g10,AM800g20,masax1k)
        values(:FechaD,:HoraD,:Responsable,:Vendedor,:AM400g5,:AM550g5,:AM700g10,:AM800g20,:masax1k)";
        $sql=$connect->prepare($sql);
        $sql->bindParam(':FechaD',$Fecha,PDO::PARAM_STR, 25);
        $sql->bindParam(':HoraD',$Hora,PDO::PARAM_STR,25);
        $sql->bindParam(':Responsable',$Responsable,PDO::PARAM_STR,25);
        $sql->bindParam(':Vendedor',$name_us,PDO::PARAM_STR,25);
        $sql->bindParam(':AM400g5',$AM400g5,PDO::PARAM_STR,25);
        $sql->bindParam(':AM550g5',$AM550g5,PDO::PARAM_STR,25);
        $sql->bindParam(':AM700g10',$AM700g10,PDO::PARAM_STR, 25);
        $sql->bindParam(':AM800g20',$AM800g20,PDO::PARAM_STR, 25);
        $sql->bindParam(':masax1k',$masax1k,PDO::PARAM_STR, 25);
        $sql->execute();
        $lastInsertId=$connect->lastInsertId();
echo "<div>";
echo "<p> Se acaba de registrar nuevo despacho para el repartidor $name_us</p>";
echo "</div>";
}}}
        echo "<a href='../index2.php'> Regresar </a>";
exit();
}


if(isset($_POST['Pedido'])){
    $IdClient = $_POST['IdCli'];
    $detalles_pedido = $_POST['detalles'];
    $Hora = date('H:i:s');
    if($queryClients -> rowCount() > 0){
        foreach($resultsClients as $result) {
        include "../Class/client.php";
                    if($IdClient==$IdCli){
                    $query ="UPDATE clients SET Visita='$Fecha', Pedido='<b>Pedido $Fecha a las $Hora</b><br> $detalles_pedido' WHERE IdCli=$IdClient";
                    $result=$connect->query($query);
                    echo "<div>";
                    echo "<p> Hemos registrado el nuevo pedido para el Cliente $NameCli </p>";
                    echo "<p> Gracias por tu gestion </p>";
                    echo "<a href='../index2.php'> Regresar </a>";
                    echo "<div>";
                    exit();

                }}}}

                if(isset($_POST['frecuencia_visita'])){ 
                    $IdClient = $_POST['IdCli'];
                    $fdias = $_POST['fdias'];
                    if($queryClients -> rowCount() > 0){
                        foreach($resultsClients as $result) {
                        include "../Class/client.php";
                                    if($IdClient==$IdCli){
                                    $query ="UPDATE clients SET Frecuencia='$fdias' WHERE IdCli=$IdClient";
                                    $result=$connect->query($query);
                                    echo "<div>";
                                    echo "<p> Hemos actualizado la frecuencia de visita para el Cliente $NameCli </p>";
                                    echo "<p> Gracias por tu gestion </p>";
                                    echo "<a href='../index2.php'> Regresar </a>";
                                    echo "</div>";
                                    exit();
                                }}}}

                                if(isset($_POST['listar_clientes'])){
                                    $ruta=$_POST['ruta'];
                                    echo "<a href='../index2.php'> Regresar </a>";
                                    echo "<table align='center'>";
                                    echo "<tr align='center'>";
                                    echo "<td> ID </td> <td> Cliente </td> <td> Barrio </td> <td> Direccion </td>  <td> Telefono </td> <td> Pedido </td> <td> AM400g5 </td> <td> AM550g5 </td> <td> AM800g20 </td> <td> Masax1k </td> <td> Frecuencia </td> <td> Proxima Visita </td> <td> Vendedor actual </td> <td> Ruta </td>";
                                    echo "</tr>";
                                    $cantidad=0;
                                    if($queryClients -> rowCount() > 0){
                                        foreach($resultsClients as $result) {
                                        include "../Class/client.php";
                                        if($RutaC==$ruta){
                                        $cantid=$cantidad++;
                                        echo "<tr align='center'>";
                                            echo "<td> $IdCli </td> <td> $NameCli </td> <td> $Barrio </td> <td> $Direccion </td> <td> $TelCli </td> <td> <a href='secciones.php?usuario=$id_us_s&seccion=Pedidos&client=$IdCli'> Pedido </a> </td> <td> $DAM400g5 </td> <td> $DAM550g5 </td> <td> $DAM800g20 </td>  <td> $d_masax1k </td> <td><a href='secciones.php?usuario=$id_us_s&seccion=frecuencia_visita&client=$IdCli'> $Frec </a> </td> <td> $Visita </td> <td> $IdVendedor </td> <td> $RutaC </td> ";
                                            echo "</tr>";
                                    }}}
                                    echo "</table>"; 
                                    echo "<p> <b> $cantid clientes</b> </p>"; 
                                    
                                        echo '<a href="../index2.php"> Regresar </a>';
                                        exit();
                                    }




?>