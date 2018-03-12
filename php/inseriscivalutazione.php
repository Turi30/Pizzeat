<?php
include('connessionedb.php');
$num = $_GET['q'];
$idpizzeria = $_GET['id'];
$user = $_SESSION['id'];
if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM valutazione WHERE Pizzeria = '$idpizzeria' AND Account= '$user'"))==0){
	mysqli_query($conn, "INSERT INTO valutazione (Account, Pizzeria, Voto ) VALUES ('$user', '$idpizzeria', '$num')");
} else {
	mysqli_query($conn, "UPDATE valutazione SET Voto = '$num' WHERE Pizzeria = '$idpizzeria' AND Account= '$user'");
}
?>