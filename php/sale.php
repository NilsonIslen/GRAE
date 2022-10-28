<?php
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
$fecha_1 = date('Y-m-d');
require "../html/head2.html";
include "../dbRepAGD.php";
if(isset($_GET['seccion'])){
    $seccion=$_GET['seccion'];
if($seccion == 'sale'){
    $id_cli=$_GET['id_cli'];
    $name_cli=$_GET['name_cli'];
    $profile_client=$_GET['prof_cli'];
    echo "<form action='../php/sale.php' method='POST'>";
    echo "<h2> $name_cli </h2>";
    echo "<input type='hidden' name='id_cli' value='$id_cli' required>";
    echo "<input type='hidden' name='name_cli' value='$name_cli' required>";
    echo "<select name='product' required>";
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        include "../Class/products.php";
    if($segment==$profile_client){
    echo "<option value=$id_prod> $reference $$price </option>";
    }


}}
    echo "</select>";
    echo "<input type='number' name='amount' placeholder='Cantidad' required>";
    echo "<button type='submit' name='add_product'> + </button>";
    echo "<a href='../index2.php'> Regresar </a>";
    echo "</form>";
    exit();
}}

if(isset($_POST['add_product'])){
    $id_cli = $_POST['id_cli'];
    $name_cli = $_POST['name_cli'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];
    $folder = "../Temp/$id_us_s/$id_cli";
    if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
    }
    $fp = fopen("../Temp/$id_us_s/$id_cli/$product.php","w");
    fputs($fp, "<?php \n");
    fputs($fp, "$"."fecha_2= '$fecha_1'; \n");
    fputs($fp, "$"."amount= $amount; \n");
    fputs($fp, "?> \n");
    fclose($fp);
}

    $sequence=1;
    $count=0;
    echo "<form action='posts.php' method='POST'>";
    echo "<h2> $name_cli </h2>";
    echo "<input type='hidden' name='seller' value='$id_us_s'>";
    echo "<input type='hidden' name='client' value='$id_cli'>";
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        require "../Class/products.php";
        $sequence2=$sequence++; 
        $file=file_exists("../Temp/$id_us_s/$id_cli/$sequence2.php");
        if($file){
        require "../Temp/$id_us_s/$id_cli/$sequence2.php";
        if($amount>=1){
        $price2=$price*$amount;
        $count=$count+$price2;
        echo "<p> $reference $$price x $amount = $price2 </p>";

    }}}}
       echo "<input type='hidden' name='sequence' value='$sequence2'>";
       echo "<p> <b> Valor Total: $count </b> </p>";
       echo "<a href='sale.php?id_cli=$id_cli&name_cli=$name_cli&seccion=sale'> + </a>";
       echo "<button type='submit' name='record_sale'> Registrar Venta </button>";
       echo "<a href='secciones.php?seccion=cancel_sale&id_cli=$id_cli'> Declinar venta </a>";
       echo "</form>";
       
?>