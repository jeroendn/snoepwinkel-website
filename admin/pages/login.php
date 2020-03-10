<?php
session_start();
if (isset($_SESSION['user_id'])) {
	header("Location: dashboard");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <meta name="description" content=""/>
    <?php include_once  __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once  __DIR__ . '../../php/header.php' ?>

    <main id="login" class="page-content">
      <div class="container">
        <p>Beheerders dashboard login</p>
				<form id="login-form">
					<!-- email -->
					<label class="text-light m-1" for="mail">E-mail:</label>
					<input class="form-control" type="text" name="mail" id="mail" placeholder="E-mail">
					<!-- password -->
					<label class="text-light m-1" for="password">Wachtwoord:</label>
					<input class="form-control" type="password" name="password" id="password" placeholder="Wachtwoord">
					<!-- submit -->
					<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" value="Inloggen">
				</form>
        <a href="../home">Terug naar de site</a>
      </div>
    </main>

    <!-- footer -->
    <?php include_once  __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once  __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
