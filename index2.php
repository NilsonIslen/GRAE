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
    <script src="./coordenadas.js" defer></script>
</head>
<body>
<?php
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
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
                include "profiles.php";
                echo "<h2> ¡ Bienvenido $UsuarioS ! </h2>";
                    if($profile=='admin'){
                      admin($opens_list,$new_product,$new_client,$list_clients,$list_delivery_men,$sales_history,$close_session,$closes_list);
                    }
                    if($profile=='rep'){
                        echo "<div>";
                        echo "<a href='https://www.google.com/maps/place/Manizales,+Caldas'> Maps </a>";
                        echo "<a href='php/position.php?user=$UsuarioS'> Actualizar posicion </a>";
                        echo "</div>";
                        rep($opens_list,$new_client,$close_session,$closes_list);
                        }
                        require "php/clients_to_visit.php";
                    }}}         
?>
</body>
</html>