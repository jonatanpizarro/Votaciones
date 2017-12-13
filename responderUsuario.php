<?php include 'connection.php'; ?>
<?php
if (isset($_POST['respuesta'])) {
	session_start();
	$query3 = $pdo->prepare("SELECT ID from Usuarios where Nombre='".$_SESSION['session_username']."';");
		$query3->execute();
		$row3 = $query3->fetch();

		while ($row3){


			$query4 = $pdo->prepare("INSERT into Voto (ID_Opcion, ID_Usuario) values (".$_POST['respuesta'].",".$row3['ID'].");");
			$query4->execute();
			$row4 = $query4->fetch();
			$row3 = $query3->fetch();

			$e= $query3->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);

			 $e= $query4->errorInfo();

		  		 if ($e[0]!='00000') {
				    echo "\nPDO::errorInfo():\n";
				    die("Error accedint a dades: " . $e[2]);
		}
		
	  }

	 
	  }
}

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
				</ul>
			</nav>
		</div>
		<div class="vota">
			<h1>Cuestionesa</h1>
		</div>
	</header>
	<table>
	<?php include 'connection.php'; ?>
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
	</table>
	<footer>Votaciones Jonatan y Adria</footer>

</body>
</html>