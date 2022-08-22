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
                echo "<table>";
                echo "<tr>";
                echo "<td colspan='5'><p> ¡ Bienvenido $UsuarioS ! </p></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> <p> AM400g5 </p></td><td> <p> AM550g5 </p> </td><td> <p> AM700g10 </p> </td><td> <p> AM800g20 </p> </td><td> <p> Masax1k </p> </td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> <p> $OAM400g5 </p> </td><td> <p> $OAM550g5 </p> </td><td> <p> $OAM700g10 </p> </td><td> <p> $OAM800g20 </p> </td> <td> <p> $o_masax1k </p> </td>";
                echo "</tr>";
                echo "</table>";
                    if($profile=='admin'){
                        admin($opens_list,$new_client,$list_clients,$list_delivery_men,$dispatch_history,$sales_history,$close_session,$closes_list);
                        }
                    if($profile=='rep'){
                echo "<form action='php/position.php' method='POST'>";
                echo "<input type='hidden' name='user' value='$UsuarioS'>"; 
                echo "<input class='latitud' type='hidden' name='latitud' value=''>";
                echo "<input class='longitud' type='hidden' name='longitud' value=''>";
                echo "<button type='submit' name='upload_position'> Actualizar posicion </button>";
                echo "</form>";
                        rep($opens_list,$new_client,$close_session,$closes_list);
                        }
                        require "php/clients_to_visit.php";
                    }}}         


?>
</body>
</html>