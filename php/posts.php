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
                echo "<td> id venta </td> <td> Fecha </td> <td> Hora </td> <td> Vendedor </td> <td> Cliente </td> <td> Barrio </td> <td> Producto </td> <td> Cantidad </td> <td> Valor </td>";
                echo "</tr>";
                $packages=0;
                $balance=0;
                if($query_vent -> rowCount() > 0){
                foreach($results_vent as $result) {
                include "../Class/vent.php";
                if($search_by=='seller'){$compare=$seller_v;}
                if($search_by=='client'){$compare=$client_v;}
                if($search_by=='product'){$compare=$product_v;}
                if($search_by=='all'){$compare=$id_query;}
                if($id_query==$compare && $date_v>=$since && $date_v<=$until){

                    if($query_products -> rowCount() > 0){
                        foreach($results_products as $result) {
                        include "../Class/products.php";
                        if($product_v==$id_prod){
                            $product_v_2=$reference;
                            $price_2=$price;
                            $amount_v_2=$amount_v;
                        }}}

                    if($queryUsers -> rowCount() > 0){
                        foreach($resultsUsers as $result) {
                        include "../Class/user.php";
                        if($seller_v==$id_us){$seller_v_2=$name_us;}
                    }}
                
                    if($queryClients -> rowCount() > 0){
                        foreach($resultsClients as $result) {
                        include "../Class/client.php";
                        if($client_v==$IdCli){
                            $client_v_2=$NameCli;
                            $barrio_v_2=$Barrio;
                        }
                    }}

                $worth=$price_2*$amount_v_2;
                $packages=$amount_v_2+$packages;
                $balance=$worth+$balance;
                echo "<tr align='center'>";
                echo "<td> $id_v </td> <td> $date_v </td> <td> $hora_v </td> <td> $seller_v_2 </td> <td> $client_v_2 </td> <td> $barrio_v_2 </td> <td> $product_v_2 </td> <td> $amount_v </td> <td> $$worth </td>";
                echo "</tr>";
                }}}
                echo "<tr align='center'>";
                echo "<td colspan='7'> <b> Total </b> </td> <td> <b> $packages </b> </td> <td> <b> $$balance </b> </td>";
                echo "</tr>";
            echo "</table>";
            echo "<a href='../index2.php'> Regresar </a>";
            }
           

    if(isset($_POST['record_sale'])){ 
                    $date = date('d-m-Y');
                    $hour2 = date('H:i');
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
                    $sql->bindParam(':hour',$hour2,PDO::PARAM_STR, 25);
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
                        if($IdCli==$client){
                        $date2=$Visit[$frequency];
                        $neighborhood=$Barrio;
                            $query ="UPDATE clients SET Visita='$date2',hour='$hour2' WHERE IdCli=$client";
                            $result=$connect->query($query);                            
                        }      
                            }}
                            $files = glob("../Temp/$seller/$client/*"); 
                            foreach($files as $file){
                            if(is_file($file))
                            unlink($file);
                            }
                            $folder = "../Temp/$seller/$client";
                            if (file_exists($folder)) {
                                rmdir($folder);
                            }  
                         echo "<div>";
                         echo "<P> Registro de venta exitoso </P>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "</div>";
                    }


    if(isset($_POST['update'])){
        $id_rep = $_POST['id_rep'];
        $tel = $_POST['tel'];
        $prof = $_POST['prof'];
        $ruta = $_POST['ruta'];
        if($queryUsers -> rowCount() > 0){
            foreach($resultsUsers as $result) {
            include "../Class/user.php";
                        if($id_rep==$id_us){
                            if($tel==''){$tel=$tel_us;}
                            if($prof=='profile'){$prof=$profile;}
                            if($ruta==''){$ruta=$RutaV;}
                        $query ="UPDATE users SET tel_us=$tel, profile='$prof', Ruta=$ruta WHERE id_us=$id_rep";
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
    $segment2 = $_POST['segment'];
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        include "../Class/products.php";
                    if($id_product==$id_prod){
                     $query ="UPDATE products SET peso_gramos=$weight, price=$price2 segment=$segment2 WHERE id=$id_product";
                    $result=$connect->query($query);
    
echo "<div>";
echo "<p> Se acaba de actualizar el producto $id_product </p>";
echo "</div>";
}}}
    echo "<a href='../index2.php'> Regresar </a>";
exit();
}

        if(isset($_POST['update_client'])){ 
            $id_client = $_POST['id_client'];
            $name_client = $_POST['name_client'];
            $document_client = $_POST['document_client'];
            $neighborhoods_client = $_POST['neighborhoods_client'];
            $direction_client = $_POST['direction_client'];
            $maps_client = $_POST['maps_client'];
            $telephone_client = $_POST['telephone_client'];
            $email_client = $_POST['email_client'];
            $visit_client = $_POST['visit_client'];
            $hour_visit_client = $_POST['hour_visit_client'];
            $frequency_2 = $_POST['frequency'];
            $profile_client_2 = $_POST['profile_client'];
            $route_client = $_POST['route_client'];

            if($queryClients -> rowCount() > 0){
            foreach($resultsClients as $result) {
            include "../Class/client.php";
            if($IdCli==$id_client){
            if($name_client==''){$name_client=$NameCli;}
            if($document_client==''){$document_client=$document_cli;}
            if($neighborhoods_client==''){$neighborhoods_client=$Barrio;}
            if($direction_client==''){$direction_client=$Direccion;}
            if($maps_client==''){$maps_client=$maps;}
            if($telephone_client==''){$telephone_client=$TelCli;}
            if($email_client==''){$email_client=$email_cli;}
            if($visit_client==''){$visit_client=$Visita;}
            if($hour_visit_client==''){$hour_visit_client=$hour;}
            if($frequency_2==''){$frequency_2=$frequency;}
            if($profile_client_2==''){$profile_client_2=$profile_client;}
            if($route_client==''){$route_client=$RutaC;}

            $query ="UPDATE clients SET
            NameCli='$name_client',
            document='$document_client',
            Barrio='$neighborhoods_client',
            Direccion='$direction_client',
            maps='$maps_client',
            TelCli='$telephone_client',
            email='$email_client',
            Visita='$visit_client',
            hour='$hour_visit_client',
            frequency='$frequency_2',
            profile='$profile_client_2',
            Ruta='$route_client'
            WHERE IdCli=$id_client";
            $sql="insert into clients(NameCli,document,Barrio,Direccion,maps,TelCli,email,Visita,hour,frequency,profile,Ruta) values(:NameCli,:document,:Barrio,:Direccion,:maps,:TelCli,:email,:Visita,:hour,:frequency,:profile,:Ruta)";
            $result=$connect->query($query);
            echo "<div>";
            echo "<p> Hemos actualizado la informacion del Cliente $NameCli </p>";
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
            echo "<td > ID </td>
            <td> Cliente </td> 
            <td> Cedula o Nit </td> 
            <td> Barrio </td> 
            <td> Direccion </td> 
            <td> Maps </td> 
            <td> Telefono </td> 
            <td> Correo electronico </td> 
            <td> Proxima Visita </td> 
            <td> Hora </td> 
            <td> Perfil </td> 
            <td> Ruta </td>";
            echo "</tr>";
            $cantidad=0;
            if($queryClients -> rowCount() > 0){
            foreach($resultsClients as $result) {
            include "../Class/client.php";
            if($RutaC==$ruta){
            $cantid=$cantidad++;
            echo "<tr align='center'>";
            echo "
            <td> <a href='secciones.php?id_client=$IdCli&seccion=update_client'> $IdCli </a> </td> 
            <td> $NameCli </td>
            <td> $document_cli </td>
            <td> $Barrio </td>            
            <td> $Direccion </td>
            <td> $maps </td>
            <td> $TelCli </td>
            <td> $email_cli </td>
            <td> $Visita </td>
            <td> $hour </td>
            <td> $profile_client </td>
            <td> $RutaC </td>
            </tr>";
            }}}
            echo "</table>"; 
            echo "<div> <p> <b> $cantid clientes</b> </p> </div>"; 
            echo '<a href="../index2.php"> Regresar </a>';
            exit();
        }




?>