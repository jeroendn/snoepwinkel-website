<?php
session_start();
include_once '../../php/dbconnection.inc.php';

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = round($_POST['product_price'], 2);
$product_img = $_POST['product_img'];
$product_desc = $_POST['product_desc'];

$sql = "UPDATE product SET product_name =:name, product_price =:price, product_img =:img, product_desc =:description WHERE product_id =:product_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $product_name, PDO::PARAM_STR);
$stmt->bindParam(':price', $product_price, PDO::PARAM_STR);
$stmt->bindParam(':img', $product_img, PDO::PARAM_STR);
$stmt->bindParam(':description', $product_desc, PDO::PARAM_STR);
$stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
$stmt->execute();
