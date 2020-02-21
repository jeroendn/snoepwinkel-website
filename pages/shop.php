<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Shop - De Snoepwinkel</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="shop-page" class="page-content">
      <section class="shop-grid container mt-5">
        <?php
        $sql = "SELECT * FROM product ORDER BY product_date DESC LIMIT 50";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $count = 0;
        $lastElement = end($row_product);

        foreach ($row_product as $product) {
          $count++;

          if ($count == 1) {
            echo '<div class="row">';
          }

          echo '
          <div id="product-' . $product['product_id'] . '" class="card" style="width: 18rem;">
            <img src="' . $product['product_img'] . '" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">' . $product['product_name'] . '</h5>
              <h6 class="card-subtitle mb-2">&#8364;' . $product['product_price'] . ' per stuk</h6>
              <p class="card-text">' . substr($product['product_desc'], 0, 180) . '...</p>
              <a href="product?id=' . $product['product_id'] . '" class="btn btn-primary">Bekijk</a>
          ';

          if (!empty($_SESSION['cart'][0])) {
            $id_array = array();
            foreach($_SESSION['cart'] as $item)
                {
                $id_array[] = $item['p_id'];
                }

            if (in_array($product['product_id'], $id_array))
            {
              echo '<a href="cart" class="btn btn-primary bg-success product-cart-button added">View cart</a>';
            }
            else {
              echo '<a class="btn btn-primary text-light bg-danger product-cart-button">Winkelmand</a>';
            }
          }
          else {
            echo '<a class="btn btn-primary text-light bg-danger product-cart-button">Winkelmand</a>';
          }


          echo '
              <input type="hidden" data="' . $product['product_id'] . '"></input>
            </div>
          </div>
          ';

          if ($count == 3 || $product == $lastElement) {
            echo '</div>';
            $count = 0;
          }
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
