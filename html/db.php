<?php
//skrypt ktory loguje do bazy danych
$server = 'localhost';
$user = 'strona';
$pass = 'Asa123!@#';
$db = 'wydzial';

$con = mysqli_connect($server, $user, $pass, $db);

if(!$con) {
	die('blad bazy danych');
}
?>