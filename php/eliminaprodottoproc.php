<?php
	include("connessionedb.php");
	if(isset($_POST['invia'])){
		$nome=mysql_escape_string(replace_special_character($_POST['pizzeria']));
		$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE NomePizzeria='$nome'");
		$dati=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
		$_SESSION['idp']=$dati['IDPizzeria'];
		$id=$_SESSION['idp'];
		header('Location: ../index.php?p=pannelloadmin&h=eliminaprodotto&id='.$id);
	}
	if(isset($_POST['inviac'])){
		$categoria=mysql_escape_string(replace_special_character($_POST['categoria']));
		$id=$_SESSION['idp'];
		$_SESSION['categoria']=$_POST['categoria'];
		header('Location: ../index.php?p=pannelloadmin&h=eliminaprodotto&idp='.$id.'&cat='.$categoria);
	}
	if(isset($_POST['elimina'])){
		$id=$_SESSION['idp'];
		$categoria=$_SESSION['categoria'];
		$nome=$_POST['prodotto'];
		unset($_SESSION['idp']);
		unset($_SESSION['categoria']);
		if(		mysqli_query($conn, "DELETE FROM menu WHERE Pizzeria='$id' AND Categoria='$categoria' AND Nome='$nome'"))
			
			header('Location: ../index.php?p=pannelloadmin&h=eliminaprodotto');
		else
			echo "".mysql_error();
	}
?>