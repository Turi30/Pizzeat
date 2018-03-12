<?php
	include('connessionedb.php');
	if(isset($_POST['invia'])){
		$telefono = isset($_POST['telefono']) ? ($_POST['telefono']) : false;
		$indirizzo = isset($_POST['indirizzo']) ? mysql_escape_string(replace_special_character($_POST['indirizzo'])) : false;
		$civico = isset($_POST['civico']) ? ($_POST['civico']) : false;
		$id=$_SESSION['id'];
		$ora= isset($_POST['ora']) ? ($_POST['ora']) : false;
		$t=time();
		$oraa=date("H:i", $t);
		if($ora<=$oraa)
			header('Location: ../index.php?p=mostracarrello&errc=1');
		mysqli_query($conn, "UPDATE account SET Telefono='$telefono', Indirizzo='$indirizzo', Civico='$civico' WHERE IDAccount='$id'");
	}
	$a=count($_SESSION['carrello']);
	while($a>0){
		$account=$_SESSION['id'];
		$pizzeria=$_SESSION['carrello'][$a-1]['pizzeria'];
		$quantita=$_SESSION['carrello'][$a-1]['quantita'];
		$prodotto=mysql_escape_string(replace_special_character($_SESSION['carrello'][$a-1]['nome']));
		$prezzo=$_SESSION['carrello'][$a-1]['prezzo'];
		mysqli_query($conn, "INSERT INTO ordine (Account, Pizzeria, Prodotto, Quantita, Prezzo) VALUES ('$account', '$pizzeria', '$prodotto', '$quantita', '$prezzo')");
		$a--;
	}
	unset($_SESSION['carrello']);
	$message="Ordine andato a buon fine. Riceverai comodamente a casa tua il tuo cibo preferito";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header('Location: ../index.php?p=home');
?>