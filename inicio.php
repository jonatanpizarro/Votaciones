<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
} else {
?>

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
 
<body>
	<div id="welcome">
	 <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	</div>


	<nav>
		<ul>
			<li><a href="formulario.php"> Crear consulta</a>	</li>
			<li><a href="logout.php">Finalice</a> sesión aquí!</li>
		</ul>
	</nav>
	
	





</body>


 
<?php
}
?>