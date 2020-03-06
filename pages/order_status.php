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
          if (empty($_SESSION['user_mail']) || empty($_SESSION['order_id'])) {
            echo '<h6>Vul uw e-mail en bestelnummer in om uw bestelling te zien.</h6>';
          }
          else {
            echo '
            <div>
              <h5>Bestelnummer</h5>
              <p>' . $_SESSION['order_id'] . '</p>
              <h5>E-mail</h5>
              <p>' . $_SESSION['user_mail'] . '</p>
              ';

              $sql = "SELECT * FROM (orders INNER JOIN order_status ON orders.order_status_id = order_status.order_status_id ) WHERE order_id = '" . $_SESSION['order_id'] . "' LIMIT 1";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $the_order = $stmt->fetchAll(PDO::FETCH_ASSOC);

              echo '
              <h5>Status</h5>
              <p>' . $the_order[0]['order_status_name'] . '</p>
              <h5>Totaalprijs</h5>
              <p>&#8364;' . $the_order[0]['order_total_price'] . '</p>
              <h5>Datum geplaatst</h5>
              <p>' . date("d/M/Y H:i:s", strtotime($the_order[0]['order_date'])) . '</p>
            </div>
            ';

            $sql = "SELECT * FROM (ordered_product INNER JOIN product ON ordered_product.product_id = product.product_id) WHERE order_id = '" . $_SESSION['order_id'] . "' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div>';

            foreach ($products as $product) {
              var_dump($product);
            }

            echo '</div>';

            unset($_SESSION['user_mail']);
            unset($_SESSION['order_id']);
          }
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
