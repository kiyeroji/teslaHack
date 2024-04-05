<?php
//skrypt sprawdzajacy czy uzytkownik jest zalogowany pomocna zmienna $logged
if(isset($_SESSION['logged'])) {
	if($_SESSION['logged'] != 1) {
		die('nie jestes zalogowany');
	}
}
else {
	die('nie jestes zalogowany');
}
?>