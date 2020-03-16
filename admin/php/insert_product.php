<?php
session_start();
include_once '../../php/dbconnection.inc.php';

$product_name = $_POST['product_name'];
$product_price = round($_POST['product_price'], 2);
$product_img = $_POST['product_img'];
$product_desc = $_POST['product_desc'];

if ($product_name != '') {
  $sql = "INSERT INTO product (product_name, product_price, product_img, product_desc) VALUES (:name, :price, :img, :description)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $product_name, PDO::PARAM_STR);
  $stmt->bindParam(':price', $product_price, PDO::PARAM_STR);
  $stmt->bindParam(':img', $product_img, PDO::PARAM_STR);
  $stmt->bindParam(':description', $product_desc, PDO::PARAM_STR);
  $stmt->execute();
}
