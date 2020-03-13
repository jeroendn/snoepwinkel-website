<?php
session_start();
include_once '../../php/dbconnection.inc.php';

$product_id = $_POST['product_id'];

// $sql = "DELETE FROM product WHERE product_id = ' $product_id '";
$stmt = $conn->prepare($sql);
$stmt->execute();
