<?php
	include('connessionedb.php');
	$ultima=$_GET['pag'];
	if(isset($_POST['accedi'])) {
		$username = isset($_POST['username']) ? mysql_escape_string(replace_special_character($_POST['username'])) : false;
		$password = isset($_POST['password']) ? ($_POST['password']) : false;
		$tmp=md5($password);
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username' AND Password='$tmp'")) == 0) {
			header('Location: ../index.php?p=home&err=1');
		}
		else {
			$password = md5($password);
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username' AND Password = '$password'")) > 0) {
				$risultato=mysqli_query($conn, "SELECT * FROM account WHERE Username LIKE '$username'");
				$utente=mysqli_fetch_array($risultato, MYSQLI_ASSOC);
				$_SESSION['username'] = $utente['Username'];
				$_SESSION['id'] = $utente['IDAccount'];
				if($utente['Admin']){
					$_SESSION['admin']=1;
					$_SESSION['loggato'] = 1;
					header('Location: ../index.php?p=pannelloadmin');
					return;
				}
				$_SESSION['loggato'] = 1;
				if($ultima=='signin.html')
					header('Location: ../index.php?p=home');
				else
					if(isset($_SESSION['idp']))
						header('Location: ../index.php?p='.$ultima.'&id='.$_SESSION['idp']);
					else
						header('Location: ../index.php?p='.$ultima);
			}
		}
	}
?>