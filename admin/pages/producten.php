<?php
include_once '../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Producten</title>
    <meta name="description" content=""/>
    <?php include_once  __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once  __DIR__ . '../../php/header.php' ?>

    <main id="dashboard" class="page-content">
      <section class="shop-grid container mt-5">
      <?php
      $sql = "SELECT * FROM product ORDER BY product_name ASC LIMIT 999";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $row_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($row_product as $product) {
        echo '
        <div id="product-' . $product['product_id'] . '" class="card" style="width: 18rem;">
          <img src="' . $product['product_img'] . '" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">' . $product['product_name'] . '</h5>
            <h6 class="card-subtitle mb-2">&#8364;' . $product['product_price'] . ' per stuk</h6>
            <p class="card-text">' . substr($product['product_desc'], 0, 180) . '...</p>
            <a href="product?id=' . $product['product_id'] . '" class="btn btn-primary">Bekijk</a>
          </div>
        </div>
        ';
      }
      ?>
      </section>
    </main>

    <!-- footer -->
    <?php include_once  __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once  __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
