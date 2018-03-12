<?php
	include("connessionedb.php");
	if(isset($_POST['invia'])) {
		$citta = isset($_POST['città']) ? mysql_escape_string(replace_special_character($_POST['città'])) : false;
		header("Location: ../index.php?p=pizzerie&id=".$citta);
	}
?>