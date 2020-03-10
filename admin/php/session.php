<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: ../beheer/login");
}

include_once '../../php/dbconnection.inc.php';
?>
