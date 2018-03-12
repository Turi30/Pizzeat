<?php
	if(isset($_GET['id'])){
		$idpizz=$_GET['id'];
		$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria='$idpizz'");
		$dati=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
		$errore="";
		if(isset($_GET['err1']))
			$errore="Pizzeria già esistente";
		if(isset($_GET['n'])){
			$n=$_GET['n'];
			$l=$_GET['l'];
			$t=$_GET['t'];
			$i=$_GET['i'];
			$cc=$_GET['cc'];
			$m=$_GET['m'];
			$oa=$_GET['oa'];
			$oc=$_GET['oc'];
			$c=$_GET['c'];
		}
?>
		<form class="opzioniadmin" action="php/modificapizzeriaproc.php" method="POST">
			<h1> Modifica pizzeria</h1>
			<label>
				Nome:
				<input type="text" value="<?php if(isset($_GET['n'])) echo $n; else echo $dati['NomePizzeria']?>" name="nome" required>
				<span class="error"><?php echo $errore ?></span>
			</label>
			<label>
				Logo:
				<input  type="text" value="<?php if(isset($_GET['n'])) echo $l; else echo $dati['Immagine']?>" name="logo" size="30" required>
			</label>
			<label>
				Telefono:
				<input type="text" value="<?php if(isset($_GET['n'])) echo $t; else echo $dati['Telefono']?>" size="10" maxlength="10" name="telefono" pattern="[0-9]{9,10}" required>
			</label>
			<label>
				Indirizzo:
				<input type="text" value="<?php if(isset($_GET['n'])) echo $i; else echo $dati['Indirizzo']?>" name="indirizzo" required>
			</label>
			<label>
				Costo di consegna:
				<input type="text" value="<?php if(isset($_GET['n'])) echo $cc; else echo $dati['CostoConsegna']?>" name="costoconsegna" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
			</label>
			<label>
				Minimo per la consegna:
				<input type="text" value="<?php if(isset($_GET['n'])) echo $m; else echo $dati['MinimoConsegna']?>" name="minimoconsegna" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
			</label>
			<label>
				Orario apertura:
				<input type="text" placeholder="HH:mm" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" value="<?php if(isset($_GET['n'])) echo $oa; else echo $dati['OraApertura'] ?>" name="oraapertura" required>
			</label>
			<label>
				Orario chiusura:
				<input type="text" placeholder="HH:mm" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" value="<?php if(isset($_GET['n'])) echo $oc; else echo $dati['OraChiusura'] ?>" name="orachiusura" required>
			</label>
			<label>
				Città:
				<input type="text" name="citta" value="<?php if(isset($_GET['n'])) echo $c; else echo $dati['Citta']?>" pattern="[A-Z][a-z]+" required>
			</label>
			<input type="submit" class="tasto" name="modifica" value="Modifica">
			<input type="submit" class="tasto" name="elimina" value="Elimina">
		</form>
<?php
	} else {
?>
<form class="opzioniadmin" action="php/modificapizzeriaproc.php" method="POST">
	<h1> Modifica pizzeria</h1>
	<label>
		Pizzeria:
		<select name="pizzeria">
			<?php
				$results=mysqli_query($conn, "SELECT NomePizzeria FROM pizzeria");
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option value="<?php echo $row["NomePizzeria"] ?>" > <?php echo $row["NomePizzeria"] ?> </option>
			<?php
				}
			?>
		</select>
	</label>
	<input type="submit" class="tasto" name="invia" value="Cerca">
</form>
<?php
	}
?>