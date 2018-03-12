<?php
	if(!isset($_SESSION['username'])) {
?>
		<script>login()</script>
<?php
	} 
	else {
		$erroreu=$erroree="";
		if(isset($_GET['erru']))
			$erroreu="Username già in uso";
		if(isset($_GET['erre']))
			$erroree="Email già in uso";
		if(isset($_GET['n'])){
			$n=$_GET['n'];
			$c=$_GET['c'];
			$u=$_GET['u'];
			$e=$_GET['e'];
			$t=$_GET['t'];
			$i=$_GET['i'];
			$ci=$_GET['ci'];
		}
?>
<div id="account">
	<h1>IL TUO ACCOUNT</h1>
	<?php
		$username=$_SESSION['username'];
		$utente=mysqli_query($conn, "SELECT * FROM account WHERE Username='$username'");
		$dati=mysqli_fetch_array($utente, MYSQLI_ASSOC);
	?>
	<form class="registrati" action="php/modificaaccount.php" method="POST">
		<label>
			Nome:
			<input type="text" value="<?php if(isset($n)) echo $n; else echo $dati['Nome']?>" name="nome" pattern="[a-zA-Z\s]+" required>
		</label>
		<label>
			Cognome:
			<input type="text" value="<?php if(isset($n)) echo $c; else echo $dati['Cognome']?>" name="cognome" pattern="[a-zA-Z\s]+" required>
		</label>
		<label>
			Username:
			<input type="text" value="<?php if(isset($n)) echo $u; else echo $dati['Username']?>" name="username" pattern=".{5,}" required>
			<span class="error"><?php echo $erroreu ?></span>
		</label>
		<label>
			E-mail:
			<input  type="email" value="<?php if(isset($n)) echo $e; else echo $dati['Email']?>" name="email" size="30" required>
			<span class="error"><?php echo $erroree ?></span>
		</label>
		<label>
			Telefono:
			<input type="text" value="<?php if(isset($n)) echo $t; else echo $dati['Telefono']?>" size="10" maxlength="10" name="telefono" pattern="[0-9]{9,10}" required>
		</label>
		<div id="indirizzo">
			<label>
				Indirizzo:
				<input type="text" value="<?php if(isset($n)) echo $i; else echo $dati['Indirizzo']?>" name="indirizzo">
			</label>
			<label>
				Numero civico:
				<input type="text" size="1" value="<?php if(isset($n)) echo $ci; else echo $dati['Civico']?>"name="civico">
			</label>
		</div><br><br><br><br>
		<label>
			Password:
			<input type="password" value="<?php echo md5($dati['Password'])?>" name="password" pattern="[a-zA-Z0-9\s]{4,}" required>
		</label>
		<input type="submit" class="tasto" name="invia" value="Modifica account">
	</form>
</div>
<?php
	}
?>