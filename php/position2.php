 <?php
session_start();
require "../html/head2.html";
if(isset($_POST['upload_position2'])){
$UsuarioS = $_POST['user'];
$id_c = $_POST['client'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud']; 
if($latitud==''){$latitud=0;}
if($longitud==''){$longitud=0;}
    $fp = fopen("../Temp/$UsuarioS.php","w");
    fputs($fp, "<?php \n");
    fputs($fp, "$"."lat = $latitud; \n");
    fputs($fp, "$"."long = $longitud; \n");
    fputs($fp, "?> \n");
    fclose($fp);
    echo "<div>";
    echo "<a href='secciones.php?seccion=guardar_ubicacion&id_c=$id_c'> Guardar ubicacion </a>";
    echo "</div>";
    echo "<div>";
    echo "<a href='../index2.php'> Regresar </a>";
    echo "</div>";
}
    ?>