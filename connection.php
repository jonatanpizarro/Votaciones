<?php
	try {
    $hostname = "localhost";
    $dbname = "Proyecto_Vota";
    $username = "Admin";
    $pw = "P@ssw0rd";
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
 ?>