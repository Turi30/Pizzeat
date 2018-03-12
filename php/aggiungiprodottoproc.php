<?php
	include("connessionedb.php");
	if(isset($_POST['invia'])){
		$nome = isset($_POST['nome']) ? mysql_escape_string(replace_special_character($_POST['nome'])) : false;
		$ingredienti = isset($_POST['ingredienti']) ? mysql_escape_string(replace_special_character($_POST['ingredienti'])) : false;
		$prezzo = isset($_POST['prezzo']) ? ($_POST['prezzo']) : false;
		$categoria = isset($_POST['categoria']) ? mysql_escape_string(replace_special_character($_POST['categoria'])) : false;
		$pizzeria = isset($_POST['pizzeria']) ? mysql_escape_string(replace_special_character($_POST['pizzeria'])) : false;

		$risultato=mysqli_query($conn, "SELECT * FROM pizzeria WHERE NomePizzeria ='$pizzeria'");
		$pizzeria=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
		$idpizzeria = $pizzeria['IDPizzeria'];
		
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM menu WHERE Pizzeria =".$idpizzeria." AND Nome='$nome' AND Categoria='$categoria'")) > 0) {
			header('Location: ../index.php?p=pannelloadmin&h=aggiungiprodotto&errp=1&n='.$nome.'&pr='.$prezzo.'&c='.$categoria.'&pi='.$pizzeria);
		}
		else {
			if(mysqli_query($conn, "INSERT INTO menu (Nome, Ingredienti, Prezzo, Categoria, Pizzeria) VALUES ('$nome', '$ingredienti', '$prezzo', '$categoria', '$idpizzeria')")) {
				header('Location: ../index.php?p=pannelloadmin&h=aggiungiprodotto');
			}
			else {
				echo "Errore nella query: " ; echo mysqli_error($conn);
			}
		}
	}
?>