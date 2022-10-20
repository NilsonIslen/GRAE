<?php
session_start();
require "../html/head2.html";
if(isset($_POST['nuevoCliente'])){
    $UsuarioS=$_SESSION['usuario'];
    $ClaveS=$_SESSION['clave'];
    $NCliente=$_POST['Cliente'];
    $document=$_POST['document'];
    $NBarrio=$_POST['Barrio'];
    $NDireccion=$_POST['Direccion'];
    $maps=0;
    $NTelefono = $_POST['Telefono'];
    $email=$_POST['email'];
    $NColor=$_POST['Color'];
    $NumAl=$_POST['NumAl'];
    $NVisita=date('d-m-Y');
    $Nhour=date('H:i');
    $Ruta=$_POST['Ruta'];
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
$sql="insert into clients(NameCli,document,Barrio,Direccion,maps,TelCli,email,Visita,hour,Ruta) values(:NameCli,:document,:Barrio,:Direccion,:maps,:TelCli,:email,:Visita,:hour,:Ruta)";
$sql=$connect->prepare($sql);
$sql->bindParam(':NameCli',$NCliente,PDO::PARAM_STR, 25);
$sql->bindParam(':document',$document,PDO::PARAM_STR, 25);
$sql->bindParam(':Barrio',$NBarrio,PDO::PARAM_STR, 25);
$sql->bindParam(':Direccion',$NDireccion,PDO::PARAM_STR,25);
$sql->bindParam(':maps',$maps,PDO::PARAM_STR,25);
$sql->bindParam(':TelCli',$NTelefono,PDO::PARAM_STR,25);
$sql->bindParam(':email',$email,PDO::PARAM_STR,25);
$sql->bindParam(':Visita',$NVisita,PDO::PARAM_STR,25);
$sql->bindParam(':hour',$Nhour,PDO::PARAM_STR,25);
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