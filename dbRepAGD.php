<?php

define('DB_HOST','localhost:3306');
define('DB_USER','elgranod_Nilson');
define('DB_PASS','AGD2516agd.');
define('DB_NAME','elgranod_repartoagd');
// establecemos la conexión.
try
{
// Ejecutamos las variables y aplicamos UTF8
$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

$sql_products= "SELECT * FROM products"; 
$query_products = $connect -> prepare($sql_products); 
$query_products -> execute(); 
$results_products = $query_products -> fetchAll(PDO::FETCH_OBJ);

$sqlUsers= "SELECT * FROM users"; 
$queryUsers = $connect -> prepare($sqlUsers); 
$queryUsers -> execute(); 
$resultsUsers = $queryUsers -> fetchAll(PDO::FETCH_OBJ); 

$sqlClients = "SELECT * FROM clients"; 
$queryClients = $connect -> prepare($sqlClients); 
$queryClients -> execute(); 
$resultsClients = $queryClients -> fetchAll(PDO::FETCH_OBJ);
            
$sql_vent = "SELECT * FROM ventas2022"; 
$query_vent = $connect -> prepare($sql_vent); 
$query_vent -> execute(); 
$results_vent = $query_vent -> fetchAll(PDO::FETCH_OBJ);
















?>