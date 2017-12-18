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
		 	<?php
	
	$query =$pdo->prepare("SELECT * FROM Consulta");
	$query->execute(); 
	$row=$query->fetch();

	$e= $query->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
	  }
	


	$idDiv=0;
	echo "<div class='consultas'>";

	while($row){
		$idDiv++;
		echo "<div id='".$idDiv."' '>".$idDiv." - ".$row['Desc_Pregunta'];

		echo "<div class='plegable'>";
			$query1 = $pdo->prepare("SELECT * from Opciones where ID_consulta='".$row['ID']."';");
			$query1->execute();
			$row1 = $query1->fetch();

			$e= $query1->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
	  }



			echo "<form action='responder.php' method='post'>";

			while ($row1) {
				echo "<input type='radio' name='respuesta' value='".$row1['ID']."'> ".$row1['Desc_Text']."</input>";
				echo "<br>";
				$row1 = $query1->fetch();
			}
			echo "<input type='submit' value='Vota'></input>";
			echo "</form>";
			echo "</div>";
	echo "</div>";
	$row = $query->fetch();
	}
	echo "</div>";

		
    

	?>	
		</div>
	<footer>Votaciones Jonatan y Adria</footer>
<!--
<?php

?>
-->