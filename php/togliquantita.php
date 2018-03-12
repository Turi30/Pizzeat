<?php
	include('connessionedb.php');
	$a='0';
	$id=$_GET['id'];
	while($_SESSION['carrello'][$a]['nome']!=$_GET['nome'])
		$a++;
	if($_SESSION['carrello'][$a]['quantita']>1)
		$_SESSION['carrello'][$a]['quantita']-=1;
	else
		array_splice($_SESSION['carrello'], $a, 1);
	header('Location: ../index.php?p=menu&&id='.$id);
?>