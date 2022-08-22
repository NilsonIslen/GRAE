<?php
session_start();
$UsuarioS = $_SESSION['usuario'];
$ClaveS = $_SESSION['clave'];
$id_us_s = $_SESSION['id_us'];
require "../html/head2.html";
include "../dbRepAGD.php";
if(isset($_GET['seccion'])){
    $seccion=$_GET['seccion'];


if($seccion == 'nuevoCliente'){
    require "../html/form_city.html";
}

if($seccion == "nuevoUsuario"){
    include "../Forms/nuevoUsuario.php";
    exit();
}

if($seccion == "record_visit"){
        $id_client = $_GET['client'];
        if($queryUsers -> rowCount() > 0){
        foreach($resultsUsers as $result) {
        include "../Class/user.php";
        if($queryClients -> rowCount() > 0){
        foreach($resultsClients as $result) {
        include "../Class/client.php";
        if($id_client==$IdCli && $IdVendedor<>0 && $customer<>0){
            echo "<div>";
            echo "<p> Lo sentimos, este Cliente lo acaba de seleccionar otro usuario";
            echo "Pero no te preocupes, hay mas opciones disponibles </p>";
            echo "<a href='../index2.php'> Regresar </a>";
            echo "</div>";
        }
       if($id_us_s==$id_us && $id_client==$IdCli && $customer==0 && $IdVendedor==0){
            $query = "UPDATE users SET customer='$id_client' WHERE id_us=$id_us_s";
            $result=$connect->query($query);
            $query2 = "UPDATE clients SET IdVendedor='$id_us_s' WHERE IdCli=$id_client";
            $result2=$connect->query($query2);
            include "../Listas/prot.php";
         }}}}}}

if($seccion=='listar_clientes'){
    require "../html/form_rutas.html";
}

    if($seccion == 'listarRepartidores'){
        echo "<a href='../index2.php'> Regresar </a>";
        echo "<table align='center'>";
        echo "<tr align='center'>";
        echo "<td> ID </td> <td> Repartidor </td> <td> Email </td> <td> Telefono </td>  <td> profile </td> <td> Cliente actual </td> <td> AM400g5 </td> <td> AM550g5 </td> <td> AM700g10 </td> <td> AM800g20 </td><td> Masax1k </td><td> Ruta </td>";
        echo "</tr>";
    if($queryUsers -> rowCount() > 0){
    foreach($resultsUsers as $result) {
    include "../Class/user.php";
    echo "<tr align='center'>";
                echo "<td> $id_us </td> <td> $name_us </td> <td> $email_us </td> <td> $tel_us </td> <td> $profile </td> <td> $customer </td> <td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $OAM400g5 </a> </td> <td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $OAM550g5 </a> </td> <td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $OAM700g10 </a> </td> <td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $OAM800g20 </a> </td> <td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $o_masax1k </a> </td><td> <a href='secciones.php?usuario=$id_us&seccion=despacho'> $RutaV </a> </td>";
    echo "</tr>";
}}
            echo "</table>";
            echo "<a href='../index2.php'> Regresar </a>";
            exit();
        }


        if($seccion=='HDespachos'){
             echo "<div>";
             echo "<a href='../index2.php'> Regresar </a>";
             echo "<form action='posts.php' method='POST'>";
             echo "<p> Historial de despachos :</p>";
             echo "<input type='hidden' name='usuario' Value='$UsuarioS'>";
             echo "<input type='hidden' name='clave' Value='$ClaveS'>";
             echo "<p> <input type='Text' name='Fecha' placeholder='Fecha (DD-MM-AAAA)'> </p>";
             echo "<p> <input type='Text' name='Responsable' placeholder='Responsable'> </p>";
             echo "<p> <input type='Text' name='Vendedor' placeholder='Vendedor'> </p>";
             echo "<p><button type='submit' name='HDespachos'> Consultar Historial </button> </p>";
             echo "</form>";
             echo "<a href='../index2.php'> Regresar </a>";
                echo "</div>";
                exit();
            }

            if($seccion == 'despacho'){
                $id_rep=$_GET['usuario'];
                echo "<Div>";
                echo "<h2> Despachar repartidor id: $id_rep </h2>";
                include "../Forms/despacho.php";
                echo "<a href='secciones.php?seccion=listarRepartidores'> Regresar </a>";
                echo "</Div>";
                exit();
            }

            if($seccion=='Pedidos'){
                $IdCli=$_GET['client'];
                echo "<Div>";
                echo "<h2> Pedido de cliente id: $IdCli </h2>";
                 echo "<form action='posts.php' method='POST'>";
                 echo "<input type='hidden' name='Responsable' Value='$id_us_s'>";
                 echo "<input type='hidden' name='IdCli' Value='$IdCli'>";
                 echo "<p> <input type='textarea' name='detalles' placeholder='Detalles'> </p>";
                 echo "<p><button type='submit' name='Pedido'> Registrar pedido </button> </p>";
                 echo "</form>";
                   echo "<a href='../index2.php'> Regresar </a>";
                    echo "<p> <a href='sesion.php'> Cerrar sesion </a></p>";
                    echo "</Div>";
                    exit();
                }
                if($seccion=='frecuencia_visita'){
                    $IdCli=$_GET['client'];
                    echo "<Div>";
                    echo "<h2> frecuencia de visita cliente id: $IdCli </h2>";
                     echo "<form action='posts.php' method='POST'>";
                     echo "<input type='hidden' name='IdCli' Value='$IdCli'>";
                     echo "<p> <input type='number' name='fdias' placeholder='dias' required> </p>";
                     echo "<p><button type='submit' name='frecuencia_visita'> Cambiar Frecuencia </button> </p>";
                     echo "</form>";
                        echo "<a href='../index2.php'> Regresar </a>";
                        echo "<p> <a href='sesion.php'> Cerrar sesion </a></p>";
                        echo "</Div>";
                        exit();
                    }

                    if($seccion=='HVentas'){
                        $UsuarioS=$_SESSION['usuario'];
                        $ClaveS=$_SESSION['clave'];
        
                         echo "<Div>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "<form action='posts.php' method='POST'>";
                         echo "<p> Historial de Ventas :</p>";
                         echo "<input type='hidden' name='usuario' Value='$UsuarioS'>";
                         echo "<input type='hidden' name='clave' Value='$ClaveS'>";
                         echo "<input type='Text' name='FechaHV' placeholder='Fecha (DD-MM-AAAA)'>";
                         echo "<input type='Text' name='VendedorV' placeholder='Vendedor'>";
                         echo "<input type='Text' name='ClienteV' placeholder='Cliente'>";
                         echo "<button type='submit' name='HVentas'> Consultar </button>";
                         echo "</form>";
                         echo "<a href='../index2.php'> Regresar </a>";
                         echo "</Div>";
                            exit();
                        }

                        if($seccion=='cancelar_visita'){
                            $id_client=$_GET['client'];
                             if($queryUsers -> rowCount() > 0){
                             foreach($resultsUsers as $result) {
                             include "../Class/user.php";   
                                         $query ="UPDATE users SET customer=0 WHERE name_us='$UsuarioS'";
                                         $result=$connect->query($query);
                                     }}
                             if($queryClients -> rowCount() > 0){
                             foreach($resultsClients as $result) {
                             include "../Class/client.php";                    
                                         $query = "UPDATE clients SET IdVendedor=0 WHERE IdCli=$id_client";
                                         $result=$connect->query($query);
                                      }}
                     }

                     if($seccion=='guardar_ubicacion'){
                        $id_client=$_GET['id_c'];
                        require "../Temp/$UsuarioS.php";
                         if($queryUsers -> rowCount() > 0){
                         if($queryClients -> rowCount() > 0){
                         foreach($resultsClients as $result) {
                         include "../Class/client.php";                    
                                     $query = "UPDATE clients SET latitud=$lat, longitud=$long WHERE IdCli=$id_client";
                                     $result=$connect->query($query);
                        
                        }}}
                        echo "<div>";
                        echo "<p'> Ubicacion guardada exitosamente </p>";
                        echo "</div>";
                        }
}
echo "<div>";
echo "<a href='../index2.php'> Continuar </a>";
echo "</div>";
?>