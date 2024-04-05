<?php
session_start();
if(isset($_SESSION['logged'])) {
	$logged = $_SESSION['logged'];
	if($logged == 1) {
		header('Location: /main/');
	}
}
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<!-- <link rel="icon" href="favicon.png"> -->
		<title>Logowanie</title>
		
		
		<!-- Podłączenie wszystkich skryptów -->
		<script src="jquery.js"></script>
		<script src="game.js"></script>
		<script src="index.js"></script>

		<!-- Podłączenie stylów -->
		<link rel="stylesheet" type="text/CSS" href="game.css"/>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<!-- Wbór formy logowania różnymi metodami pobierania z formularza -->
		

	<div id="login-div">
		<h1>Logowanie</h1>
		<div class="select-div">
			<form>
				<select id="selectedType">
					<option hidden disabled selected>--Wybierz typ logowania--</option>
					<option value="POST">POST</option>	<!-- Metoda POST - najlepsza do użycia podczas logowania -->
					<option value="GET">GET</option>	<!-- Metoda GET - mniej bezpieczna podczas logowania -->
				</select>
			</form>
		</div>


		<form action="login.php" id="post" method="post">
			<input class="login" type="text" name="user" placeholder="Nazwa użytkownika" required="required" />
			<input class="password" type="password" name="pass" placeholder="Hasło" required="required" />
			<button type="button" id="buttonp" class="btn btn-primary btn-block btn-large">Zaloguj</button>
			<button type="submit" id="logp" class="btn btn-primary btn-block btn-large logging">Zaloguj</button>
		</form>
		<form action="login.php" id="get" method="get">
			<input class="login" type="text" name="user" placeholder="Nazwa użytkownika" required="required" />
			<input class="password" type="password" name="pass" placeholder="Hasło" required="required" />
			<button type="button" id="buttong" class="btn btn-primary btn-block btn-large">Zaloguj</button>
			<button type="submit" id="logg" class="btn btn-primary btn-block btn-large logging">Zaloguj</button>
		</form>
	</div>

		<!-- Gra -->
			<div id="borders">
				<div id="finish"></div>
				<div id="player"></div>
				<div id="enemy1"></div>
				<div id="enemy2"></div>
				<div id="enemy3"></div>
				<div id="enemy4"></div>
				<div id="enemy5"></div>
				<div id="enemy6"></div>
				<p id="deathCounter"> Licznik śmierci nie chce się załadować</p>
			</div>



	</body>
</html>