<?php
	include('connessionedb.php');
	session_destroy();
	header('Location: ../index.php');
?>