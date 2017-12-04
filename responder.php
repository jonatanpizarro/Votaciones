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
			<h1>Cuestiones</h1>
		</div>
	</header>
	<?php include 'connection.php'; ?>
	<table>
	<?php
	$query =$pdo->prepare("SELECT * FROM Consulta");
	$query->execute(); 
	$row=$query->fetch();
	$i=0;
	echo
	"<tr>"
				."<td> ID </td>"
				."<td> Pregunta </td>"
				."<td> Vota </td>"
				."</tr>";

	while($row){
		$i++;
		echo 
				"<tr>"
				."<td>" . $row['ID']."</td>"
				."<td>" . $row['Desc_Pregunta']."</td>"
				."<td> <a href='vota.php'>VOTA</a> </td>";

				"</tr>";

		$row=$query->fetch();
	

	}
	

	?>	
	</table>
	<footer>Votaciones Jonatan y Adria</footer>

</body>
</html>