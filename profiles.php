<?php
$opens_list="<ul>";
$new_product="<li><a id='a_menu' href='php/secciones.php?usuario=$id_us&seccion=new_product'> Nuevo producto </a></li>";
$new_client="<li><a id='a_menu' href='php/secciones.php?usuario=$id_us&seccion=nuevoCliente'> Nuevo Cliente </a></li>";
$list_clients="<li><a id='a_menu' href='php/secciones.php?usuario=$id_us&seccion=listar_clientes'> Listar Clientes </a></li>";
$list_delivery_men="<li><a id='a_menu' href='php/secciones.php?usuario=$id_us&seccion=listarRepartidores'> Listar Repartidores </a></li>";
$sales_history="<li><a id='a_menu' href='php/secciones.php?usuario=$id_us&seccion=HVentas'> Historial de ventas </a></li>";
$close_session="<li><a id='a_menu' href='sesion.php'> Cerrar Sesion </a></li>";  
$closes_list="</ul>";

function admin($opens_list,$new_product,$new_client,$list_clients,$list_delivery_men,$sales_history,$close_session,$closes_list)
{
echo $opens_list;
echo $new_product;
echo $new_client;
echo $list_clients;
echo $list_delivery_men;
echo $sales_history;
echo $close_session;
echo $closes_list;
}

function rep($opens_list,$new_client,$close_session,$closes_list)
{
echo $opens_list;
echo $new_client;
echo $close_session;
echo $closes_list;
}

?>