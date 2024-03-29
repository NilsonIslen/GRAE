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
            $file=file_exists("../Temp/visits/$since.php");
                if($file){
                include "../Temp/visits/$since.php";
                $effectiveness=($effective_visits*100)/$visits;
                echo "<tr> <td colspan='12'>
            $since: <b> $effective_visits visitas efectivas de  $visits ($effectiveness %) </b>
            </td> </tr>";
                }
                echo "<tr align='center'>";
                echo "
                <td> <b> id venta </b> </td>
                <td> <b> Fecha </b> </td>
                <td> <b> Hora </b> </td>
                <td> <b> Vendedor </b> </td>
                <td> <b> Cliente </b> </td>
                <td> <b> Barrio </b> </td>
                <td> <b> Telefono </b> </td>
                <td> <b> Producto </b> </td>
                <td> <b> Cantidad </b> </td>
                <td> <b> Valor </b> </td>
                <td> <b> Cantidad total </b> </td>
                <td> <b> Valor total </b> </td>";
                echo "</tr>";
                $packages=0;
                $balance=0;
                $visits_count=0;
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
                    $rep=0;
                    if($queryClients -> rowCount() > 0){
                        foreach($resultsClients as $result) {
                        include "../Class/client.php";
                        if($client_v==$IdCli){
                            $client_v_2=$NameCli;
                            $barrio_v_2=$Barrio;
                            $telephone=$TelCli;
                    }}}
                $worth=$price_2*$amount_v_2;
                $packages=$amount_v_2+$packages;
                $balance=$worth+$balance;
                echo "<tr align='center'>";
                echo "
                <td> $id_v </td>
                <td> $date_v </td>
                <td> $hora_v </td>
                <td> $seller_v_2 </td>
                <td> $client_v_2 </td>
                <td> $barrio_v_2 </td>
                <td> $telephone </td>
                <td> $product_v_2 </td>
                <td> $amount_v </td>
                <td> $$worth </td>
                <td> $packages </td>
                <td> $$balance </td>";
                echo "</tr>";
                }}}
            $file=file_exists("../Temp/visits/$until.php");
                if($file){
                include "../Temp/visits/$until.php";
                $effectiveness=($effective_visits*100)/$visits;
                echo "<tr> <td colspan='12'>
$until: <b> $effective_visits visitas efectivas de  $visits ($effectiveness %)
</b> </td> </tr>";
            }
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
                if($amount>=0){
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
                            $query ="UPDATE clients SET Visita='$date2',hour='$hour' WHERE IdCli=$client";
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
                                rmdir($folder);}
                    
        $file_ex=file_exists("../Temp/visits/$fecha_2.php");
        if($file_ex){
        include "../Temp/visits/$fecha_2.php";
        }else{
        $fecha_2=date('Y-m-d');
        $visits=0;
        $effective_visits=0;
        }
        $visits_2=$visits+1;             
        if($amount>0){$effective_visits_2=$effective_visits+1;
        }else{$effective_visits_2=$effective_visits;}
        $fp = fopen("../Temp/visits/$fecha_2.php","w");
        fputs($fp, "<?php \n");
        fputs($fp, "$"."visits = $visits_2; \n");
        fputs($fp, "$"."effective_visits = $effective_visits_2; \n");
        fputs($fp, "?> \n");
        fclose($fp);
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
            include "../arrays/time.php";
            echo "<a href='../index2.php'> Regresar </a>";
            echo "<table align='center'>";
            echo "<tr align='center'>";
            echo "<td > ID </td>
            <td> Hora </td> 
            <td> Cliente </td> 
            <td> Cedula o Nit </td> 
            <td> Barrio </td> 
            <td> Direccion </td> 
            <td> Maps </td> 
            <td> Telefono </td> 
            <td> Correo electronico </td> 
            <td> Proxima Visita </td> 
            <td> Perfil </td> 
            <td> Ruta </td>";
            echo "</tr>";
            $cola2=0;
            while($cola2 <= 1380){
            $cola3 = $cola2++; 
            $time2=$time[$cola3];
            $cantidad=0;
            if($queryClients -> rowCount() > 0){
            foreach($resultsClients as $result) {
            include "../Class/client.php";
            if($RutaC==$ruta){$cantid=$cantidad++;}
            if($RutaC==$ruta && $hour==$time2){
            echo "<tr align='center'>";
            echo "
            <td> <a href='secciones.php?id_client=$IdCli&seccion=update_client'> $IdCli </a> </td> 
            <td> $hour </td>
            <td> $NameCli </td>
            <td> $document_cli </td>
            <td> $Barrio </td>            
            <td> $Direccion </td>
            <td> $maps </td>
            <td> $TelCli </td>
            <td> $email_cli </td>
            <td> $Visita </td>
            <td> $profile_client </td>
            <td> $RutaC </td>
            </tr>";
            }}}}
            echo "</table>"; 
            echo "<div> <p> <b> $cantid clientes</b> </p> </div>"; 
            echo '<a href="../index2.php"> Regresar </a>';
            exit();
        }




?>