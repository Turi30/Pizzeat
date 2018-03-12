<?php
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

<form class="opzioniadmin" action="php/aggiungipizzeriaproc.php" method="POST">
	<h1> Aggiungi pizzeria</h1>
	<label>
		Nome:
		<input type="text" value="<?php if(isset($n)) echo $n ?>" name="nome" required>
		<span class="error"><?php echo $errore ?></span>
	</label>
	<label>
		Logo:
		<input  type="text" value="<?php if(isset($n)) echo $l ?>" name="logo" size="30" required>
	</label>
	<label>
		Telefono:
		<input type="text" value="<?php if(isset($n)) echo $t ?>" size="10" maxlength="10" name="telefono" pattern="[0-9]{9,10}" required>
	</label>
	<label>
		Indirizzo:
		<input type="text" value="<?php if(isset($n)) echo $i ?>" name="indirizzo" required>
	</label>
	<label>
		Costo di consegna:
		<input type="text" value="<?php if(isset($n)) echo $cc ?>" name="costoconsegna" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
	</label>
	<label>
		Minimo per la consegna:
		<input type="text" value="<?php if(isset($n)) echo $m ?>" name="minimoconsegna" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
	</label>
	<label>
		Orario apertura:
		<input type="text" value="<?php if(isset($n)) echo $oa ?>" placeholder="HH:mm" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" name="oraapertura" required>
	</label>
	<label>
		Orario chiusura:
		<input type="text" value="<?php if(isset($n)) echo $oc ?>" placeholder="HH:mm" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" name="orachiusura" required>
	</label>
	<label>
		Città:
		<input type="text" value="<?php if(isset($n)) echo $c ?>" name="citta" pattern="[A-Z][a-z]+" required>
	</label>
	<input type="submit" class="tasto" name="invia" value="Aggiungi">
</form>
