<?php
session_start();
//sprawdza czy uzytkownik jest zalogowany
require $_SERVER['DOCUMENT_ROOT'] . '/loginCheck.php';
$admin = $_SESSION['admin'];

//sprawdza czy uzytwkonik jest adminem
require $_SERVER['DOCUMENT_ROOT'] . '/adminCheck.php';
?>

<!-- 			STRUKTURA STRONY			 -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raporty</title>
	<!-- podlaczanie plikow -->
	<!-- <link rel="icon" href="favicon.png"> -->
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="raporty.css">
</head>
<body>
	<form action="." method="GET">
		<div class="select-div"><input class="rep-btn" name="szukaj" type="search">
			<select name="typ">
				<option value="id">id</option>
				<option value="nazwa">nazwa</option>
				<option value="opis">opis</option>
				<option value="data">data</option>
				<option value="ip">ip</option>
				<option valiue="uzytykownik">uzytkownik</option>
			</select>
		</div>
		<input class="rep-btn" type="submit" value="Szukaj"><br>
		<a href=".">Reset</a><br><br>
	</form>
	<?php
	require 'raporty.php';
	?>
</body>
</html>