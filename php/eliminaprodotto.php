<?php
	if(isset($_GET['idp'])){
		$idp=$_GET['idp'];
		$categoria=$_GET['cat'];
?>
		<form class="opzioniadmin" action="php/eliminaprodottoproc.php" method="POST">
			<h1> Elimina prodotto</h1>
			<label>
				Prodotto:
				<select name="prodotto">
					<?php
						$results=mysqli_query($conn, "SELECT Nome FROM menu WHERE Pizzeria=".$idp." AND Categoria='$categoria'");
						while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
					?>
							<option value="<?php echo $row["Nome"] ?>" > <?php echo $row["Nome"] ?> </option>
					<?php
						}
					?>
				</select>
			</label>
			<input type="submit" class="tasto" name="elimina" value="Elimina">
		</form>
<?php
	} elseif(isset($_GET['id'])) {
		$id=$_GET['id'];
?>
<form class="opzioniadmin" action="php/eliminaprodottoproc.php" method="POST">
	<h1> Elimina prodotto</h1>
	<label>
		Categoria:
		<select name="categoria">
			<?php
				$results=mysqli_query($conn, "SELECT DISTINCT Categoria FROM menu WHERE Pizzeria=".$id);
				while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			?>
					<option value="<?php echo $row["Categoria"] ?>" > <?php echo $row["Categoria"] ?> </option>
			<?php
				}
			?>
		</select>
	</label>
	<input type="submit" class="tasto" name="inviac" value="Cerca">
</form>
<?php
	} else {
?>
<form class="opzioniadmin" action="php/eliminaprodottoproc.php" method="POST">
	<h1> Elimina prodotto</h1>
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