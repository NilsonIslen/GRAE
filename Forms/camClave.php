<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Stl.css" rel="stylesheet" type="text/css">
    <title> Registro de nuevo usuario </title>
</head>
<body>
    
        <form action='posts_out.php' method='POST'>
        <?php
        echo"<input type='hidden' name='Email' value='$Email'>";
        ?>
        <input type='text' name='Codigo' placeholder='Codigo' required>
        <input type='text' name='Clave' placeholder='Nueva Clave' required>
        <input type='text' name='ConfClave' placeholder='Confirmar Nueva Clave' required>
        <button type='submit' name='camClave'> Actualizar contraseña </button>
        </form>
        <a href='../index.php'> Regresar </a>
        


</body>
</html>
