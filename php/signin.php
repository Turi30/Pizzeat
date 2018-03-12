<?php
	$erroreu=$errorep=$erroree="";
	if(isset($_GET['erru']))
		$erroreu="Username già in uso";
	if(isset($_GET['erre']))
		$erroree="Email già in uso";
	if(isset($_GET['errp']))
		$errorep="Le password non coincidono";
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
<form class="registrati" action="php/signinproc.php" method="POST">
	<label>
		Nome: *
		<input type="text" name="nome" value="<?php if(isset($n)) echo $n ?>" pattern="[a-zA-Z\s]+" autofocus required>
	</label>
	<label>
		Cognome: *
		<input type="text" name="cognome" value="<?php if(isset($n)) echo $c ?>" pattern="[a-zA-Z\s]+" required>
	</label>
	<label>
		Username: *
		<input type="text" name="username" value="<?php if(isset($n)) echo $u ?>" placeholder="Minimo 5 caratteri..." pattern=".{5,}" required>
		<span class="error"><?php echo $erroreu ?></span>
	</label>
	<label>
		E-mail: *
		<input  type="email" name="email" value="<?php if(isset($n)) echo $e ?>" size="30" required>
		<span class="error"><?php echo $erroree ?></span>
	</label>
	<label>
		Telefono: *
		<input type="text" size="10" value="<?php if(isset($n)) echo $t ?>" maxlength="10" name="telefono" pattern="[0-9]{9,10}" required>
	</label>
	<div id="indirizzo">
		<label>
			Indirizzo:
			<input type="text" value="<?php if(isset($n)) echo $i ?>" name="indirizzo">
		</label>
		<label>
			Numero civico:
			<input type="text" value="<?php if(isset($n)) echo $ci ?>" size="1" name="civico">
		</label>
	</div><br><br><br><br>
	<label>
		Password: *
		<input type="password" name="password" placeholder="Minimo 4 caratteri..." pattern="[a-zA-Z0-9\s]{4,}" required>
	</label>
	<label>
		Conferma password: *
		<input type="password" name="conf_password" pattern="[a-zA-Z0-9\s]{4,}" required>
		<span class="error"><?php echo $errorep ?></span>
	</label>
	<pre>*campi obbligatori</pre>
	<input type="submit" class="tasto" name="invia" value="Registrati">
</form>
