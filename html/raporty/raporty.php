<?php
//skrypt do wyswietlania wszystkich raportow z bazy danych
//sprawdza czy uzytkownik jest zalogowany
require $_SERVER['DOCUMENT_ROOT'] . '/loginCheck.php';
$admin = $_SESSION['admin'];

//sprawdza czy uzytwkonik jest adminem
require $_SERVER['DOCUMENT_ROOT'] . '/adminCheck.php';

if(!require $_SERVER['DOCUMENT_ROOT'] . '/db.php') {
	die('blad bazy');
}

$typ = filter_input(INPUT_GET, 'typ', FILTER_SANITIZE_STRING);
//array z kolumnami do SELECT
$kolumny = array("id", "nazwa", "opis", "data", "ip", "uzytkownik");
$kolumny2 = implode(",", $kolumny);

if($typ && isset($_GET['szukaj'])) {
	//array z dozwolonymi typami
	$typy = array("id", "nazwa", "opis", "data", "ip", "uzytkownik");
	if(!(in_array($typ, $typy))) {
		die('zly typ');
	}

	$szukaj = $_GET['szukaj'];

	//kwerenda z filter do wyszukiwania
	$qry = 'SELECT ' . $kolumny2 . ' FROM raporty WHERE ' . $typ . ' LIKE \'%' . $szukaj . '%\'';
}
else {
	$qry = 'SELECT ' . $kolumny2 . ' FROM raporty';
}

$res = mysqli_query($con, $qry);
$rows = mysqli_fetch_all($res, MYSQLI_ASSOC);

//tworzy tabele
echo '<table><tr>';
foreach($kolumny as $kolumna) {
	echo '<th>' . $kolumna . '</th>';
}
echo '</tr><tr>';
foreach($rows as $row) {
	foreach($row as $i) {
		echo '<td>' . htmlspecialchars($i) . '</td>';
	}
	echo '</tr>';
}

echo '</table>'
?>