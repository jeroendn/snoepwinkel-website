<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Product - De Snoepwinkel</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="product-page" class="page-content">
      <section class="container mt-5">

        <?php
        // get product id from url
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $product_id = $params['id'];

        // check if there is a product id
        if ($product_id) {
          $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $the_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($the_product as $product) {
            ?>
            <div class="row">
              <div class="col-sm-6 mb-3 product-img">
                <img src="<?php echo $product['product_img'] ?>" class="img-fluid">
              </div>
              <div class="col-sm-6 product-details">
                <div class="row product-title ">
                  <h1><?php echo $product['product_name'] ?></h1>
                </div>
                <div class="row product-price">
                  <p>&#8364;<?php echo $product['product_price'] ?><span>per stuk<span></p>
                </div>
                <div class="row add-to-cart-wrapper">
                  <div class="row mb-3 product-quantity">
                    <input type="number" id="quantity" name="quantity" min="1" max="99" value="1">
                  </div>
                  <div class="row mb-3 product-cart-button">
                    <?php include_once __DIR__ . '../../php/template_parts/shop_btn.php' ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row pt-5 product-desc">
              <h3>Beschrijving</h3>
              <p><?php echo $product['product_desc'] ?></p>
            </div>
            <?php
          }
        }
        else {
          echo '<p>Something went wrong while retrieving the product data.</p>';
        }
        ?>

      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js.inc.php' ?>
  </body>
</html>
