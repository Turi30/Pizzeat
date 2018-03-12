<?php 
	if(!isset($_SESSION['idp'])) {
		$_SESSION['idp'] = isset($_GET['id']) ? ($_GET['id']) : false;
		$citta=$_GET['id'];
		$results1=mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()>=OraApertura ORDER BY NomePizzeria ASC");
		$results2=mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()<OraApertura ORDER BY NomePizzeria ASC");
	}
	else {
		unset($_SESSION['idp']);
		$_SESSION['idp']=$_GET['id'];
		$citta=$_GET['id'];
		$results1=mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()>=OraApertura ORDER BY NomePizzeria ASC");
		$results2=mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()<OraApertura ORDER BY NomePizzeria ASC");
	}
?>
<div id="pizzerie">
<?php
	if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()>=OraApertura"))>0){
?>
	<h1>Pizzerie che consegnano a <?php echo $citta ?></h1>
	<?php 
	}
		while($row= mysqli_fetch_array($results1, MYSQLI_ASSOC)) {
	?>
			<div class="pizzeria">
				<a href="index.php?p=menu&id=<?php echo $row["IDPizzeria"]; ?>">
					<img alt="logopizz" src="immagini/<?php echo $row["Immagine"]?>" class="logopizzeria">
					<div class="left">
						<h1><?php echo $row["NomePizzeria"]; ?> </h1>
						<div class="valutazionemedia">
							<?php
								$idpizz = $row["IDPizzeria"];
								$med = mysqli_query($conn, "SELECT AVG(Voto) as Media FROM valutazione WHERE Pizzeria = '$idpizz'");
								$risultato=mysqli_fetch_array($med, MYSQLI_ASSOC);
								$media = round($risultato['Media']);
								$i=0;
								for ($i; $i<$media; $i++) {
							?>
									<img alt="stella" src="./immagini/stellapiena.png">
							<?php 
								}
								for($i;$i<5; $i++) {
							?>
									<img alt="stella" src="./immagini/stellavuota.png">
							<?php
								}
							?>
						</div>
						<h2><?php echo $row["Indirizzo"] ; ?></h2>
					</div>
					<div class="right">
						<p>Orario: <?php echo $row['OraApertura'];?>-<?php echo $row['OraChiusura'];?></p>
						<p>Costo di consegna: <?php if($row["CostoConsegna"]==0){
														echo "Gratis";
														} else {
														echo $row["CostoConsegna"]; ?>&#8364; <?php } ?> </p>
						<p>Minimo per la consegna: <?php echo $row["MinimoConsegna"]; ?>&#8364; </p>
					</div>
				</a>
			</div>
	<?php
		}
	if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pizzeria WHERE Citta='$citta' AND curtime()<OraApertura"))>0){
	?>
		<h1>Apriranno più tardi a <?php echo $citta ?></h1>
	<?php
	}	
		while($row= mysqli_fetch_array($results2, MYSQLI_ASSOC)) {
	?>
			<div class="pizzeriachiusa">
				<a>
					<img alt="logopizz" src="immagini/<?php echo $row["Immagine"]?>" class="logopizzeria">
					<div class="left">
						<h1><?php echo $row["NomePizzeria"]; ?> </h1>
						<div class="valutazionemedia">
							<?php
								$idpizz = $row["IDPizzeria"];
								$med = mysqli_query($conn, "SELECT AVG(Voto) as Media FROM valutazione WHERE Pizzeria = '$idpizz'");
								$risultato=mysqli_fetch_array($med, MYSQLI_ASSOC);
								$media = round($risultato['Media']);
								$i=0;
								for ($i; $i<$media; $i++) {
							?>
									<img alt="stella" src="./immagini/stellapiena.png">
							<?php 
								}
								for($i;$i<5; $i++) {
							?>
									<img alt="stella" src="./immagini/stellavuota.png">
							<?php
								}
							?>
						</div>
						<h2><?php echo $row["Indirizzo"] ; ?></h2>
					</div>
					<div class="right">
						<p>Orario: <?php $data=$row['OraApertura']; $data=date_create($data); echo date_format($data, "H:i")?>-<?php $data=$row['OraChiusura']; $data=date_create($data); echo date_format($data, "H:i")?></p>
						<p>Costo di consegna: <?php if($row["CostoConsegna"]==0){
														echo "Gratis";
														} else {
														echo $row["CostoConsegna"]; ?>&#8364; <?php } ?> </p>
						<p>Minimo per la consegna: <?php echo $row["MinimoConsegna"]; ?>&#8364; </p>
					</div>
				</a>
			</div>
	<?php
		}
	?>
</div>