<div id="city">
	<form action="php/homeproc.php" method="POST">
		<label>Seleziona la tua città:
			<select name="città">
				<?php
					$results=mysqli_query($conn, "SELECT DISTINCT Citta FROM pizzeria ORDER BY Citta ASC");
					while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
				?>
						<option value="<?php echo $row["Citta"] ?>" > <?php echo $row["Citta"] ?> </option>
				<?php
					}
				?>
			</select>
		</label>
		<input type="submit" class="tasto" name="invia" value="Cerca">
	</form>
	<img alt="sfondo" src="./immagini/sfondo.jpg">
</div>