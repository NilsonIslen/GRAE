<?php
require "../html/head2.html";
if(isset($_POST['recClave'])){
    $Email = $_POST['Email'];
    include "../arrays/letters.php";
    $LetA = rand(1,26);
    $LetterA = $Letter["$LetA"];
    $NumA = rand(00,99);
    $LetB = rand(1,26);
    $LetterB = $Letter["$LetB"];
    $NumB = rand(00,99);
    $Cod = "$LetterA$NumA$LetterB$NumB";
    $CodEnc = md5($Cod);
$fp = fopen("../Temp/$CodEnc.php","w");
fputs($fp, "<?php \n");
fputs($fp, "$"."Code = '$CodEnc'; \n");
fputs($fp, "?> \n");
fclose($fp);
$To = "$Email";
$Asunto =  "Solucitud cambio de contraseña Repartidores AGD";
$Contenido = "Para cambiar tu contraseña utiliza el codigo: $Cod \nArepas El Grano Dorado (AGD) \nhttps://elgranodorado.com";
mail($To, $Asunto, $Contenido);
echo "<div>";
echo "<p> Hemos enviado un codigo a tu correo para actualizar tu contraseña </p>";
echo "<p> Si no lo encuentras en la bandeja de entrada no olvides revisar en spam </p>";
include "../Forms/camClave.php";
echo "</div>";
    exit();
}

if(isset($_POST['camClave'])){
    $Email = $_POST['Email'];
    $Codigo = $_POST['Codigo'];
    $Clave = $_POST['Clave'];
    $ConfClave = $_POST['ConfClave'];
    $ClaveEnc= md5($Clave);
    $CodEnc= md5($Codigo);
    $Arc = "../Temp/$CodEnc.php";
    include "../Temp/$CodEnc.php";
    
    if(file_exists($Arc)){
        include "../Temp/$CodEnc.php";
        if($Code==$CodEnc && $Clave==$ConfClave){
        include "../dbRepAGD.php";
        if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result) {
        include "../Class/user.php";
                    if("$Email"=="$email_us"){
                     $query ="UPDATE users SET key_us='$ClaveEnc'
                     WHERE email_us='$Email'";
                    $result=$connect->query($query);
                }}}
        unlink($Arc);
echo "<div>";
echo "<p> La contraseña se ha actualizado correctamente. </p>";
echo "<p> Ahora puedes ingresar a la plataforma de repartos. </p>";
echo " <a href='../index2.php'> Ir a la pagina principal para iniciar sesion </a>";
echo "</div>";
exit();
        }
}else{
    echo "<div>";
    echo "<p> El codigo no es correcto o las claves no coinciden </p>";
    echo " <a href='../index.php'> Regresar </a>";
    echo "</div>";
exit();
}}  



?>