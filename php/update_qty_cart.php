<?php
session_start();

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$product_id = $params['id'];
$product_qty = $params['qty'];

$loop_index = 0;

foreach($_SESSION['cart'] as $cart_item)  {

  if ($cart_item['p_id'] == $product_id) {
    if ($product_qty == 'plus') {
      $_SESSION['cart'][$loop_index]['p_qty'] = $_SESSION['cart'][$loop_index]['p_qty'] + 1;
    }
    else if ($product_qty == 'min' && $_SESSION['cart'][$loop_index]['p_qty'] > 1) {
      $_SESSION['cart'][$loop_index]['p_qty'] = $_SESSION['cart'][$loop_index]['p_qty'] - 1;
    }
  }

  $loop_index++;
}
