<?php
header('Content-Type: text/html; charset=utf-8');

if (isset($_POST["email_address"])) { 
	ini_set('auto_detect_line_endings',true);
	$text = file_get_contents("submits.ini");
	if($text ==="") {
		$text = $text.$_POST['email_address'];
	} else {
		$text = $text.";".$_POST['email_address'];
	}
	file_put_contents("submits.ini",$text);
}
header("Location: /index.php");
?>