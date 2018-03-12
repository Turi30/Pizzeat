<!DOCTYPE html>
<html lang="it">
	<head>
		<link rel="stylesheet" type="text/css" href="css/stile.css">
		<link rel="icon" type="image/png" href="immagini/pizzaiolo-disegno.jpg">  
		<meta charset="utf-8" />
		<script type="text/javascript" src="javascript/valutazione.js"></script>
		<script type="text/javascript" src="javascript/login.js"></script>
		<title>Pizzeat</title>
	</head>
	<body>
		<header>
			<div id="barratitolo">
				<a id="titolo" href="index.php?p=home"><img src="immagini/titolo.png" alt="titolo"></a>
				<?php
					include('php/connessionedb.php');
					$errore="";
					if(isset($_SESSION['loggato'])) {
				?>
						<a id="login"><img src="immagini/login.png" alt="utente"> <?php echo $_SESSION['username'];?></a>
				<?php
					} else {
				?>
						<a id="login" href="#" onclick="return login()"><img src="immagini/login.png" alt="login"> Accedi</a>
				<?php
					}
				?>
			</div>
			<nav id="menu">
				<ul>
				<?php
					if(isset($_SESSION['admin'])) {
				?>
						<li><a href="index.php?p=home">Ordina</a></li><li><a href="index.php?p=listaordini">I miei ordini</a></li><li><a href="index.php?p=pannelloadmin">Pannello amministrativo</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li><li><a href="php/logout.php">Logout</a></li>
				<?php
					} elseif(isset($_SESSION['loggato'])) {
				?>
						<li><a href="index.php?p=home">Ordina</a></li><li><a href="index.php?p=listaordini">I miei ordini</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li><li><a href="php/logout.php">Logout</a></li>
				<?php
					} else {
				?>
						<li><a href="index.php?p=home">Ordina</a></li><li><a href="index.php?p=listaordini">I miei ordini</a></li><li><a href="index.php?p=account">Account</a></li><li><a href="index.php?p=contatti">Contatti</a></li>
				<?php
					}
				?>
				</ul>
			</nav>
		</header>
		<?php
			if(isset($_GET['err'])){
				$errore="Username e password non corrispondono";
			}
		?>
		<div id="loginform">
			<form class="registrati" action="php/loginproc.php?pag=<?php if(isset($_GET['p']))echo $_GET['p']; else echo 'home';?>" method="POST">
				<input type="button" value="-" onclick="return login()">
				<label>
					Username: 
					<input type="text" name="username" pattern=".{5,}" required autofocus>
				</label>
				<label>
					Password: 
					<input type="password" name="password" pattern="[a-zA-Z0-9\s]{4,}" required>
				</label>
				<span class="error"><?php echo $errore ?></span>
				<input type="submit" class="tasto" name="accedi" value="Accedi">
			</form>
			<p>oppure <a href="index.php?p=signin">Registrati ora</a></p>
		</div>
		<?php
			if(isset($_GET['err'])){
		?>
				<script>login()</script>
		<?php
			}
		?>
		<div id="container">
			<?php
				if(isset($_GET['p']))
					{
					$pagina = $_GET['p'];
					include "php/".$pagina.".php";
					}
				else
					{
					$pagina = "home";
					include "php/".$pagina.".php";
					}
			?>
		</div>
		<footer>
			<p>© 2017 |  Tutti i diritti riservati. </p>
			<p>Luca Belluardo. Matricola 524771. Ingegneria Informatica. Progetto Progettazione WEB 2017. <a href="html/descrizione.html">   Descrizione</a></p>
		</footer>
	</body>
</html>
