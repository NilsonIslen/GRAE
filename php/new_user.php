<?php

if(isset($_POST['nuevoUsuario'])){
    include "../arrays/letters.php";
    $LetA = rand(1,26);
    $LetterA = $Letter["$LetA"];
    $NumA = rand(00,99);
    $LetB = rand(1,26);
    $LetterB = $Letter["$LetB"];
    $NumB = rand(00,99);
    $Cod = "$LetterA$NumA$LetterB$NumB";
    
    $NUsuario = $_POST['usuario'];
    $Email = $_POST['email'];
    $ConfEmail = $_POST['conf_email'];
    $NTelefono = $_POST['telefono'];
    $CodEnc = md5($Cod);
    $profile='rep';
    $customer=0;
    $AM400g5=0;
    $AM550g5=0;
    $AM700g10=0;
    $AM800g20=0;
    $masax1k=0;
    $Ruta=0;


    include "../dbRepAGD.php";
    $sql = "SELECT * FROM users"; 
    $query = $connect -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 
    
    if($query -> rowCount() > 0){
        foreach($results as $result) {

            $email_us=$result->email_us;
            
            if($Email==$email_us){
            echo "<p> El Correo ingresado ya existe en nuestro sistema </p>"; 
            echo "<p> Por favor intenta con otro o recupera la contraseña </p>";
               echo "<Div>";
               echo "<a href='secciones.php?seccion=nuevoUsuario'> Regresar </a>";
               echo "</Div>"; 
            exit();
             } 
    }}
    
    if($Email==$ConfEmail){
    $sql="insert into users(name_us,email_us,tel_us,key_us,profile,customer,AM400g5,AM550g5,AM700g10,AM800g20,masax1k,Ruta) values(:name_us,:email_us,:tel_us,:key_us,:profile,:customer,:AM400g5,:AM550g5,:AM700g10,:AM800g20,:masax1k,:Ruta)";

    $sql=$connect->prepare($sql);

    $sql->bindParam(':name_us',$NUsuario,PDO::PARAM_STR, 25);
    $sql->bindParam(':email_us',$Email,PDO::PARAM_STR, 25);
    $sql->bindParam(':tel_us',$NTelefono,PDO::PARAM_STR,25);
    $sql->bindParam(':key_us',$CodEnc,PDO::PARAM_STR,25);
    $sql->bindParam(':profile',$profile,PDO::PARAM_STR,25);
    $sql->bindParam(':customer',$customer,PDO::PARAM_STR,25);
    $sql->bindParam(':AM400g5',$AM400g5,PDO::PARAM_STR,25);
    $sql->bindParam(':AM550g5',$AM550g5,PDO::PARAM_STR,25);
    $sql->bindParam(':AM700g10',$AM700g10,PDO::PARAM_STR,25);
    $sql->bindParam(':AM800g20',$AM800g20,PDO::PARAM_STR);
    $sql->bindParam(':masax1k',$masax1k,PDO::PARAM_STR);
    $sql->bindParam(':Ruta',$Ruta,PDO::PARAM_STR);

    $sql->execute();
    $lastInsertId=$connect->lastInsertId();


$fp = fopen("../Temp/$CodEnc.php","w");
fputs($fp, "<?php \n");
fputs($fp, "$"."Code = '$CodEnc'; \n");
fputs($fp, "?> \n");
fclose($fp);


$To = "$Email";
$Asunto =  "Confirmar correo Repartidores AGD";
$Contenido = "Bienvenido $NUsuario \n
Para crear tu contraseña en elgranodorado.com/GRAP utiliza el codigo: $Cod \n
Gracias por tu apoyo, esperamos que tengas buenas experiencias.\n";
mail($To, $Asunto, $Contenido);

echo "<div>";
echo "<p> Por favor utiliza el codigo que enviamos al correo $Email  </p>";
echo "<p> para crear tu clave de acceso </p>";
echo "</div>";
include "../Forms/camClave.php";

exit();
    }else{
        echo "<p> Los dos correos ingresados deben ser iguales</p>";
        echo "<p> </p>";
        echo "<p> </p>";
        echo "<a href='index2.php?seccion=nuevoUsuario'> Intentar de nuevo </a>";
        exit();
    }

}

?>