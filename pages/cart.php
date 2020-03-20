<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Snoepwinkel - Winkelwagen</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="cart" class="page-content">
      <section class="container mt-5">
        <div class="row">

          <div id="cart-items" class="col-sm-6 content-box">
            <h3>Uw winkelwagen</h3>
            <?php
            if (!empty($_SESSION['cart'])) {
              $product_count = 0;

              // echo every product in cart session
              foreach ($_SESSION['cart'] as $cart_item) {
                $sql = "SELECT * FROM product WHERE product_id = " . $cart_item['p_id'];
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $the_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($the_product as $product) {
                  echo '
                  <div class="cart-item">
                    <img src="' .  $product['product_img'] . '"></img>
                    <p class="title">' . $product['product_name'] . '</p>
                    <div class="quantity">
                      <span class="qty-min"></span>
                      <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="99" value="' . $cart_item['p_qty'] . '" readonly>
                      <span class="qty-plus"></span>
                    </div>
                    <p class="price">' . $product['product_price'] . '</p>
                    <span class="delete"></span>
                    <input type="hidden" data="' . $product['product_id'] . '"></input>
                  </div>';
                }

                $product_count++;
              }
            }
            else {
              echo '<h6>Uw winkelwagen is nog leeg.</h6>';
            }
            ?>
          </div>

          <div id="cart-summary" class="col-sm-6 content-box">
            <p class="total-price">0</p>
            <!-- direct on click via javascript to send a confirmation with it in the session -->
            <?php
            if (!empty($_SESSION['cart'])) {
            ?><a href="checkout" class="btn btn-primary text-light bg-danger cart-payment-button red-btn">Naar betalen</a><?php
            }
            else {
            ?><a class="btn btn-primary text-light bg-danger red-btn" style="opacity: .5;">Uw winkelwagen is leeg</a><?php
            }
            ?>
          </div>

        </div>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js.inc.php' ?>
  </body>
</html>
