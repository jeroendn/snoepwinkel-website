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

    <main id="products" class="page-content">
      <section class="container mt-5">
        <button class="btn btn-primary btn-add">Nieuw product toevoegen</button>

        <div id="product-add" class="card">
          <div class="title">
            <input class="form-control" type="text" placeholder="Naam van product">
          </div>
          <div class="price">
            <span>&#8364;</span>
            <input class="form-control" type="number" placeholder="0.00">
            <span>Per stuk</span>
          </div>
          <div class="img">
            <input class="form-control" type="text" placeholder="URL van afbeelding">
          </div>
          <textarea class="form-control" placeholder="Beschrijf je product."></textarea>
          <button class="btn btn-primary btn-add-submit">Toevoegen</button>
        </div>
      </section>

      <section class="container mt-5">
      <?php
      $sql = "SELECT * FROM product ORDER BY product_name ASC LIMIT 999";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $row_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($row_product as $product) {
        echo '
        <div id="product-' . $product['product_id'] . '" class="card">
          <div class="img">
            <img src="' . $product['product_img'] . '" class="card-img-top">
            <input class="form-control" type="text" value="' . $product['product_img'] . '" placeholder="URL van afbeelding">
          </div>
          <div class="card-body">
            <div class="title">
              <h5 class="card-title">Bewerk: ' . $product['product_name'] . '</h5>
              <input class="form-control" type="text" value="' . $product['product_name'] . '" placeholder="' . $product['product_name'] . '">
            </div>
            <div class="price">
              <span>&#8364;</span>
              <input class="form-control" type="number" value="' . $product['product_price'] . '" placeholder="' . $product['product_price'] . '">
              <span>Per stuk</span>
            </div>
            <textarea class="form-control" placeholder="Beschrijf je product.">' . $product['product_desc'] . '</textarea>
          </div>
          <div class="buttons">
            <button class="btn btn-primary btn-update">Update</button>
            <button class="btn btn-danger btn-delete">Verwijder</button>
            <input type="hidden" data="' . $product['product_id'] . '">
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
