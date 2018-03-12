<?php
	include('connessionedb.php');
	if(isset($_SESSION['carrello'])) {
		$item_array_nome=array_column($_SESSION['carrello'], 'nome');
		if(!in_array(str_replace("_", " ", $_GET['nome']), $item_array_nome)) {
			$count = count($_SESSION['carrello']);
			$item_array = array(
			'nome'	=> str_replace("_", " ", $_GET['nome']),
			'prezzo'=> $_GET['prezzo'],
			'quantita'=> 1,
			'pizzeria'=> $_GET['id']
			);
			$_SESSION['carrello'][$count]=$item_array;
			$id=$_GET['id'];
			header('Location: ../index.php?p=menu&&id='.$id);
		}
		else {
			$id=$_GET['id'];
			$a='0';
			while($_SESSION['carrello'][$a]['nome']!=str_replace("_", " ", $_GET['nome']))
				$a++;
			$_SESSION['carrello'][$a]['quantita']+=1;
			header('Location: ../index.php?p=menu&&id='.$id);
		}
	}
	else {
		$item_array = array(
			'nome'	=> str_replace("_", " ", $_GET['nome']),
			'prezzo'=> $_GET['prezzo'],
			'quantita'=> 1,
			'pizzeria'=> $_GET['id']
		);
		$_SESSION['carrello'][0] = $item_array;
		$id=$_GET['id'];
		header('Location: ../index.php?p=menu&&id='.$id);
	}
?>