<?php
include_once '../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bestellingen</title>
    <meta name="description" content=""/>
    <?php include_once  __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once  __DIR__ . '../../php/header.php' ?>

    <main id="orders" class="page-content container mt-5">
      <?php
      // get each order
      $sql = "SELECT * FROM (orders INNER JOIN account ON orders.account_id = account.account_id ) ORDER BY order_date DESC";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($orders as $order) {
        echo '
        <button class="btn btn-primary btn-show-order">Bestelling: #' . $order['order_id'] . '<br>' . $order['account_mail'] . '</button>
        <div class="order">
          <div class="order-info">
            <h5>Naam:</h5>
            <p>' . $order['account_name'] . '</p>
            <h5>Adres:</h5>
            <p>' . $order['account_street'] . ' ' . $order['account_street_number'] . '<br>' . $order['account_zip'] . ' ' . $order['account_city'] . '</p>
            ';

            $sql = "SELECT * FROM (orders INNER JOIN order_status ON orders.order_status_id = order_status.order_status_id ) WHERE order_id = '" . $order['order_id'] . "' LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $the_order = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '
            <h5>Status</h5>
            <p style="margin-bottom: 5px;">' . $the_order[0]['order_status_name'] . '</p>
            <h6>wijzig status:</h6>
            <select style="margin-bottom: 10px;">
            ';

            $sql = "SELECT * FROM order_status ORDER BY order_status_name ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $statuses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($statuses as $status) {
              echo '<option val="' . $status['order_status_id'] . '">' . $status['order_status_name'] . '</option>';
            }

            echo '
            </select>
            <button class="btn btn-warning">Wijzig</button>
            <h5>Totaalprijs:</h5>
            <p>&#8364;' . $the_order[0]['order_total_price'] . '</p>
            <h5>Datum geplaatst:</h5>
            <p>' . date("d/M/Y H:i:s", strtotime($the_order[0]['order_date'])) . '</p>
            <input type="hidden" id="' . $the_order[0]['order_id'] . '">
          </div>
          ';

          $sql = "SELECT * FROM (ordered_product INNER JOIN product ON ordered_product.product_id = product.product_id) WHERE order_id = '" . $order['order_id'] . "' ";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo '<div class="order-products mb-3"><h5>Bestelde producten:</h5>';

          foreach ($products as $product) {
            echo '
            <div class="order-item">
              <img src="' .  $product['product_img'] . '"></img>
              <p class="title">' . $product['product_name'] . '</p>
              <p class="quantity">Aantal: ' . $product['ordered_product_count'] . '</p>
              <p class="price">Prijs per stuk: &#x20ac;' . $product['ordered_product_price'] . '</p>
            </div>
            ';
          }

          echo '
          </div>
        </div>
        ';
      }
      ?>
      <button class="btn btn-primary btn-close-all">Sluit alle</button>
    </main>

    <!-- footer -->
    <?php include_once  __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once  __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
