<?php
session_start();
require "../html/head2.html";
if(isset($_POST['nuevoCliente'])){
    $UsuarioS=$_SESSION['usuario'];
    $ClaveS=$_SESSION['clave'];
    $NCliente=$_POST['Cliente'];
    $NBarrio=$_POST['Barrio'];
    $NDireccion=$_POST['Direccion'];
    $Nlatitud=0;
    $Nlongitud=0;
    $NTelefono = $_POST['Telefono'];
    $NColor=$_POST['Color'];
    $NumAl=$_POST['NumAl'];
    $NFrecuencia=1;
    $NVisita="date('d-m-Y');";
    $Nhour=date('H:i');
    $NDAM400g5=0;
    $NDAM550g5=0;
    $NDAM700g10=0;
    $NDAM800g20=0;
    $n_d_masax1k=0;
    $NIdVendedor=0;
    $NPedido='0';
    $Ruta=$_POST['Ruta'];;

    include "../dbRepAGD.php";

    if($queryClients -> rowCount() > 0){
    foreach($resultsClients as $result) {
    include "../Class/client.php";
        
        if($NCliente==$NameCli or $NDireccion==$Direccion or $NTelefono==$TelCli){
            echo "<p> Este Cliente ya existe en nuestro sistema </p>";

            include 'Forms/but_return.php';
            exit();
         } 
}}

if($NColor==$NumAl){

$sql="insert into clients(NameCli,Barrio,Direccion,latitud,longitud,TelCli,Frecuencia,Visita,hour,AM400g5,AM550g5,AM700g10,AM800g20,masax1k,IdVendedor,Pedido,Ruta) values(:NameCli,:Barrio,:Direccion,:latitud,:longitud,:TelCli,:Frecuencia,:Visita,:hour,:AM400g5,:AM550g5,:AM700g10,:AM800g20,:masax1k,:IdVendedor,:Pedido,:Ruta)";

$sql=$connect->prepare($sql);

$sql->bindParam(':NameCli',$NCliente,PDO::PARAM_STR, 25);
$sql->bindParam(':Barrio',$NBarrio,PDO::PARAM_STR, 25);
$sql->bindParam(':Direccion',$NDireccion,PDO::PARAM_STR,25);
$sql->bindParam(':latitud',$Nlatitud,PDO::PARAM_STR,25);
$sql->bindParam(':longitud',$Nlongitud,PDO::PARAM_STR,25);
$sql->bindParam(':TelCli',$NTelefono,PDO::PARAM_STR,25);
$sql->bindParam(':Frecuencia',$NFrecuencia,PDO::PARAM_STR,25);
$sql->bindParam(':Visita',$NVisita,PDO::PARAM_STR,25);
$sql->bindParam(':hour',$Nhour,PDO::PARAM_STR,25);
$sql->bindParam(':AM400g5',$NDAM400g5,PDO::PARAM_STR,25);
$sql->bindParam(':AM550g5',$NDAM550g5,PDO::PARAM_STR,25);
$sql->bindParam(':AM700g10',$NDAM700g10,PDO::PARAM_STR,25);
$sql->bindParam(':AM800g20',$NDAM800g20,PDO::PARAM_STR, 25);
$sql->bindParam(':masax1k',$n_d_masax1k,PDO::PARAM_STR, 25);
$sql->bindParam(':IdVendedor',$NIdVendedor,PDO::PARAM_STR,25);
$sql->bindParam(':Pedido',$NPedido,PDO::PARAM_STR, 25);
$sql->bindParam(':Ruta',$Ruta,PDO::PARAM_STR, 25);

$sql->execute();
$lastInsertId=$connect->lastInsertId();

echo "<div>";
echo "<p> Proceso exitoso, gracias por tu registro </p>";
echo "<a href='../index2.php'> Regresar </a>";
echo "</div>";

exit();
}}


if(isset($_GET['usuario'])&&isset($_GET['seccion']) or (isset($_GET['usuario'])&&isset($_GET['seccion'])&&isset($_GET['client']))){

$seccion = $_GET['seccion'];
$id_usuario = $_GET['usuario'];

    include "../dbRepAGD.php";

if($queryUsers -> rowCount() > 0){
    foreach($resultsUsers as $result) {

        $id_us=$result->id_us;
        
        if($id_us==$id_usuario){        

if($seccion == 'nuevoCliente'){
   include "../var_session.php";

$Al = rand(1,4);
$NumColor = "Color$Al";

echo "<div>";
echo "<a href='../index2.php'> Regresar </a>";
echo "</div>";
    
exit();
}}}}}
?>