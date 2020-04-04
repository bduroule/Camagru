<?php
$host = '127.0.0.1';
$user = 'user';
$pass = 'user';
$dbname = 'camagru';
try {
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass);
}
catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
}
?>
