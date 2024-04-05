<?php
session_start();
//sprawdza czy uzytkownik jest zalogowany
require $_SERVER['DOCUMENT_ROOT'] . '/loginCheck.php';
$admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css">
	<!-- <link rel="icon" href="favicon.png"> -->
	<title>Strona Główna</title>
	</head>
	<body>

		<div class="acc">
			<div>	
				<p>Użytkownik: <?php echo $_SESSION['user']; ?></p>
			</div>
			<form action='/login.php' method="POST">
				<input class="out" name="logout" type="submit" value="Wyloguj">
			</form>
		</div>
	
		<div class="menu-bar">
			<a href="/zgloszenie/">Stworz raport</a>
			<?php
			//jezeli uztykownik jest adminem, wyswietl guzik raporty
			if($admin == 1) {
			echo "<a href='/raporty/'>Raporty</a>";
			} ?>
		</div>
		<h1 class="hh">Witryna do raportowania wypadków</h1>
		<p class="hh">Jest to strona stworzona przy użyciu HTML, CSS, JS, PHP i MariaDB</p>
	</body>
</html>