<?php
	session_start();
	include 'connection.php';

	if(isset($_SESSION["session_username"])){
	// echo "Session is set"; 
	header("Location: inicio.php");
	}
	 
	if(isset($_POST["email"])){
		
	   
		if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['usuario'])) {
			
			$username=$_POST['usuario'];
			$email=$_POST['email'];
			//Asigna a las variables el post 
			$password=$_POST['pass']; 
			$password1=$_POST['pass1']; 

			if ($password==$password1) {


				$hash=sha1($password);
				unset($password);
				$query =$pdo->prepare("SELECT Email FROM Usuarios "); //sentencia sql
				$query->execute(); 
				$row=$query->fetch(); 
				

		  		

				while ($row) {
				

					if ($row['Email']==$email) {
						echo "valiste";
					}else{
						echo "no valiste";
						$query1 =$pdo->prepare("INSERT INTO Usuarios(`Nombre`,`Email`,`Password`,`Admin`) VALUES ('".$username."','".$email."','".$hash."',1)"); 

				
						$query1->execute();
						$e= $query1->errorInfo();
						 if ($e[0]!='00000') {
						    echo "\nPDO::errorInfo():\n";
						    die("Error accedint a dades: " . $e[2]);

					    
	  				}
	  				header("Location: paginaUsuario.php");
	  				break;
					}
					$row=$query->fetch(); 
					$dbnom=$row['Nombre'];
					$dbpassword=$row['Password'];
				}
			}
			 
			
			
			
			

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
		<h2>Registrarse</h2>
		<form action="registrar.php" method="POST">
		<p>
		<label for="user_login">Email: <br />
		<input type="email" name="email" class="input" value="" size="20"/></label>
		</p>
		<p>
		<label for="user_login">Nom Usuari: <br />
		<input type="text" name="usuario" class="input" value="" size="20"/></label>
		</p>
		<p>
		<label for="user_login">Contrasenya: <br />
		<input type="password" name="pass" class="input" value="" size="20"/></label>
		</p>
		<p>
		<label for="user_login">Repite la Contrasenya: <br />
		<input type="password" name="pass1" class="input" value="" size="20"/></label>
		</p>
		<p class="submit">
		<input type="submit" name="login" class="button" value="Registrarse"/></label>
		</form>
	</div>
	<footer>Votaciones Jonatan y Adrià</footer>
</body>
</html>