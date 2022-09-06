 <?php
session_start();
require "../html/head2.html";
if(isset($_GET['user'])){
$UsuarioS = $_GET['user'];
echo "<form action='../php/position.php' method='POST'>";
echo "<input type='hidden' name='user' value='$UsuarioS'>"; 
echo "<input class='latitud' type='hidden' name='latitud' value=''>";
echo "<input class='longitud' type='hidden' name='longitud' value=''>";
echo "<button type='submit' name='upload_position'> Actualizar posicion </button>";
echo "</form>";
}
if(isset($_POST['upload_position'])){
$UsuarioS = $_POST['user'];
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
    echo "<p> Posicion actualizada </p>";
    echo "<p> Por favor observe si el cliente que aparece corresponde a su ubicacion  </p>";
    echo "<a href='../index2.php'> Aceptar </a>";
    echo "</div>";
}
    ?>