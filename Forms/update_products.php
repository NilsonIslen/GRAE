<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update products </title>
</head>
<body>
        <form action='posts.php' method='POST'>
        <?php
        echo "<input type='hidden' name='usuario' value='$UsuarioS'>";
        echo "<input type='hidden' name='clave' value='$ClaveS'>";
        echo "<input type='hidden' name='id_product' value='$id_product'>";
        ?>
        <input type='number' name='weight' placeholder='Peso'  required>
        <input type='number' name='price' placeholder='Precio' required>
        <p> Segmento de mercado: </p>
        <select name='segment' >"; ?>
        <option value='final'> Cliente final </option>
        <option value='stores'> Tiendas </option>
        <option value='dealers'> Distribuidores </option>
        </select>
        <button type='submit' name='update_products'> Actualizar </button>
        </form>
</body>
</html>