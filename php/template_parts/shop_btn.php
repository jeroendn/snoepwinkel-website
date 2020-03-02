<?php
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

echo '<input type="hidden" data="' . $product['product_id'] . '"></input>';
