<?php
//skrypt logowania
session_start();
$metoda = $_SERVER['REQUEST_METHOD'];
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="style.css">
		<title>Logowanie</title>
	</head>
	<body>
	</body>
</html>

<?php
//jezeli jest zalogowany, przekieruj uzytkownika do /main
if(isset($_SESSION['user']) && isset($_SESSION['pass'])) {
	echo 'juz jestes zalogowany';
	header('Location: /main');
}

//jezeli pole login (guzik) jest ustawione to wyloguj
if(isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location: /");
}

//jezeli pola sa ustawione, ustaw variable pod odpowiednia metode
if(isset($_POST['user']) && isset($_POST['pass']) || isset($_GET['user']) && isset($_GET['pass']) || isset($_SESSION['user']) && isset($_SESSION['pass'])) {
	if(isset($_POST['user']) && isset($_POST['pass'])) {
		$username = $_POST['user'];
		$password = $_POST['pass'];
	}
	else {
		if(isset($_SESSION['user']) && isset($_SESSION['pass'])) {
			$username = $_SESSION['user'];
			$password = $_SESSION['pass'];
		}
		else {
		$username = $_GET['user'];
		$password = $_GET['pass'];
		}
	}

	//sprawdza czy kluczowy plik db.php istnieje i wdraza go do pliku
	if(!require 'db.php') {
		die('<h1>blad bazy</h1>');
	}

	//wynik kwerendy
	$res = mysqli_query($con, "SELECT pass,admin FROM login WHERE user = '$username'");

	//jezeli liczba rekord = 0 to wyswietl komunikat
	if(mysqli_num_rows($res) == 0) {
		die('<h1>nie znaleziono uzytkownika</h1>');
	}

	//ustaw variable rekord
	$row = mysqli_fetch_assoc($res);
	$password_db = $row['pass'];

	//porownanie hasla z bazy dancyh do wpisanego
	if(!password_verify($password, $password_db)) {
		die('<h1>zle haslo</h1>');
	}
	else {
	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
	//czy uztykownik jest adminem, boolean
	$_SESSION['admin'] = $row['admin'];
	//pomocniczy variable czy jest zalogowany
	$_SESSION['logged'] = 1;

	echo '<h1>Zostałeś zalogowany ale...</h1>';
	if($metoda == 'GET') {
		echo '<p> Wykorzystałeś/aś bardzo niebezpieczną metodę logowania... GET <br> Spójrz na pasek adresu... jest tam wypisane hasło, łatwe do przejęcia.</p>' . '<br><br><a class="next" href="/main">Rozumiem ryzyko!</a>';
	}
	else {
		header('Location: /main/');
	}
	}

}
else {
	die('<h1>brak ustawionych pol</h1>');
}
?>