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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>


<?php
session_start();
?>
 
<?php  include 'connection.php';?>

 
<?php
 
if(isset($_SESSION["session_username"])){
// echo "Session is set"; 
header("Location: inicio.php");
}
 
if(isset($_POST["login"])){

 
	
  }
	if(!empty($_POST['usuario']) && !empty($_POST['pass'])) {
		 $username=$_POST['usuario'];												//Asigna a las variables el post 
		 $password=$_POST['pass']; 
		 
		$query =$pdo->prepare("SELECT * FROM Admins WHERE Nom='".$username."' AND password='".$password."'"); //sentencia sql
		$query->execute(); 
		$numrows=$query->fetchColumn();           //comprueba el numero de columnas que devuelve
		
		 if($numrows!=0){
			 while($row = $query->fetch(PDO::FETCH_ASSOC))
			 {
			 $dbnom=$row['Nom'];
			 $dbpassword=$row['Password'];
			 }
	 
		if($username == $dbnom && $password == $dbpassword)
	 
	{
	 
	 	$_SESSION['session_username']=$username;
	 
	/* Redirect browser */
		 header("Location: inicio.php");
	 }
		 } else {
	 
	$message = "Nombre de usuario ó contraseña invalida!";
	 }
	 
		} else {
	 $message = "Todos los campos son requeridos!";
	}

?>
<body>
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
</body>
<footer>
	Votaciones Jonatan y Adrià
</footer>
</html>