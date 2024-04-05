<?php
//skrypt do przesylania zgloszen do bazy danych
session_start();
//sprawdza czy uzytkownik jest zalogowany
require $_SERVER['DOCUMENT_ROOT'] . '/loginCheck.php';

if(isset($_POST['nazwa']) && isset($_POST['opis'])) {
	$nazwa = $_POST['nazwa'];
	$data = date('Y/m/j H:i:s');
	$opis = $_POST['opis'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$uzytkownik = $_SESSION['user'];

	//sprawdza czy dlugosc tekstu z pol jest poprawna (mniejsza niz 20 dla $nazwa i <200 dla $opis)
	if(strlen($nazwa) > 20 || strlen($opis) > 200) {
		die('za dluga nazwa lub opis');
	}

	//logowanie do bazy danych
	if(!require $_SERVER['DOCUMENT_ROOT'] . '/db.php') {
		die('blad bazy');
	}

	$qry = "INSERT INTO raporty (nazwa, data, opis, ip, uzytkownik) VALUES ('$nazwa', '$data', '$opis', '$ip', '$uzytkownik')";

	if(!mysqli_query($con, $qry)) {
		die('blad bazy');
	}

	header('Location: .');
}
else {
	die('nie ustawione');
}
?>