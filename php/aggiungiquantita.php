<?php
	include('connessionedb.php');
	$a='0';
	$id=$_GET['id'];
	while($_SESSION['carrello'][$a]['nome']!=$_GET['nome'])
		$a++;
	$_SESSION['carrello'][$a]['quantita']+=1;
	header('Location: ../index.php?p=menu&&id='.$id);
?>