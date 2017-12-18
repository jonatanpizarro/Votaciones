<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
} else {}
?>
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
					<li><a href="paginaUsuario.php">INICIO</a></li>
					<li><a>CONSULTAS</a>
					<ul>
					<a href="responderUsuario.php">RESPONDER</a></li>
					</ul>
					</li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
		</div>
		<div id="welcome">
		 	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
		</div>
<?php include 'connection.php'; ?>
<?php

	


	$query = $pdo->prepare("SELECT * from Usuarios where Nombre='".$_SESSION['session_username']."';");
	$query->execute();
	$row = $query->fetch();




	$query1 = $pdo->prepare("SELECT ID_Opcion from Voto where ID_Usuario='".$row['ID']."';");
	$query1->execute();
	$row1 = $query1->fetch();


		
	
	echo "<div id='consultasRespondidas'>";
	echo "<h3> Consultas respondidas</h3>";


	while ($row1) {
		$query2 = $pdo->prepare("SELECT ID_Consulta from Opciones where ID='".$row1['ID_Opcion']."';");
		$query2->execute();
		$row2 = $query2->fetch();

		$query3 = $pdo->prepare("SELECT Desc_Pregunta from Consulta where ID='".$row2['ID_Consulta']."';");
		$query3->execute();
		$row3 = $query3->fetch();
		echo "<div>";
		echo $row3['Desc_Pregunta'];
		echo "</div>";
		$row1 = $query1->fetch();

	}

	

	


	$query = $pdo->prepare("SELECT * from Usuarios where Nombre='".$_SESSION['session_username']."';");
	$query->execute();
	$row = $query->fetch();




	$query1 = $pdo->prepare("SELECT ID_Opcion from Voto where ID_Usuario='".$row['ID']."';");
	$query1->execute();
	$row1 = $query1->fetch();





	$query2 = $pdo->prepare("SELECT ID_Consulta from Opciones where ID='".$row1['ID_Opcion']."';");
		$query2->execute();
		$row2 = $query2->fetch();



		
	
	echo "<div id='consultasPendientes'>";
	echo "<h3> Consultas pendientes </h3>";

	if (empty($row1)) {
		
		$query10 = $pdo->prepare("SELECT Desc_Pregunta from Consulta ");
		$query10->execute();
		$row10 = $query10->fetch();

		while ($row10) {
			
			
			echo "<div>";
			echo $row10['Desc_Pregunta'];
			echo "</div>";

			$row10 = $query10->fetch();
		}
	}

	$query8 = $pdo->prepare("SELECT Desc_Pregunta from Consulta ");
		$query8->execute();
		$row8 = $query8->fetch();




	while ($row8) {
		echo "a";
		

		$query3 = $pdo->prepare("SELECT Desc_Pregunta from Consulta where ID!='".$row2['ID_Consulta']."';");
		$query3->execute();
		$row3 = $query3->fetch();
		echo "<div>";
		echo $row3['Desc_Pregunta'];
		echo "</div>";
		$row8 = $query8->fetch();

	}

?>
	<footer>Votaciones Jonatan y Adria</footer>