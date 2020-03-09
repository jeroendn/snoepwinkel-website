<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>De Snoepwinkel</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.inc.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.inc.php' ?>

    <main id="home-page" class="page-content">
      <section class="container mt-5">
        <div class="row">
          <div class="col-sm-6 mb-3">
            <img src="media/design/snoepwinkelsnoep.jpg" class="img-fluid">
          </div>
          <div class="col-sm-6">
            <div class="row mb-3">
              <a href="shop" class="btn text-white bg-danger btn-lg btn-block pt-3 pb-3">Shop</a>
            </div>
            <div class="row mb-3">
              <p>Het allerlekkerste snoep wat je maar kan krijgen! Nu verkrijgbaar bij De Snoepwinkel webshop en op lokatie. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.inc.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js.inc.php' ?>
  </body>
</html>
