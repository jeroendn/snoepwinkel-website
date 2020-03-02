<?php
session_start();
if (isset($_SESSION['userId'])) {
	// header("Location: ../dashboard");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include '../php/head.inc.php' ?>
  </head>

  <body>
    <main>
      <!-- log in -->
      <div>
        <p >Log in to Admin</p>
        <form action="../php/login.inc.php" method="post">
          <!-- username -->
          <label for="username">Username:</label><br>
          <input type="text" name="username" id="username" placeholder="username"><br>
          <!-- password -->
          <label for="password">Password:</label><br>
          <input type="password" name="password" id="password" placeholder="password"><br>
          <!-- submit -->
          <input type="submit" name="login-submit" value="Log In">
        </form>
				<a href="../../">Back to website</a>
      </div>
    </main>
  </body>
</html>
