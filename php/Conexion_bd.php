<?php

session_start();

$dsn = 'mysql:dbname=bibliofacil;host=127.0.0.1';
$user = 'root';
$password = '';

try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);
    //echo 'Conexión Exitosa';

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}



