 <?php
session_start();
require "../html/head2.html";
if(isset($_GET['user'])){
$user=$_GET['user'];
$id_c=$_GET['client'];
echo "<form action='../php/position2.php' method='POST'>";
echo "<input type='hidden' name='user' value='$user'>"; 
echo "<input type='hidden' name='client' value='$id_c'>"; 
echo "<input class='latitud' type='hidden' name='latitud' value=''>";
echo "<input class='longitud' type='hidden' name='longitud' value=''>";
echo "<button type='submit' name='upload_position'> Actualizar posicion </button>";
echo "</form>";
echo "<hr>";
echo "<form action='../php/position2.php' method='POST'>";
echo "<input type='hidden' name='user' value='$user'>"; 
echo "<input type='hidden' name='client' value='$id_c'>"; 
echo "<input class='latitud' type='text' name='latitud' placeholder='latitud' required>";
echo "<input class='longitud' type='text' name='longitud' placeholder='longitud' required>";
echo "<button type='submit' name='upload_position2'> Actualizar posicion </button>";
echo "</form>";
}
if(isset($_POST['upload_position']) or isset($_POST['upload_position2'])){
$user = $_POST['user'];
$id_c = $_POST['client'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud']; 
if($latitud==''){$latitud=0;}
if($longitud==''){$longitud=0;}
    $fp = fopen("../Temp/$user.php","w");
    fputs($fp, "<?php \n");
    fputs($fp, "$"."lat = $latitud; \n");
    fputs($fp, "$"."long = $longitud; \n");
    fputs($fp, "?> \n");
    fclose($fp);
    require "../Temp/$user.php";
    echo "<div>";
    echo "<p> Usuario: $user </p>";
    echo " <p> Cliente: $id_c </p>";
    echo "<p> Latitud: $lat </p>";
    echo "<p> Longitud: $long </p>";
    echo "<a href='secciones.php?seccion=guardar_ubicacion&id_c=$id_c'> Guardar ubicacion </a>";
    echo "</div>";
    echo "<div>";
    echo "<a href='../index2.php'> Regresar </a>";
    echo "</div>";
}
    ?>