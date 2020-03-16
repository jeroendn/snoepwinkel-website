<?php
$servername = "remotemysql.com";
$dBUsername = "sEdqkIHteW";
$dBPassword = "za2hPp6sIR";
$dBName = "sEdqkIHteW";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connenct to database: <?php echo $e->getMessage();?><br>Connecting to a local database...</p><?php

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "snoepwinkel";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Connected to the local database!</p><?php
	}
	catch(PDOException $e)
	{
	  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connect to any database: <?php echo $e->getMessage();?></p><?php
	}

}
