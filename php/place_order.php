<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';

if (empty($_SESSION['cart'])) {
  echo 'Winkelwagen is nog leeg!';
  header('Location: ../cart');
  return;
}

$name = $_POST['name'];
$mail = $_POST['mail'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$street = $_POST['street'];
$street_number = $_POST['street_number'];

// check if user has already ordered with his email
$sql = "SELECT account_id, account_mail FROM account WHERE account_mail = '" . $mail . "' LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($user_data)) {
  $sql = "INSERT INTO account (account_name, account_mail, account_city, account_zip, account_street, account_street_number) VALUES (:name, :mail, :city, :zip, :street, :street_number)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':city', $city, PDO::PARAM_STR);
  $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
  $stmt->bindParam(':street', $street, PDO::PARAM_STR);
  $stmt->bindParam(':street_number', $street_number, PDO::PARAM_INT);
  $stmt->execute();
}
else {
  $sql = "UPDATE account SET account_name =:name, account_zip =:zip, account_city =:city, account_street =:street, account_street_number =:street_number WHERE account_mail =:mail";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
  $stmt->bindParam(':city', $city, PDO::PARAM_STR);
  $stmt->bindParam(':street', $street, PDO::PARAM_STR);
  $stmt->bindParam(':street_number', $street_number, PDO::PARAM_INT);
  $stmt->execute();
}

// create a order
$order_status = 5;

$sql = "INSERT INTO orders (account_id, order_status_id, order_total_price) VALUES (:account_id, :order_status, :total_price)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':account_id', $user_data[0]['account_id'], PDO::PARAM_INT);
$stmt->bindParam(':order_status', $order_status, PDO::PARAM_INT);
$stmt->bindParam(':total_price', $_SESSION['totals']);
$stmt->execute();

// get latest placed order
$sql = "SELECT order_id FROM orders WHERE account_id = '" . $user_data[0]["account_id"] . "' ORDER BY order_date DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$account_order = $stmt->fetchAll(PDO::FETCH_ASSOC);

$order_id = $account_order[0]['order_id'];

// link products to the order
foreach ($_SESSION['cart'] as $cart_item) {
  $sql = "SELECT * FROM product WHERE product_id = " . $cart_item['p_id'];
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $the_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($the_product as $product) {
    $sql = "INSERT INTO ordered_product (order_id, product_id, ordered_product_count, ordered_product_price) VALUES (:order_id, :product_id, :product_count, :product_price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product['product_id'], PDO::PARAM_INT);
    $stmt->bindParam(':product_count', $cart_item['p_qty'], PDO::PARAM_INT);
    $stmt->bindParam(':product_price', $product['product_price']);
    $stmt->execute();
  }
}

// clear cart
unset($_SESSION['cart']);

echo $order_id;
