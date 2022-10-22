<?php
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
require "../html/head2.html";
include "../dbRepAGD.php";
if(isset($_GET['seccion'])){
    $seccion=$_GET['seccion'];

    if($seccion == 'change_neighborhoods'){
        $br=$_GET['barrio'];
    $fp = fopen("../Temp/$id_us_s.php","w");
    fputs($fp, "<?php \n");
    fputs($fp, "$"."neighborhood = '$br'; \n");
    fputs($fp, "?> \n");
    fclose($fp);
    echo "<div>";
    echo "<p> Acabas de cambiar de barrio a $br </p>";
    echo "</div>";
    }

if($seccion == 'new_product'){
    require "../html/form_new_product.html";
}
    

if($seccion == 'nuevoCliente'){
    require "../html/form_city.html";
    }

if($seccion == "nuevoUsuario"){
    include "../Forms/nuevoUsuario.php";
    exit();
}

if($seccion == "cancel_sale"){
    $id_cli=$_GET['id_cli'];
    $files = glob("../Temp/$id_us_s/$id_cli/*"); 
    foreach($files as $file){
    if(is_file($file))
    unlink($file);
    }
    $folder = "../Temp/$id_us_s/$id_cli";
    if (file_exists($folder)) {
        rmdir($folder);
    }  
    echo "<div>";
    echo "<p> Acabas de cancelar la venta con el cliente id:$id_cli </p>";
    echo "</div>";
}

if($seccion == "record_visit"){
        $id_client = $_GET['client'];
        if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result) {
        include "../Class/user.php";
        if($queryClients -> rowCount() > 0){
        foreach($resultsClients as $result) {
        include "../Class/client.php";
        if($id_client==$IdCli && $IdVendedor<>0 && $customer<>0){
            echo "<div>";
            echo "<p> Lo sentimos, este Cliente lo acaba de seleccionar otro usuario";
            echo "Pero no te preocupes, hay mas opciones disponibles </p>";
            echo "<a href='../index2.php'> Regresar </a>";
            echo "</div>";
        }
       if($id_us_s==$id_us && $id_client==$IdCli && $customer==0 && $IdVendedor==0){
            $query = "UPDATE users SET customer='$id_client' WHERE id_us=$id_us_s";
            $result=$connect->query($query);
            $query2 = "UPDATE clients SET IdVendedor='$id_us_s' WHERE IdCli=$id_client";
            $result2=$connect->query($query2);
            include "../Listas/prot.php";
         }}}}}}

if($seccion=='listar_clientes'){
    require "../html/form_rutas.html";
}

if($seccion == 'update'){
    $id_rep=$_GET['rep'];
    include "../Forms/despacho.php";
}

if($seccion == 'update_products'){
    $id_product=$_GET['id'];
    include "../Forms/update_products.php";
}

