<?php
	if(!isset($_SESSION['username'])) {
		header('Location: ../index.php');
	}
	else{
		$total=0;
			if(!empty($_SESSION['carrello'])) {
				$errore="";
				if(isset($_GET['errc']))
					$errore="Inserisci un orario valido";
				$id=$_SESSION['id'];
				$utente=mysqli_query($conn, "SELECT * FROM account WHERE IDAccount=".$id);
				$dati=mysqli_fetch_array($utente, MYSQLI_ASSOC);
				$pizzeria=$_SESSION['carrello'][0]['pizzeria'];
				$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria=".$pizzeria);
				$row=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
?>
			<div id="riepilogo">
				<h1>RIEPILOGO CARRELLO</h1>
				<div id="riepilogocarrello">
					<h2>Il tuo ordine</h2>
<?php				
				foreach($_SESSION['carrello'] as $chiave => $valore) {
?>
					<p><?php echo $valore['quantita']?>x <?php echo $valore['nome']?></p>
				<?php
					$total= $total + ($valore['quantita']* $valore['prezzo']);
				}
				?>
				<p>Totale: <?php echo number_format($total, 2)?>&#8364;</p>
				<p>Spedizione:  <?php echo number_format($row['CostoConsegna'], 2)?>&#8364;</p>
				<p>Da pagare: <?php echo number_format($total+$row['CostoConsegna'], 2)?>&#8364;</p>
				</div>
				<form id="info" method="POST" action="php/confermaordine.php">
					<h2>Info spedizione</h2>
					<label>
						Cognome:
						<input type="text" value="<?php echo $dati['Cognome']?>" name="cognome" pattern="[a-zA-Z\s]+" required>
					</label>
					<label>
						Telefono:
						<input type="text" value="<?php echo $dati['Telefono']?>" size="10" maxlength="10" name="telefono" pattern="[0-9]{9,10}" required>
					</label>
					<label>
						Indirizzo:
						<input type="text" value="<?php echo $dati['Indirizzo']?>" name="indirizzo" required>
					</label>
					<label>
						Numero civico:
						<input type="text" size="1" value="<?php echo $dati['Civico']?>"name="civico" required>
					</label>
					<label>
						Ora consegna:
						<input type="text" placeholder="HH:mm" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" name="ora" required>
						<span class="error"><?php echo $errore ?></span>
					</label>
					<textarea form="info" name="note" placeholder="Note per il locale..."></textarea>
					<input class="tasto" name="invia" type="submit" value="Conferma">
				</form>
			</div>
				<?php
			}
				
	}?>