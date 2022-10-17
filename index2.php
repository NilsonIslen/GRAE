<?php
session_start();
?>
<html lang="es">
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Stl.css" rel="stylesheet" type="text/css">
    <link  rel="icon" href="Imgs/logo.png" type="image/png" />
    <title> Rutas AGD </title>
</head>
<body>
<?php
@$UsuarioS = $_SESSION['usuario'];
@$ClaveS = $_SESSION['clave'];
@$id_us_s = $_SESSION['id_us'];
$ClaveEnc=md5($ClaveS);
if($UsuarioS==''){
echo "<div>";
echo "Tu session ha caducado,";
echo "Por favor inicia sesion nuevamente para continuar.";
echo "<a href='index.php'> Ir a inicio de sesion </a>";
echo "</div>";
exit();
}
$Fecha = date('d-m-Y');
$fecha_actual=strtotime("$Fecha");
    include "dbRepAGD.php";
    if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result){
        include "Class/user.php";
    if($UsuarioS==$name_us&&$ClaveEnc==$key_us){        
                echo "<div class='div-ini'>";
                echo "<h2> ¡ Bienvenido $UsuarioS ! </h2>";
                    if($profile=='admin'){
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=new_product'> Nuevo producto </a>";
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=nuevoCliente'> Nuevo Cliente </a>";
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=list_products'> Listar Productos </a>";
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=listar_clientes'> Listar Clientes </a>";
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=listarRepartidores'> Listar Repartidores </a>";
                      echo "<a href='php/secciones.php?usuario=$id_us&seccion=reports'> Informes </a>";
                      echo "<a href='sesion.php'> Cerrar sesion </a>";
                      echo "</div>";
                    }
                    if($profile=='rep'){
                        echo "<a href='php/secciones.php?usuario=$id_us&seccion=nuevoCliente'> Nuevo Cliente </a>";
                        echo "<a href='sesion.php'> Cerrar Sesion </a>";
                        echo "</div>";
                        }
                        require "php/clients_to_visit.php";
                        if($profile=="admin"){
                            echo "<div>";
                            echo "<p> <b> Faltan $clientspv2 clientes por visitar </b> </p>";}
                            echo "</div>";
                    }}}         
?>
</body>
</html>