<div id="nomepizzeria">
	<?php
		if(!isset($_SESSION['idp'])){
			$_SESSION['idp']=$_GET['id'];
		} else {
			unset($_SESSION['idp']);
			$_SESSION['idp']=$_GET['id'];
		}
		$id=$_SESSION['idp'];
		$pizzeria=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria='$id'");
		$riga=mysqli_fetch_array($pizzeria, MYSQLI_ASSOC);
	?>
	<img alt="logopizz" src="immagini/<?php echo $riga['Immagine']?>">
	<h1><?php echo $riga['NomePizzeria']?></h1>
	<?php
		if(isset($_SESSION['id'])){
			$idpizz = $_SESSION['idp'];
			$user = $_SESSION['id'];
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM valutazione WHERE Pizzeria = '$idpizz' AND Account= '$user'"))==0){
	?>
				<p id="valutazione1">Valuta:</p>
				<script type="text/javascript">star(0, + <?php echo $id ?>);</script>	
	<?php			
			} else{
				$med = mysqli_query($conn, "SELECT AVG(Voto) as Media FROM valutazione WHERE Pizzeria = '$idpizz' AND Account= '$user'");
				$risultato=mysqli_fetch_array($med, MYSQLI_ASSOC);
				$media = round($risultato['Media']);
				$i=0;
				echo "<p id='valutazione1'>La tua valutazione:</p>";
	?>
				<script type="text/javascript">star(+<?php echo $media ?>, + <?php echo $id ?>);</script>
	<?php 
			}
		}
	?>
	<p id="infopizzeria"><img class="telefono" alt="telefono" src="immagini/orologio.png"><?php echo $riga['OraApertura']."-".$riga['OraChiusura']?></br></br><img class="telefono" alt="telefono" src="immagini/telefono.png"><?php echo $riga["Telefono"]?></p>
</div>
<div id="categorie">
	<h1>Categorie</h1>
	<ul>
		<?php
			$results=mysqli_query($conn, "SELECT DISTINCT Categoria FROM menu WHERE Pizzeria='$id' ORDER BY Categoria DESC");
			while($categorie=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
		?>
				<li><a href="#<?php echo $categorie['Categoria']?>"><?php echo $categorie['Categoria']?></a></li>
		<?php
			}
		?>
	</ul>
</div>
<div id="prodotti">
	<?php
		$results=mysqli_query($conn, "SELECT DISTINCT Categoria FROM menu WHERE Pizzeria='$id' ORDER BY Categoria DESC");
		while($categorie=mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	?>
			<h1 id="<?php echo $categorie['Categoria']?>"><?php echo $categorie['Categoria']?></h1>
		<?php
			$categoria=$categorie['Categoria'];
			$prodotti=mysqli_query($conn, "SELECT * FROM menu WHERE Pizzeria='$id' AND Categoria='$categoria' ORDER BY Categoria DESC, Prezzo ASC");
			while($row=mysqli_fetch_array($prodotti, MYSQLI_ASSOC)) {
		?>
				<div class="prodotto">
					<a href="php/carrello.php?nome=<?php echo str_replace(" ", "_", $row['Nome'])?>&prezzo=<?php echo $row['Prezzo']?>&&id=<?php echo $id?>">
						<div class="nome">
							<h4><?php echo $row['Nome']?></h4>
							<p><?php echo $row['Ingredienti']?></p>
						</div>
						<div class="prezzo">
							<p>&#8364; <?php echo $row['Prezzo']?></p>
						</div>
					</a>
				</div>
	<?php
			}
		}
	?>
</div>
<div id="carrello">
	<h1>Il tuo ordine</h1>
	<div id="acquisti">
		<?php
		$total=0;
			if(!empty($_SESSION['carrello'])&& $_SESSION['carrello'][0]['pizzeria']==$id) {
				
				foreach($_SESSION['carrello'] as $chiave => $valore) {
		?>
					<div class="elementocarrello">
						<p><?php echo $valore['nome']?></p>
						<div class="quantita">
							<a href="php/aggiungiquantita.php?nome=<?php echo str_replace(" ", "_", $valore['nome'])?>&id=<?php echo $id?>"><img alt="più" src="immagini/plus.png"></a> <p><?php echo $valore['quantita']?></p> <a href="php/togliquantita.php?nome=<?php echo str_replace(" ", "_", $valore['nome'])?>&id=<?php echo $id?>"><img alt="meno" src="immagini/meno.png"></a>
						</div>
					</div>
				<?php
					$total= $total + ($valore['quantita']* $valore['prezzo']);
				}
				?>
				<p>&#160;Totale: <?php echo number_format($total, 2)?>&#8364;</p>
				<?php
			}
			else {
				unset($_SESSION['carrello']);
				?>
				<p>&#160;Carrello vuoto</p>
		<?php	
			}
		?>
	</div>
		<?php 
			if(isset($_SESSION['loggato']))
				echo'<form method="POST" action="index.php?p=mostracarrello">';
			$risultato=mysqli_query($conn, "SELECT * FROM pizzeria WHERE IDPizzeria = '$id'");
			$pizzeria=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
			$min=$pizzeria['MinimoConsegna'];
			if($total>=$min) {
			?>
				<input type="submit" onclick="<?php if(!isset($_SESSION['loggato'])) echo'return login()';?>" value="Ordina adesso">
			<?php
			}
			else
				echo'<input type="submit" disabled value="Ordina adesso">';
			if(isset($_SESSION['loggato']))
				echo'</form>';
		?>
</div>
