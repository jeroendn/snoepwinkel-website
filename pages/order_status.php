<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Snoepwinkel - Bestelstatus</title>
    <meta name="description" content="Zie uw bestelstatus."/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="order-status" class="page-content">
      <section class="container mt-5 content-box">
        <h3>Bekijk uw bestelstatus</h3>
        <form class="status-form" action="index.html" method="post">
          <input type="text" name="mail" placeholder="E-mail"></input>
          <input type="number" name="order_id" placeholder="Bestelnummer"></input>
          <a class="btn btn-primary text-light bg-danger order-status-btn red-btn">Bekijk status</a>
        </form>
        <div class="order-status">
          <?php



           ?>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js.inc.php' ?>
  </body>
</html>
