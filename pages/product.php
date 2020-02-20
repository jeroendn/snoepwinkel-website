<?php
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

    <main id="" class="page-content">
      <section class="container mt-5">

        <?php
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
            <section class="container mt-5">
              <div class="row">
                <div class="col-sm-6 mb-3 product-img ">
                  <img src="<?php echo $product['product_img'] ?>" class="img-fluid">
                </div>
                <div class="col-sm-6 product-details">
                  <div class="row mb-3 product-title ">
                    <p><?php echo $product['product_name'] ?></p>
                  </div>
                  <div class="row mb-3 product-price">
                    <p><?php echo $product['product_price'] ?></p>
                  </div>
                  <div class="row mb-3 product-quantity">
                    
                  </div>
                  <div class="row mb-3 product-cart-button">

                  </div>
                </div>
              </div>

              <div class="row product-desc">
                <p><?php echo $product['product_desc'] ?></p>
              </div>
            </section>
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
