<?php
session_start();
include_once '../../php/dbconnection.inc.php';

if ($_POST['mail'] != '' && $_POST['password'] != '') {

	$sql = "SELECT * FROM account WHERE account_mail=:mail";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
	$stmt->execute();
	$account = $stmt->fetch(PDO::FETCH_ASSOC);

	if (password_verify($_POST['password'], $account['account_password'])) {
		$_SESSION['user_id'] = $account['account_id'];
	}

	return;
}

return;
