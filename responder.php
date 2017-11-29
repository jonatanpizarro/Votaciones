<?php include 'connection.php'; ?>
<table>
<?php
$query =$pdo->prepare("SELECT * FROM Consulta");
$query->execute(); 
$row=$query->fetch();
echo
"<tr>"
			."<td> ID </td>"
			."<td> Pregunta </td>"
			."</tr>";

while($row){
	echo 
			"<tr>"
			."<td>" . $row['ID']."</td>"
			."<td>" . $row['Desc_Pregunta']."</td>"

			."</tr>";

	$row=$query->fetch();
}

?>	
</table>