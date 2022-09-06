<?php
require "../html/head2.html";
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
$Fecha = date('d-m-Y');
include "../dbRepAGD.php";

if(isset($_POST['new_product'])){
    $ref = $_POST['ref'];
    $description = $_POST['description'];
    $peso = $_POST['peso'];
    $price = $_POST['price'];
    $sql="insert into products(referencia,descripcion,peso_gramos,price)
    values(:referencia,:descripcion,:peso_gramos,:price)";
    $sql=$connect->prepare($sql);
    $sql->bindParam(':referencia',$ref,PDO::PARAM_STR, 25);
    $sql->bindParam(':descripcion',$description,PDO::PARAM_STR,25);
    $sql->bindParam(':peso_gramos',$peso,PDO::PARAM_STR,25);
    $sql->bindParam(':price',$price,PDO::PARAM_STR,25);
    $sql->execute();
    $lastInsertId=$connect->lastInsertId();
echo "<div>";
echo "<p> Se acaba de registrar nuevo producto</p>";
echo "<a href='../index2.php'> Aceptar </a>";
echo "</div>";
}

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


                if(isset($_POST['record_sale'])){ 
                    $date = date('d-m-Y');
                    $hour = date('H:i');
                    $sequence = $_POST['sequence'];
                for ($seq = 1; $seq == $sequence; $seq++){
                    $seller = $_POST["seller$seq"];
                    $client = $_POST["client$seq"];
                    $product = $_POST["product$seq"];
                    $amount = $_POST["amount$seq"];
                }
                if($amount>=1){
                    $sql="insert into ventas2022(date,hour,seller,client,product,amount) values(:date,:hour,:seller,:client,:product,:amount)";
                    $sql=$connect->prepare($sql);
                    $sql->bindParam(':date',$date,PDO::PARAM_STR, 25);
                    $sql->bindParam(':hour',$hour,PDO::PARAM_STR, 25);
                    $sql->bindParam(':seller',$seller,PDO::PARAM_STR,25);
                    $sql->bindParam(':client',$client,PDO::PARAM_STR,25);
                    $sql->bindParam(':product',$product,PDO::PARAM_STR,25);
                    $sql->bindParam(':amount',$amount,PDO::PARAM_STR,25);
                    $sql->execute();
                    $lastInsertId=$connect->lastInsertId();
                }

        if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result) {
        include "../Class/user.php";
                    if($id_us_s==$id_us){
                    $query ="UPDATE users SET customer=0 WHERE id_us=$id_us_s";
                    $result=$connect->query($query);
                }}}
                if($queryClients -> rowCount() > 0){
                    foreach($resultsClients as $result) {
                    include "../Class/client.php";
                        if($IdCli==$client){
                        $neighborhood=$Barrio;
                            $query ="UPDATE clients SET Visita='$date',hour='$hour',IdVendedor=0 WHERE IdCli=$client";
                            $result=$connect->query($query);                            
                        }      
                            }}
                         echo "<div>";
                         echo "<P> Registro de venta exitoso </P>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "</div>";
                        }



    if(isset($_POST['despacho'])){
        $IdVendedor = $_POST['IdVendedor'];
        $Ruta = $_POST['Ruta'];
        if($queryUsers -> rowCount() > 0){
            foreach($resultsUsers as $result) {
            include "../Class/user.php";
                        if($IdVendedor==$id_us){
                         $query ="UPDATE users SET Ruta=$Ruta WHERE id_us=$IdVendedor";
                        $result=$connect->query($query);
        
echo "<div>";
echo "<p> Se acaba de actualizar ruta para el repartidor $name_us</p>";
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