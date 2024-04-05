<?php
session_start();
//sprawdza czy uzytkownik jest zalogowany
require $_SERVER['DOCUMENT_ROOT'] . '/loginCheck.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="rap-style.css">
	<link rel="stylesheet" href="../style.css">
	<title>Zgłoszenie</title>
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
		<a href="/../">Powrót</a>
	</div>

	<div id="rep-div">
		<h1>Wypełnij raport</h1>
		<form action="zgloszenie.php" method="POST">
			<!-- <input class="rap" name="nazwa" type="text" maxlength="20">
			<input class="rap" name="opis" type="textarea" maxlength="200">
			<input type="submit" value="Wyślij raport"> -->

			<input class="login" type="text" name="nazwa" maxlength="20" placeholder="Tytuł zdarzenia"/>
			<textarea name="opis" id="area" cols="37" rows="15" maxlength="200"></textarea>
			<input id="ok" type="submit" class="btn btn-primary btn-block btn-large" value="Wyślij raport">
		</form>
	</div>
</body>
</html>