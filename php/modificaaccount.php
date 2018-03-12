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
		$id=$_SESSION['id'];
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username' AND IDAccount <>".$id)) > 0) {			
			header('Location: ../index.php?p=account&erru=1&n='.$nome.'&c='.$cognome.'&u='.$username.'&e='.$email.'&t='.$telefono.'&i='.$indirizzo.'&ci='.$civico);
		}
		elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Email LIKE '$email' AND IDAccount <>".$id)) > 0) {
			header('Location: ../index.php?p=account&erre=1&n='.$nome.'&c='.$cognome.'&u='.$username.'&e='.$email.'&t='.$telefono.'&i='.$indirizzo.'&ci='.$civico);
		}
		else {
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Username=".$_SESSION['username']."AND Password=".$password)) == 0){
				$password = md5 ($password);
				$utente=$_SESSION['username'];
				if(mysqli_query($conn, "UPDATE account SET Username='$username', Nome='$nome', Cognome='$cognome', Email='$email', Telefono='$telefono', Indirizzo='$indirizzo', Civico='$civico', Password='$password' WHERE IDAccount='$id'")) {
					$_SESSION['username'] = $username;
					$_SESSION['loggato'] = 1;
					header('Location: ../index.php');
				}
			} else {
				$utente=$_SESSION['username'];
				if(mysqli_query($conn, "UPDATE account SET Username='$username', Nome='$nome', Cognome='$cognome', Email='$email', Telefono='$telefono', Indirizzo='$indirizzo', Civico='$civico' WHERE IDAccount='$id'")) {
					$_SESSION['username'] = $username;
					$_SESSION['loggato'] = 1;
					header('Location: ../index.php');
				}
			}
		}
	}
?>