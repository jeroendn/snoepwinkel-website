<?php
$servername = "remotemysql.com";
$dBUsername = "lP6auGFw0s";
$dBPassword = "G4si8h7zlq";
$dBName = "lP6auGFw0s";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo "An error has occured: " . $e->getMessage();
}
?>
