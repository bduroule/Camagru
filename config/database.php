<?php
$DB_USER = 'user';
$DB_PASSORD = 'user';

if (stristr($_SERVER['REQUEST_URI'], '/config/setup.php')){
	$DB_DSN = "mysql:host=".$_SERVER['SERVER_NAME'];
}
else
	$DB_DSN = "mysql:host=".$_SERVER['SERVER_NAME'].";dbname=camagru";
	

try {
	$bdd = new PDO($DB_DSN.';charset=utf8', $DB_USER, $DB_PASSORD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd->exec("SET NAMES 'UTF8'");
}
catch (Exception $e) {
	//require_once "setup.php";
	die('Erreur : ' . $e->getMessage());
}
?>
