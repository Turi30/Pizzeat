<?php
	if(!isset($_SESSION['admin'])) {
?>
		<script>login()</script>
<?php
	} 
	else {
		$errorep="";
		if(isset($_GET['errp']))
			$errorep="Prodotto già esistente in questa pizzria";
		if(isset($_GET['n'])){
			$n=$_GET['n'];
			$pr=$_GET['pr'];
			$c=$_GET['c'];
			$pi=$_GET['pi'];
		}
?>
<form id="aggiungiprodotto" class="opzioniadmin" action="php/aggiungiprodottoproc.php" method="POST">
	<h1> Aggiungi prodotto</h1>
	<label>
		Pizzeria:
		<select name="pizzeria">
			<?php
				$results=mysqli_query($conn, "SELECT NomePizzeria FROM pizzeria");
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option <?php if(isset($n) && $row['NomePizzeria']==$pi) echo selected; ?> value="<?php echo $row["NomePizzeria"] ?>" > <?php echo $row["NomePizzeria"] ?> </option>
			<?php
				}
			?>
		</select>
		<span class="error"><?php echo $errorep ?></span>
	</label>
	<label>
		Nome:
		<input type="text" value="<?php if(isset($n)) echo $n ?>" name="nome" required>
	</label>
	<label>
		Ingredienti:	
	<textarea form="aggiungiprodotto" name="ingredienti" required></textarea>
	</label>
	<label>
		Prezzo:
		<input type="text" size="10" value="<?php if(isset($n)) echo $pr ?>" maxlength="10" name="prezzo" pattern="[0-9]{0,9}.[0-9]{1,2}" required>
	</label>
	<label>
		Categoria:
		<input type="text" name="categoria" value="<?php if(isset($n)) echo $c ?>" required>
	</label>
	<input type="submit" class="tasto" name="invia" value="Aggiungi">
</form>
<?php
	}
?>