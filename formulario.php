<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-color: white;
		}
		header{
			text-align: center;
			background-color: white;
			color: white;
		}
		.vota{
			background-color: black;
		}
		footer{
			text-align: center;
			background-color: black;
			color: white;
		}
		header nav {
			background:black;
			overflow:hidden;
		}

		header nav ul {
			list-style:none;
			}

		header nav ul li {
			float:left;
		}
		header nav ul li a {
			padding:10px 20px;
			display:block;
			color:white;
			text-decoration:none;
		}

		header nav ul li a:hover {
			background: black;
		}
		ul.menu{
		   list-style:none;
		}

		ul.menu ul{
		   display:none;
		   list-style:none;
		}

		ul.menu li:hover > ul{
		   display:block;
		}

		#snow{
			background: none;
			background-image: url('img/s1.png'), url('img/s2.png'), url('img/s3.png');
			height: 100%;
			left: 0;
			position: absolute;
			top: 0;
			width: 100%;
			z-index:1;
			-webkit-animation: snow 10s linear infinite;
			-moz-animation: snow 10s linear infinite;
			-ms-animation: snow 10s linear infinite;
			animation: snow 10s linear infinite;
		}
		@keyframes snow {
		  0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
		  50% {background-position: 500px 500px, 100px 200px, -100px 150px;}
		  100% {background-position: 500px 1000px, 200px 400px, -100px 300px;}
		}
		@-moz-keyframes snow {
		  0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
		  50% {background-position: 500px 500px, 100px 200px, -100px 150px;}
		  100% {background-position: 400px 1000px, 200px 400px, 100px 300px;}
		}
		@-webkit-keyframes snow {
		  0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
		  50% {background-position: 500px 500px, 100px 200px, -100px 150px;}
		  100% {background-position: 500px 1000px, 200px 400px, -100px 300px;}
		}
		@-ms-keyframes snow {
		  0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
		  50% {background-position: 500px 500px, 100px 200px, -100px 150px;}
		  100% {background-position: 500px 1000px, 200px 400px, -100px 300px;}
		}	
	</style>
	<link rel="icon" type="image/ico" href="img/logo.ico" />
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
					<li><a href="formulario.html">CREAR</a>
					<a href="formulario.html">RESPONDER</a></li>
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
		if (!empty($_GET['campoPregunta'])) {
			
			$query =$pdo->prepare("SELECT ID FROM Usuarios WHERE Nombre='".$_SESSION['session_username']."'"); //sentencia sql
			$query->execute(); 
			$row=$query->fetch();   
      //comprueba el numero de columnas que devuelve
			
		   	$dbid=$row['ID'];
				
			}
			
			
		$pregunta=$_GET['campoPregunta'];
		
		$query =$pdo->prepare("INSERT INTO Consulta(`Desc_Pregunta`,`ID_Usuario`) VALUES ('".$pregunta."','".$dbid."')"); 
			
		$query->execute(); 			
			  //comprovo errors:
	  $e= $query->errorInfo();

	  		 if ($e[0]!='00000') {
			    echo "\nPDO::errorInfo():\n";
			    die("Error accedint a dades: " . $e[2]);
  }
		
		


	?>




	<div id="div1"></div>
	<footer>Votaciones Jonatan y Adria</footer>

</body>
</html>