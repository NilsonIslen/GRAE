<?php
require "../html/head2.html";
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
$Fecha = date('d-m-Y');
include "../dbRepAGD.php";
include "../arrays/visit_frequency.php";

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

        if(isset($_POST['reports'])){
            $UsuarioS = $_SESSION['usuario'];
            $ClaveS = $_SESSION['clave'];
            $search_by=$_POST['search_by'];
            $id_query=$_POST['id'];
            $since = $_POST['since'];
            $until = $_POST['until'];
                echo "<a href='../index2.php'> Regresar </a>";
                echo "<table align='center'>";
                echo "<tr align='center'>";
                echo "<td> id venta </td> <td> Fecha </td> <td> Hora </td> <td> Vendedor </td> <td> Cliente </td> <td> Producto </td> <td> Cantidad </td> <td> Valor </td>";
                echo "</tr>";
                $packages=0;
                $balance=0;
                if($query_vent -> rowCount() > 0){
                foreach($results_vent as $result) {
                include "../Class/vent.php";
                if($query_products -> rowCount() > 0){
                foreach($results_products as $result) {
                include "../Class/products.php";
                if($queryClients -> rowCount() > 0){
                foreach($resultsClients as $result) {
                include "../Class/client.php";
                if($queryUsers -> rowCount() > 0){
                foreach($resultsUsers as $result) {
                include "../Class/user.php";
                if($seller_v==$id_us){
                if($client_v==$IdCli){
                if($product_v==$id_prod){
                if($search_by=='seller'){$compare=$seller_v;}
                if($search_by=='client'){$compare=$client_v;}
                if($search_by=='product'){$compare=$product_v;}
                if($search_by=='all'){$compare=$id_query;}
                if($id_query==$compare && $date_v>=$since && $date_v<=$until){
                $worth=$price*$amount_v;
                $packages=$amount_v+$packages;
                $balance=$worth+$balance;
                echo "<tr align='center'>";
                echo "<td> $id_v </td> <td> $date_v </td> <td> $hora_v </td> <td> $name_us </td> <td> $NameCli </td> <td> $reference </td> <td> $amount_v </td> <td> $$worth </td>";
                echo "</tr>";
                }}}
                }}}
                }}}
                }}}
                echo "<tr align='center'>";
                echo "<td colspan='6'> <b> Total </b> </td> <td> <b> $packages </b> </td> <td> <b> $$balance </b> </td>";
                echo "</tr>";
            echo "</table>";
            echo "<a href='../index2.php'> Regresar </a>";
            }
           

    if(isset($_POST['record_sale'])){ 
                    $date = date('d-m-Y');
                    $hour = date('H:i');
                    $sequence = $_POST['sequence'];
                    $seller = $_POST["seller"];
                    $client = $_POST["client"];
            
            for($seq=1; $seq<=$sequence; $seq++){
                
                $file=file_exists("../Temp/$seller/$client/$seq.php");
                if($file){require "../Temp/$seller/$client/$seq.php";
                }else{continue;}

                if($amount>=1){
                    $sql="insert into ventas2022(date,hour,seller,client,product,amount) values(:date,:hour,:seller,:client,:product,:amount)";
                    $sql=$connect->prepare($sql);
                    $sql->bindParam(':date',$fecha_2,PDO::PARAM_STR, 25);
                    $sql->bindParam(':hour',$hour,PDO::PARAM_STR, 25);
                    $sql->bindParam(':seller',$seller,PDO::PARAM_STR,25);
                    $sql->bindParam(':client',$client,PDO::PARAM_STR,25);
                    $sql->bindParam(':product',$seq,PDO::PARAM_STR,25);
                    $sql->bindParam(':amount',$amount,PDO::PARAM_STR,25);
                    $sql->execute();
                    $lastInsertId=$connect->lastInsertId();
                }}

                if($queryClients -> rowCount() > 0){
                    foreach($resultsClients as $result) {
                    include "../Class/client.php";
                    $date2=$Visit[$Frec];
                        if($IdCli==$client){
                        $neighborhood=$Barrio;
                            $query ="UPDATE clients SET Visita='$date2',hour='$hour' WHERE IdCli=$client";
                            $result=$connect->query($query);                            
                        }      
                            }}

                            $files = glob("../Temp/$id_us_s/$client/*"); 
                            foreach($files as $file){
                            if(is_file($file))
                            unlink($file);
                            }
                            $folder = "../Temp/$id_us_s/$client";
                            if (file_exists($folder)) {
                                @rmdir($folder);
                            }  

                         echo "<div>";
                         echo "<P> Registro de venta exitoso </P>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "</div>";
                        
                    }


    if(isset($_POST['update'])){
        $IdVendedor = $_POST['IdVendedor'];
        $tel = $_POST['tel'];
        $prof = $_POST['profile'];
        $Ruta = $_POST['Ruta'];
        if($queryUsers -> rowCount() > 0){
            foreach($resultsUsers as $result) {
            include "../Class/user.php";
                        if($IdVendedor==$id_us){
                         $query ="UPDATE users SET tel_us=$tel, profile='$prof', Ruta=$Ruta WHERE id_us=$IdVendedor";
                        $result=$connect->query($query);
        
echo "<div>";
echo "<p> Se acaba de actualizar ruta para el repartidor $name_us</p>";
echo "</div>";
}}}
        echo "<a href='../index2.php'> Regresar </a>";
exit();
}

if(isset($_POST['update_products'])){
    $id_product = $_POST['id_product'];
    $weight = $_POST['weight'];
    $price2 = $_POST['price'];
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        include "../Class/products.php";
                    if($id_product==$id_prod){
                     $query ="UPDATE products SET peso_gramos=$weight, price=$price2 WHERE id=$id_product";
                    $result=$connect->query($query);
    
echo "<div>";
echo "<p> Se acaba de actualizar el producto $id_product </p>";
echo "</div>";
}}}
    echo "<a href='../index2.php'> Regresar </a>";
exit();
}

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
                                    echo "<td> ID </td> <td> Cliente </td> <td> Barrio </td> <td> Direccion </td>  <td> Telefono <td> Frecuencia </td> <td> Proxima Visita </td> <td> Ruta </td>";
                                    echo "</tr>";
                                    $cantidad=0;
                                    if($queryClients -> rowCount() > 0){
                                        foreach($resultsClients as $result) {
                                        include "../Class/client.php";
                                        if($RutaC==$ruta){
                                        $cantid=$cantidad++;
                                        echo "<tr align='center'>";
                                            echo "<td> $IdCli </td> <td> $NameCli </td> <td> $Barrio </td> <td> $Direccion </td> <td> $TelCli </td> <td> $Frec </td> <td> $Visita </td>  <td> $RutaC </td> ";
                                            echo "</tr>";
                                    }}}
                                    echo "</table>"; 
                                    echo "<p> <b> $cantid clientes</b> </p>"; 
                                    
                                        echo '<a href="../index2.php"> Regresar </a>';
                                        exit();
                                    }




?>