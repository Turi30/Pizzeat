<div id="contatti">
<?php
	if(isset($_SESSION['loggato'])){
		$username=$_SESSION['username'];
		$utente=mysqli_query($conn, "SELECT * FROM account WHERE Username='$username'");
		$dati=mysqli_fetch_array($utente, MYSQLI_ASSOC);
	}
?>
	<h1>Contattaci</h1>
	<form id="cont" class="registrati" method="POST">
		<label>
			Nome:
			<input type="text" value="<?php if(isset($_SESSION['loggato'])) echo $dati['Nome']?>" name="nome" pattern="[a-zA-Z\s]+" required>
		</label>
		<label>
			Cognome:
			<input type="text" value="<?php if(isset($_SESSION['loggato'])) echo $dati['Cognome']?>" name="cognome" pattern="[a-zA-Z\s]+" required>
		</label>
		<label>
			E-mail:
			<input  type="email" value="<?php if(isset($_SESSION['loggato']))echo $dati['Email']?>" name="email" size="30" required>
		</label>
		<textarea form="cont" name="note" placeholder="Scrivici" required></textarea>
		<input type="submit" class="tasto" name="invia" value="Invia">
	</form>
</div>
