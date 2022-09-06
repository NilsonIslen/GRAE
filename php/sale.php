<?php
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
$Fecha = date('d-m-Y');
require "../html/head2.html";
include "../dbRepAGD.php";
if(isset($_GET['seccion'])){
    $seccion=$_GET['seccion'];
if($seccion == 'sale'){
    $id_cli=$_GET['id_cli'];
    $name_cli=$_GET['name_cli'];
    echo "<form action='../php/sale.php' method='POST'>";
    echo "<h2> Cliente: $name_cli </h2>";
    echo "<input type='hidden' name='id_cli' value='$id_cli' required>";
    echo "<input type='hidden' name='name_cli' value='$name_cli' required>";
    echo "<select name='product' required>";
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        include "../Class/products.php";
    echo "<option value=$id_product> $reference: $description, $$price </option>";
    }}
    echo "</select>";
    echo "<input type='number' name='amount' placeholder='Cantidad' required>";
    echo "<button type='submit' name='add_product'> Agregar producto </button>";
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
    fputs($fp, "$"."fecha= '$Fecha'; \n");
    fputs($fp, "$"."amount= $amount; \n");
    fputs($fp, "?> \n");
    fclose($fp);
}

    $sequence=1;
    $count=0;
    echo "<form action='posts.php' method='POST'>";
    echo "<a href='sale.php?id_cli=$id_cli&name_cli=$name_cli&seccion=sale'> + </a>";
    if($query_products -> rowCount() > 0){
        foreach($results_products as $result) {
        require "../class/products.php";
        $sequence2=$sequence++; 
        $file=file_exists("../Temp/$id_us_s/$id_cli/$sequence2.php");
        if($file){
        require "../Temp/$id_us_s/$id_cli/$sequence2.php";
        if($amount>=1){
        $price2=$price*$amount;
        $count=$count+$price2;
        echo "<input type='hidden' name='seller$sequence2' value='$id_us_s'>";
        echo "<input type='hidden' name='client$sequence2' value='$id_cli'>";
        echo "<input type='hidden' name='product$sequence2' value='$id_product'>";
        echo "<input type='hidden' name='amount$sequence2' value='$amount'>";
        echo "<p> $reference ($description) ($$price) x <b> $amount </b> = $price2 </p>";

    }}}}
       echo "<input type='hidden' name='sequence' value='$sequence2'>";
       echo "<p> <b> Valor Total: $count </b> </p>";
       echo "<button type='submit' name='record_sale'> Registrar Venta </button>";
       echo "<a href='secciones.php?seccion=cancel_sale&id_cli=$id_cli'> Declinar venta </a>";
       echo "</form>";
       
?>