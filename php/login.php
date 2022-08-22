<?php
if(isset($_POST['Entrar'])){
    $UsuarioS = $_POST['usuario'];
    $clave = $_POST['clave'];
    $ClaveEnc=md5($clave);

    include "../dbRepAGD.php";
    if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result){
            include "../Class/user.php";
        if($UsuarioS==$name_us&&$ClaveEnc==$key_us){
            session_start();
            $_SESSION['usuario'] = $UsuarioS;
            $_SESSION['clave'] = $clave;
            $_SESSION['id_us'] = $id_us;
         header("Location:../index2.php");
         exit();
    }else{header("Location:../index.php");}
}}}
?>