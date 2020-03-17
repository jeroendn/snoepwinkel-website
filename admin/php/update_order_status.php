<?php
session_start();
include_once '../../php/dbconnection.inc.php';

$order_id = $_POST['order_id'];
$order_status = $_POST['order_status'];

$sql = "UPDATE orders SET order_status_id =:order_status WHERE order_id =:order_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
$stmt->bindParam(':order_status', $order_status, PDO::PARAM_INT);
$stmt->execute();
