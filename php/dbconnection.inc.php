<?php
$servername = "remotemysql.com";
$dBUsername = "sEdqkIHteW";
$dBPassword = "za2hPp6sIR";
$dBName = "sEdqkIHteW";

// $servername = "localhost";
// $dBUsername = "root";
// $dBPassword = "";
// $dBName = "snoepwinkel";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  ?><p>An error has occured: <?php echo $e->getMessage();?></p><?php
}
