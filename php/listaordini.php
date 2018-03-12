<?php
	if(!isset($_SESSION['username'])) {
?>
		<script>login()</script>
<?php
	} 
	else {
?>
<div id="listaordini">
	<h1>I TUOI ORDINI</h1>
	<?php
		$user=$_SESSION['id'];
		$ordini=mysqli_query($conn, "SELECT * FROM ordine WHERE Account='$user' GROUP BY Data, Prodotto, Pizzeria ORDER BY Data DESC");
		if(mysqli_num_rows($ordini)==0){
			echo "<p>Non hai ancora effettuato ordini</p>";
			echo "<a href='index.php'>ORDINA ORA</a>";
		} else {
			$newdata=$olddata='';
			$primo=1;
			$totale=0;
			while($dati=mysqli_fetch_array($ordini, MYSQLI_ASSOC)){
				$newdata=$dati['Data'];
				if($newdata!=$olddata&&$primo==1){
					echo '<div class="ordine">';
					$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria=".$dati['Pizzeria']);
					$row=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
					echo '<h2>'.$row['NomePizzeria'].'</h2>';
					$data=date_create($dati['Data']);
					echo '<h4>'.date_format($data, "d/m/Y H:i").'</h4>';
					$primo=0;
				}
				elseif($newdata!=$olddata){
					echo '<p class="totale">Totale: '.number_format($totale, 2).'&#8364;</p>';
					echo '</div>';
					$totale=0;
					echo '<div class="ordine">';
					$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria=".$dati['Pizzeria']);
					$row=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
					echo '<h2>'.$row['NomePizzeria'].'</h2>';
					$data=date_create($dati['Data']);
					echo '<h4>'.date_format($data, "d/m/Y H:i").'</h4>';
				}
	?>
				<p><?php echo $dati['Quantita'];?>x <?php echo $dati['Prodotto'];?></p>
				
	<?php
				$totale+=$dati['Quantita']*$dati['Prezzo'];
				$olddata=$dati['Data'];
			}
			echo '<p class="totale">Totale: '.number_format($totale, 2).'&#8364;</p>';
			echo '</div>';
		}
	?>
</div>
<?php
	}
?>