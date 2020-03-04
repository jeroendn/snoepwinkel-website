<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$street = $_POST['street'];
$street_number = $_POST['street_number'];




$sql = "SELECT account_name, account_mail FROM account";
$stmt = $conn->prepare($sql);
$stmt->execute();
$the_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

// check if name or e-mail is already in db




$sql = "INSERT INTO account (account_name, account_mail, account_city, account_zip, account_street, account_street_number) VALUES (:name, :mail, :city, :zip, :street, :street_number)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':zip', $zip, PDO::PARAM_STR);
$stmt->bindParam(':street', $street, PDO::PARAM_STR);
$stmt->bindParam(':street_number', $street_number, PDO::PARAM_INT);
$stmt->execute();
