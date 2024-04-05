<?php
//skrypt sprawdzajacy czy uzytkownik jest adminem przez pomocnicza zmienna admin
if(isset($_SESSION['admin'])) {
	if(!($admin == 1 )) {
		die('nie masz uprawnien');
	}
}
else {
	die('nie masz uprawnien');
}
?>