<!-- <div id="background-images">
  <span class="item item-1"></span>
  <span class="item item-2"></span>
</div> -->

<header id="header">
  <div class="header-logo">
    <a href="home">De Snoepwinkel</a>
  </div>

  <nav id="nav-wrapper">
    <ul id="main-menu" class="menu">
      <li class="menu-item"><a href="home">Home</a></li>
      <li class="menu-item"><a href="shop">Shop</a></li>
      <li class="menu-item"><a href="order_status">Bestelstatus</a></li>
    </ul>
    <ul id="menu-right" class="menu">
      <li class="menu-item"><a href="cart" class="icon">
        <span class="cart-count">
          <?php
          if (!empty($_SESSION['cart'][0])) {
            $cart_count = 0;

            foreach($_SESSION['cart'] as $cart_item) {
              $cart_count += $cart_item['p_qty'];
            }

            echo $cart_count;
          }
          else {
            echo '0';
          }
          ?>
        </span>
      </a></li>
    </ul>
  </nav>
</header>
