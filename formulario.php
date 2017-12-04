<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/ico" href="img/logo.ico" />
	<link href="style.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="funciones.js"></script>
	<title>Votaciones</title>
</head>

<body id="snow">

	<header>
		<img id="banner" src="img\banner.png" width="1280px" height="321px">
		<div>
			<nav>
				<ul class="menu">
					<li><a href="inicio.php">INICIO</a></li>
					<li><a>CONSULTAS</a>
					<ul>
					<li><a href="formulario.php">CREAR</a>
					<a href="responder.php">RESPONDER</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
		<div class="vota">
			<h1>Votaciones</h1>
		</div>
	</header>
	<h2>Cuestionarios</h2>

	<input type="submit" class="button" value="Crear Cuestionario" onclick="createLabel(this)"/>


	<?php include 'connection.php'; ?>
	<?php
		session_start();

			if (!empty($_POST['pregunta'])) {
				$pregunta=$_POST['pregunta'];
				
				
				$query =$pdo->prepare("SELECT ID FROM Usuarios WHERE Nombre='".$_SESSION['session_username']."'"); //sentencia sql
				$query->execute(); 
				$row=$query->fetch();   
	      //comprueba el numero de columnas que devuelve
				
			   	$dbid=$row['ID'];
					
			
			
				$query =$pdo->prepare("INSERT INTO Consulta(`Desc_Pregunta`,`ID_Usuario`) VALUES ('".$pregunta."','".$dbid."')"); 
				
				$query->execute();
				$e= $query->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
	  }}

  		if (!empty($_POST['respuestas'])) {
			$respuestas=$_POST['respuestas'];
			$query = $pdo->prepare("select ID from Consulta where Desc_Pregunta='".$pregunta."'");
			$query->execute();
			$row = $query->fetch();
			$e= $query->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
	  }

			foreach ($respuestas as $key) {
				$query = $pdo->prepare("insert into Opciones (ID_Consulta,Desc_Text) values('".$row['ID']."','".$key."')");
				$query->execute();

			$e= $query->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
	  }}

		
		}
	
		 			

		
		


	?>




	<div id="div1"></div>
	<footer>Votaciones Jonatan y Adria</footer>

</body>
</html>