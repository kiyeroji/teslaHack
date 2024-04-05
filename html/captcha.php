<?php
//skrypt ktory generuje kod na captche
//if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest') {
	$kod = md5(date("YmjHi"));
	$data = array('kod' => $kod);

	echo json_encode($data);
//}
?>