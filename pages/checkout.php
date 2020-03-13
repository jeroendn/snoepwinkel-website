<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Snoepwinkel - checkout</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="checkout" class="page-content">
      <div class="page-title container mt-4">
        <a href="cart" class="back-btn">Winkelwagen</a>
      </div>
      <section class="container mt-4 content-box">
        <h3>Plaats uw bestelling</h3>
        <div class="order-status"></div>
        <form class="checkout-form" action="index.html" method="post">
          <p>Bestel gegevens:</p>
          <input class="form-control" type="text" name="name" placeholder="Naam">
          <input class="form-control" type="text" name="mail" placeholder="E-mail">
          <p>Ontvangst adres:</p>
          <input class="form-control" type="text" name="city" placeholder="Plaats">
          <input class="form-control" type="text" name="zip" placeholder="Postcode">
          <input class="form-control" type="text" name="street" placeholder="Straatnaam">
          <input class="form-control" type="number" name="street_number" placeholder="Huisnummer">

          <?php
          // calc total price with prices from db
          if (!empty($_SESSION['cart'])) {
            $price_totals = 0;

            foreach ($_SESSION['cart'] as $cart_item) {
              $sql = "SELECT * FROM product WHERE product_id = " . $cart_item['p_id'];
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $the_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

              foreach ($the_product as $product) {
                $price_totals = $price_totals + $product['product_price'] * $cart_item['p_qty'];
              }
            }
            echo '<p class="totals">Totaalbedrag: &#x20ac ' . round($price_totals, 2) . '</p>';
            $_SESSION['totals'] = $price_totals;
          }
          else {
            header('Location: cart');
          }
          ?>

          <a class="btn btn-primary text-light bg-danger checkout-payment-button red-btn">Bestelling plaatsen</a>
        </form>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js.inc.php' ?>
  </body>
</html>
