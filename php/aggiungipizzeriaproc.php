<?php
	include('connessionedb.php');
	if(isset($_POST['invia'])) {
		$nome = isset($_POST['nome']) ? mysql_escape_string(replace_special_character($_POST['nome'])) : false;
		$logo = isset($_POST['logo']) ? mysql_escape_string(replace_special_character($_POST['logo'])) : false;
		$telefono = isset($_POST['telefono']) ? ($_POST['telefono']) : false;
		$indirizzo = isset($_POST['indirizzo']) ? mysql_escape_string(replace_special_character($_POST['indirizzo'])) : false;
		$costoconsegna = isset($_POST['costoconsegna']) ? ($_POST['costoconsegna']) : false;
		$minimoconsegna = isset($_POST['minimoconsegna']) ? ($_POST['minimoconsegna']) : false;
		$oraapertura = isset($_POST['oraapertura']) ? ($_POST['oraapertura']) : false;
		$orachiusura = isset($_POST['orachiusura']) ? ($_POST['orachiusura']) : false;
		$citta = isset($_POST['citta']) ? mysql_escape_string(replace_special_character($_POST['citta'])) : false;
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pizzeria WHERE NomePizzeria LIKE '$nome' AND Citta='$citta'")) > 0) {
			header('Location: ../index.php?p=pannelloadmin&err1=1&n='.$nome.'&l='.$logo.'&t='.$telefono.'&i='.$indirizzo.'&cc='.$costoconsegna.'&m='.$minimoconsegna.'&oa='.$oraapertura.'&oc='.$orachiusura.'&c='.$citta);
		}
		else {
			if(mysqli_query($conn, "INSERT INTO pizzeria (NomePizzeria, Immagine, Indirizzo, Telefono, CostoConsegna, MinimoConsegna, OraApertura, OraChiusura, Citta) VALUES ('$nome', '$logo', '$indirizzo', '$telefono', '$costoconsegna', '$minimoconsegna', '$oraapertura', '$orachiusura', '$citta')")) {
				header('Location: ../index.php?p=pannelloadmin');
			}
			else {
				echo "Errore nella query: ".mysql_error();
			}
		}
	} 
?>