if($seccion == 'update_client'){
    $id_client=$_GET['id_client'];
    if($queryClients -> rowCount() > 0){
    foreach($resultsClients as $result) {
    include "../Class/client.php";
    include '../arrays/neighborhoods.php';
    if($id_client==$IdCli){
    echo "<form action='posts.php' method='POST'>";
    echo "<h2> Cliente id: $id_client</h2>";
    echo "<input type='hidden' name='id_client' value='$id_client'> <br />";
    echo "<hr> Nombre: <br />";
    echo "<input type='text' name='name_client' placeholder='$NameCli'> <br />";
    echo "<hr> cc o nit: <br />";
    echo "<input type='document' name='document_client' placeholder='$document_cli'> <br />";
    echo "<hr> Barrio: <br />";
    echo "<p> $Barrio </p> <br />";
    echo "<select name='neighborhoods_client'>";
        $Br = 1;
        while($Br <= $cant_neighb){
        $Barr = $Br++; 
        $Barrios = $Barrs[$Barr]; 
    echo "<option value='$Barrios'> $Barrios </option>";
        }
    echo "</select>";
    echo "<hr> Direccion: <br />";
    echo "<input type='text' name='direction_client' placeholder='$Direccion'> <br />";
    echo "<hr> maps: <br />";
    echo "<input type='text' name='maps_client' placeholder='$maps'> <br />";
    echo "<hr> Telefono: <br />";
    echo "<input type='number' name='telephone_client' placeholder='$TelCli'> <br />";
    echo "<hr> Email: <br />";
    echo "<input type='email' name='email_client' placeholder='$email_cli'> <br />";
    echo "<hr> Visita: <br />";
    echo "<input type='text' name='visit_client' placeholder='$Visita'> <br />";
    echo "<hr> Ruta: <br />";
    echo "<input type='number' name='route_client' placeholder='$RutaC'> <br />";
    echo "<hr> Cola: <br />";
    echo "<input type='number' name='tail_client' placeholder='$cola' min='0' max='100'> <br />";
    echo "<hr> <br />";
    echo "<button type='submit' name='update_client'> Actualizar </button>";
        
    }

}}}

    if($seccion == 'listarRepartidores'){
        echo "<a href='../index2.php'> Regresar </a>";
        echo "<table align='center'>";
        echo "<tr align='center'>";
        echo "<td> ID </td> <td> Repartidor </td> <td> Email </td> <td> Telefono </td>  <td> profile </td> <td> Ruta </td>";
        echo "</tr>";
    if($queryUsers -> rowCount() > 0){
    foreach($resultsUsers as $result) {
    include "../Class/user.php";
    echo "<tr align='center'>";
                echo "<td> <a href='secciones.php?rep=$id_us&seccion=update'> $id_us </a> </td> <td> $name_us </td> <td> $email_us </td> <td> $tel_us </td> <td> $profile </td> <td>  $RutaV </td>";
    echo "</tr>";
}}
            echo "</table>";
            echo "<a href='../index2.php'> Regresar </a>";
            exit();
        }
                if($seccion=='frecuencia_visita'){
                    $IdCli=$_GET['client'];
                    echo "<Div>";
                    echo "<h2> frecuencia de visita cliente id: $IdCli </h2>";
                     echo "<form action='posts.php' method='POST'>";
                     echo "<input type='hidden' name='IdCli' Value='$IdCli'>";
                     echo "<p> <input type='number' name='fdias' placeholder='dias' required> </p>";
                     echo "<p><button type='submit' name='frecuencia_visita'> Cambiar Frecuencia </button> </p>";
                     echo "</form>";
                        echo "<a href='../index2.php'> Regresar </a>";
                        echo "<p> <a href='sesion.php'> Cerrar sesion </a></p>";
                        echo "</Div>";
                        exit();
                    }
        
                    if($seccion == 'list_products'){
                        echo "<a href='../index2.php'> Regresar </a>";
                        echo "<table align='center'>";
                        echo "<tr align='center'>";
                        echo "<td> id </td> <td> Referencia </td> <td> Descripcion </td> <td> Peso (gramos) </td>  <td> Precio </td>";
                        echo "</tr>";
                    if($query_products -> rowCount() > 0){
                    foreach($results_products as $result) {
                    include "../Class/products.php";
                    echo "<tr align='center'>";
                                echo "<td> <a href='secciones.php?id=$id_prod&seccion=update_products'> $id_prod </a> </td> <td> $reference </td> <td> $description </td> <td> $weight_grams </td> <td> $price </td>";
                    echo "</tr>";
                }}
                    echo "</table>";
                    echo "<a href='../index2.php'> Regresar </a>";
                    exit();
                    }
                                if($seccion=='frecuencia_visita'){
                                    $IdCli=$_GET['client'];
                                    echo "<Div>";
                                    echo "<h2> frecuencia de visita cliente id: $IdCli </h2>";
                                     echo "<form action='posts.php' method='POST'>";
                                     echo "<input type='hidden' name='IdCli' Value='$IdCli'>";
                                     echo "<p> <input type='number' name='fdias' placeholder='dias' required> </p>";
                                     echo "<p><button type='submit' name='frecuencia_visita'> Cambiar Frecuencia </button> </p>";
                                     echo "</form>";
                                        echo "<a href='../index2.php'> Regresar </a>";
                                        echo "<p> <a href='sesion.php'> Cerrar sesion </a></p>";
                                        echo "</Div>";
                                        exit();
                                    }

                    if($seccion=='reports'){
                        $UsuarioS=$_SESSION['usuario'];
                        $ClaveS=$_SESSION['clave'];
        
                         echo "<Div>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "<form action='posts.php' method='POST'>";
                         echo "<p> Informe :</p>";
                         echo "<input type='hidden' name='usuario' Value='$UsuarioS'>";
                         echo "<input type='hidden' name='clave' Value='$ClaveS'>";
                         echo"<select name='search_by' required>";
                         echo"<option value=''> Consulta por: </option>";
                         echo"<option value='seller'> Vendedor </option>";
                         echo"<option value='client'> Cliente </option>";
                         echo"<option value='product'> Producto </option>";
                         echo"<option value='all'> Todo </option>";
                         echo"</select>";
                         echo "<input type='number' name='id' placeholder='id'>";
                         echo "<input type='date' name='since' min='2022-03-25' max='2030-05-25' placeholder='Fecha inicial' required>";
                         echo "<input type='date' name='until' min='2022-03-25' max='2030-05-25' placeholder='Fecha final'  required>";
                         echo "<button type='submit' name='reports'> Consultar </button>";
                         echo "</form>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "</Div>";
                            exit();
                        }

}
echo "<div>";
echo "<a href='../index2.php'> Continuar </a>";
echo "</div>";
?>