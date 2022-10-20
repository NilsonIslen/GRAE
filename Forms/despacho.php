<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Despacho </title>
</head>
<body>
        <form action='posts.php' method='POST'>
        <?php
        echo "<input type='hidden' name='usuario' value='$UsuarioS'>";
        echo "<input type='hidden' name='clave' value='$ClaveS'>";
        echo "<input type='hidden' name='IdVendedor' value='$id_rep'>";
        ?>
        <input type='number' name='tel' placeholder='Telefono'>
        <select name='profile'>
                <option value=''> </option>
                <option value='admin'> Administrador </option>
                <option value='rep'> Repartidor </option>
                </select>
        <input type='number' name='Ruta' placeholder='Ruta' min='0' max='4'>
        <button type='submit' name='update'> Actualizar </button>
        </form>
</body>
</html>