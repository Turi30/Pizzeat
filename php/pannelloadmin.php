<?php
	if(!isset($_SESSION['admin']))
		header('Location: ../index.php');
	else{
?>
	<nav id="menuadmin">
		<ul>
			<li><a href="index.php?p=pannelloadmin&h=aggiungipizzeria">Aggiungi Pizzeria</a></li><li><a href="index.php?p=pannelloadmin&h=aggiungiprodotto">Aggiungi prodotti</a></li><li><a href="index.php?p=pannelloadmin&h=modificapizzeria">Modifica Pizzeria</a></li><li><a href="index.php?p=pannelloadmin&h=eliminaprodotto">Elimina Prodotto</a></li>
		</ul>
	</nav>
	<?php
		if(isset($_GET['h']))
			{
			$pagina = $_GET['h'];
			include $pagina.".php";
			}
		else
			{
			$pagina = "aggiungipizzeria";
			include $pagina.".php";
			}
	?>
<?php
	}
?>