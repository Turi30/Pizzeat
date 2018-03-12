<form id="registrati" action="php/login.php" method="POST">
	<label>
		Username: 
		<input type="text" name="username" pattern=".{5,}" required>
	</label>
	<label>
		Password: 
		<input type="password" name="password" pattern="[a-zA-Z0-9\s]{4,}" required>
	</label>
	<input type="submit" class="button" name="accedi" value="Accedi">
</form>
<p>Se non sei ancora registrato</p>
<a href="index.php?p=signin">Registrati ora</a>
