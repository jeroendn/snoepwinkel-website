<?php
session_start();
if (!isset($_SESSION['userId'])) {
	header("Location: ../login");
}

include '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta name="description" content=""/>
    <?php include '../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include '../php/header.inc.php' ?>

    <main id="" class="page-content">

    </main>

    <!-- footer -->
    <?php include '../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include '../php/js.inc.php' ?>
  </body>
</html>
