<?php
require "../html/head2.html";
if(isset($_GET['seccion'])){
$seccion=$_GET['seccion'];
if($seccion == "recuperarClave"){
        include "../Forms/recClave.php";
        exit();
    }
}
?>