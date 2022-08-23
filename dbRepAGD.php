<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
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

$sqlDel= "SELECT * FROM deliveries2022"; 
$queryDel = $connect -> prepare($sqlDel); 
$queryDel -> execute(); 
$resultsDel = $queryDel -> fetchAll(PDO::FETCH_OBJ); 
            
$sqlVent = "SELECT * FROM ventas2022"; 
$queryVent = $connect -> prepare($sqlVent); 
$queryVent -> execute(); 
$resultsVent = $queryVent -> fetchAll(PDO::FETCH_OBJ);
















?>