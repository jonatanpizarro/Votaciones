<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
} else {
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
					<li><a href="inicio.php">INICIO</a></li>
					<li><a>CONSULTAS</a>
					<ul>
					<li><a href="formulario.php">CREAR</a>
					<a href="responder.php">RESPONDER</a></li>
					</ul>
					</li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
		</div>
		<div id="welcome">
		 	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
		</div>
	<footer>Votaciones Jonatan y Adria</footer>
<!--
<?php
}
?>
-->