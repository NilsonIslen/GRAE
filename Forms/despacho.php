<form action='posts.php' method='POST'>
        <?php
        echo "<h2> Repartidor: $id_rep </h2>";
        echo "<input type='hidden' name='usuario' value='$UsuarioS'>";
        echo "<input type='hidden' name='clave' value='$ClaveS'>";
        echo "<input type='hidden' name='id_rep' value='$id_rep'>";
        ?>
        <input type='number' name='tel' placeholder='Telefono'>
        <select name='prof'>
                <option value='profile'> Perfil </option>
                <option value='rep'> Repartidor </option>
                <option value='admin'> Administrador </option>
                </select>
        <input type='number' name='ruta' placeholder='Ruta' min='0' max='30'>
        <button type='submit' name='update'> Actualizar </button>
</form>
