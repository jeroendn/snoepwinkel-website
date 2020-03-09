<?php
if (isset($_POST['login-submit'])) {

	require '../../php/dbconnection.inc.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) || empty($password)) {
		header("Location: ../login/index.php?error=emtyfieldslogin");
		exit();
	}
	else {
		try {
			$sql = "SELECT * FROM user WHERE username=:username AND rank_id = 1";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch (PDOException $e) {
			header("Location: ../login/index.php?error=sqlerror");
			exit();
		}

		if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$passwordCheck = password_verify($password, $row['password']);
			if ($passwordCheck == false) {
				header("Location: ../login/index.php?error=wrongpassword");
				exit();
			}
			else if ($passwordCheck == true) {
				//Alles na het inloggen
				session_start();
				$_SESSION['userId'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];

				header("Location: ../login/index.php?login=success");
				exit();
			}
			else {
				header("Location: ../login/index.php?error=wrongpassword");
				exit();
			}
		}
		else {
			header("Location: ../login/index.php?error=nouserfoundornotadmin");
			exit();
		}
	}
}
else {
	header("Location: ../login/index.php");
	exit();
}
?>
