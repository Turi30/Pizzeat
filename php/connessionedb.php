<?php
	include('specialchars.php');
	session_start();
	$db_hostname = 'localhost' ;
	$db_username = 'root' ;
	$db_password = '' ;
	$db_name = 'pizzeat' ;
	
	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name) or die("Impossibile connettersi".mysql_error());
	
	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS account (IDAccount INT(10) PRIMARY KEY AUTO_INCREMENT, Username VARCHAR(50) UNIQUE NOT NULL, Nome VARCHAR(50) NOT NULL, Cognome VARCHAR(50) NOT NULL, Email VARCHAR(100) NOT NULL UNIQUE, Telefono VARCHAR(10) NOT NULL, Indirizzo VARCHAR(100), Civico VARCHAR(50), Password VARCHAR(32) NOT NULL, Admin BOOL)");
	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS pizzeria (IDPizzeria INT(10) PRIMARY KEY AUTO_INCREMENT, NomePizzeria VARCHAR(50) NOT NULL, Immagine VARCHAR(100) DEFAULT NULL, Indirizzo VARCHAR(50) NOT NULL, Telefono VARCHAR(10) NOT NULL, CostoConsegna DOUBLE(10,2) NOT NULL, MinimoConsegna DOUBLE(10,2) NOT NULL, Citta VARCHAR(50) NOT NULL, OraApertura VARCHAR(10) NOT NULL, OraChiusura VARCHAR(10) NOT NULL)");
	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS menu (IDMenu INT(50) PRIMARY KEY AUTO_INCREMENT, Nome VARCHAR(50) NOT NULL, Ingredienti VARCHAR(100) NOT NULL, Prezzo DOUBLE(10,2) NOT NULL, Categoria VARCHAR(50) NOT NULL, Pizzeria INT(10) NOT NULL, FOREIGN KEY(Pizzeria) REFERENCES pizzeria(IDPizzeria) ON DELETE CASCADE)");
	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS ordine (IDOrdine INT(11) PRIMARY KEY AUTO_INCREMENT, Account INT(10) NOT NULL, Prodotto VARCHAR(50) NOT NULL, Prezzo DOUBLE(10,2) NOT NULL, Quantita INT(10) NOT NULL, Pizzeria INT(11) NOT NULL, Data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY(Account) REFERENCES account(IDAccount) ON DELETE CASCADE, FOREIGN KEY(Pizzeria) REFERENCES pizzeria(IDPizzeria) ON DELETE NO ACTION)");
	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS valutazione (IDValutazione INT(11) PRIMARY KEY AUTO_INCREMENT, Account INT(10) NOT NULL, Pizzeria INT(10) NOT NULL, Voto INT(11) NOT NULL, FOREIGN KEY(Account) REFERENCES account(IDAccount), FOREIGN KEY(Pizzeria) REFERENCES pizzeria(IDPizzeria) ON DELETE CASCADE)");

?>