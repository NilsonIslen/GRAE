<?php
session_start();
require "../html/head2.html";
$ciudad=$_POST['ciudad'];
$Al = rand(1,4);
$NumColor = "Color$Al";
echo "<form action='../php/new_client.php' method='POST'>";
echo "<input type='hidden' name='NumAl' Value='$Al'>";
?>
        <input type='text' name='Cliente' placeholder='Nombre del cliente o negocio' required>
        <input type='text' name='document' placeholder='cedula o nit'>
        <?php
         include "../arrays/$ciudad.php";
         echo "<p> Barrio:</p>";
         echo "<select name='Barrio'>";
         $Br = 1;
         while($Br <= $cant_neighb){
            $Barr = $Br++; 
            $Barrios = $Barrs[$Barr]; 
           echo "<option value='$Barrios'> $Barrios </option>";
         }
         echo "</select>";
        ?>
                 <input type='text' name='Direccion' placeholder='Direccion'required>
                 <input type='text' name='Telefono' placeholder='Telefono'required>
                 <input type='email' name='email' placeholder='Correo electronico'>
                 <input type='number' name='frequency' placeholder='Frecuencia de visita' min='1' max='30' required>
                 <input type='number' name='Ruta' placeholder='Ruta' min='1' max='50' required>
                 <?php echo "<select id='Sel$NumColor' name='Color'>"; ?>
                 <option value=0> De que color es esta casilla? </option>
                 <option value=1> Amarillo </option>
                 <option value=2> Azul </option>
                 <option value=3> Rojo </option>
                 <option value=4> Verde </option>
                 </select>
                 <button type='submit' name='nuevoCliente'> Registrar nuevo cliente </button>
                 <a href="../index2.php">Regresar</a>
        </form>
