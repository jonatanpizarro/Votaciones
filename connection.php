<?php
	try {
    $hostname = "localhost";
    $dbname = "Proyecto_Vota";

    $username = "root";
    $pw = "Aws2-21";



    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
 ?>