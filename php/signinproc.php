<?php
	include('connessionedb.php');
	if(isset($_POST['invia'])) {
		$nome = isset($_POST['nome']) ? mysql_escape_string(replace_special_character($_POST['nome'])) : false;
		$cognome = isset($_POST['cognome']) ? mysql_escape_string(replace_special_character($_POST['cognome'])) : false;
		$username = isset($_POST['username']) ? mysql_escape_string(replace_special_character($_POST['username'])) : false;
		$email = isset($_POST['email']) ? mysql_escape_string(replace_special_character($_POST['email'])) : false;
		$telefono = isset($_POST['telefono']) ? ($_POST['telefono']) : false;
		$indirizzo = isset($_POST['indirizzo']) ? mysql_escape_string(replace_special_character($_POST['indirizzo'])) : false;
		$civico = isset($_POST['civico']) ? ($_POST['civico']) : false;
		$password = isset($_POST['password']) ? ($_POST['password']) : false;
		$conf_password = isset($_POST['conf_password']) ? ($_POST['conf_password']) : false;
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username'")) > 0) {
			header('Location: ../index.php?p=signin&erru=1&n='.$nome.'&c='.$cognome.'&u='.$username.'&e='.$email.'&t='.$telefono.'&i='.$indirizzo.'&ci='.$civico);
		}elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Email LIKE '$email'")) > 0) {
			header('Location: ../index.php?p=signin&erre=1&n='.$nome.'&c='.$cognome.'&u='.$username.'&e='.$email.'&t='.$telefono.'&i='.$indirizzo.'&ci='.$civico);
		}
		elseif(strcmp($password, $conf_password) != 0){
			header('Location: ../index.php?p=signin&errp=1&n='.$nome.'&c='.$cognome.'&u='.$username.'&e='.$email.'&t='.$telefono.'&i='.$indirizzo.'&ci='.$civico);
		}
		else {
			$password = md5 ($password);
			if(mysqli_query($conn, "INSERT INTO account (Nome, Cognome, Username, Email, Telefono, Indirizzo, Civico, Password) VALUES ('$nome', '$cognome', '$username', '$email', '$telefono', '$indirizzo', '$civico', '$password')")) {
				$_SESSION['username'] = $username;
				$risultato=mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username'");
				$utente=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
				$_SESSION['id']=$utente['IDAccount'];
				$_SESSION['loggato'] = 1;
				header('Location: ../index.php');
			}
			else {
				echo "Errore nella query: ".mysql_error();
			}
		}
	} 
?>