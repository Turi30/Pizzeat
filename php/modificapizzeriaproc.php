<?php
	include("connessionedb.php");
	if(isset($_POST['invia'])){
		$nome=mysql_escape_string(replace_special_character($_POST['pizzeria']));
		$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE NomePizzeria='$nome'");
		$dati=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
		$_SESSION['idp']=$dati['IDPizzeria'];
		$id=$_SESSION['idp'];
		header('Location: ../index.php?p=pannelloadmin&h=modificapizzeria&id='.$id);
	}
	if(isset($_POST['modifica'])){
		$nome = isset($_POST['nome']) ? mysql_escape_string(replace_special_character($_POST['nome'])) : false;
		$logo = isset($_POST['logo']) ? mysql_escape_string(replace_special_character($_POST['logo'])) : false;
		$telefono = isset($_POST['telefono']) ? ($_POST['telefono']) : false;
		$indirizzo = isset($_POST['indirizzo']) ? mysql_escape_string(replace_special_character($_POST['indirizzo'])) : false;
		$costoconsegna = isset($_POST['costoconsegna']) ? ($_POST['costoconsegna']) : false;
		$minimoconsegna = isset($_POST['minimoconsegna']) ? ($_POST['minimoconsegna']) : false;
		$oraapertura = isset($_POST['oraapertura']) ? ($_POST['oraapertura']) : false;
		$orachiusura = isset($_POST['orachiusura']) ? ($_POST['orachiusura']) : false;
		$citta = isset($_POST['citta']) ? mysql_escape_string(replace_special_character($_POST['citta'])) : false;
		$id=$_SESSION['idp'];
		unset($_SESSION['idp']);
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pizzeria WHERE NomePizzeria LIKE '$nome' AND Citta LIKE '$citta' AND IDPizzeria <>".$id)) > 0) {
			header('Location: ../index.php?p=pannelloadmin&h=modificapizzeria&id='.$id.'&err1=1&n='.$nome.'&l='.$logo.'&t='.$telefono.'&i='.$indirizzo.'&cc='.$costoconsegna.'&m='.$minimoconsegna.'&oa='.$oraapertura.'&oc='.$orachiusura.'&c='.$citta);
		}elseif(mysqli_query($conn, "UPDATE pizzeria SET NomePizzeria='$nome', Immagine='$logo', Telefono='$telefono', Indirizzo='$indirizzo', CostoConsegna='$costoconsegna', MinimoConsegna='$minimoconsegna', OraApertura='$oraapertura', OraChiusura='$orachiusura',  Citta='$citta' WHERE IDPizzeria='$id'")){
			header('Location: ../index.php?p=pannelloadmin&h=modificapizzeria');
		}else
				echo mysqli_error();
	}
	if(isset($_POST['elimina'])){
		$id=$_SESSION['idp'];
		unset($_SESSION['idp']);
		mysqli_query($conn, "DELETE FROM pizzeria WHERE IDPizzeria='$id'");
		header('Location: ../index.php?p=pannelloadmin&h=modificapizzeria');
	}
?>
