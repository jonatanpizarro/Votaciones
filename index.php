<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			text-align: center;
		}
		header{
			text-align: center;
		}
	</style>
	<title>Votaciones</title>
</head>
<body>
	<header><h1>Votaciones</h1></header>
	<h2>Inicio de Sesion</h2>
	<form name="loginform" id="loginform" action="" method="POST">
	<p>
	<label for="user_login">Nom Usuari: <br />
	<input type="text" name="username" class="input" value="" size="20"/></label>
	</p>
	<p>
	<label for="user_login">Contrasenya: <br />
	<input type="password" name="password" class="input" value="" size="20"/></label>
	</p>
	<p class="submit">
	<input type="submit" name="login" class="button" value="Entrar"/></label>
	</p>
	<p class="regtext">No estas registrat? <a href="registrar.php">Registrarse</a></p>
	</form>
</body>
<footer>
	Votaciones Jonatan y Adrià
</footer>
</html>