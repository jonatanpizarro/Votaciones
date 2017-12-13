<?php
	session_start();
	include 'connection.php';

	if(isset($_SESSION["session_username"])){
	// echo "Session is set"; 
	header("Location: inicio.php");
	}
	 
	if(isset($_POST["login"])){
		
	   
		if(!empty($_POST['usuario']) && !empty($_POST['pass']) ) {
			$username=$_POST['usuario'];												//Asigna a las variables el post 
			$password=$_POST['pass']; 
			 
			$query =$pdo->prepare("SELECT * FROM Usuarios WHERE Nombre='".$username."' AND Password='".$password."'"); //sentencia sql
			$query->execute(); 
			$row=$query->fetch();           //comprueba el numero de columnas que devuelve
			
			$dbnom=$row['Nombre'];
			$dbpassword=$row['Password'];
			
			

			if($username == $dbnom && $password == $dbpassword){

				$query =$pdo->prepare("SELECT Admin FROM Usuarios WHERE Nombre='".$username."' AND Password='".$password."'"); //sentencia sql
				$query->execute(); 
				$row=$query->fetch();  

				$admin=$row['Admin'];
			 	
			 		if($admin==1){			 			
			 			$_SESSION['session_username']=$username;
			 			header("Location: paginaUsuario.php");
			 		}else{
			 			$_SESSION['session_username']=$username;
			 			header("Location: inicio.php");
			 		}

		 	}

		}
	}

?>
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
		div{
			margin: 0 auto;
			border-style: solid;
			width: 300px;
			margin-bottom: 150px;
		}
		h1, footer{
			background-color: black;
			color: white;
		}
		
	</style>
	<title>Votaciones</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div>
		<header><h1>Votaciones</h1></header>
		<h2>Inicio de Sesion</h2>
		<form action="index.php" method="POST">
		<p>
		<label for="user_login">Nom Usuari: <br />
		<input type="text" name="usuario" class="input" value="" size="20"/></label>
		</p>
		<p>
		<label for="user_login">Contrasenya: <br />
		<input type="password" name="pass" class="input" value="" size="20"/></label>
		</p>
		<p class="submit">
		<input type="submit" name="login" class="button" value="Entrar"/></label>
		</p>
		<!--<p class="regtext">No estas registrat? <a href="registrar.php">Registrarse</a></p>!-->
		</form>
	</div>
	<footer>Votaciones Jonatan y Adrià</footer>
</body>
</html>
