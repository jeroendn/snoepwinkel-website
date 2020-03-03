<?php
session_start();

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$product_id = $params['id'];


$id_array = array();
$loop_index = 0;

foreach($_SESSION['cart'] as $cart_item)  {
  $id_array[] = $cart_item['p_id'];

  if ($cart_item['p_id'] == $product_id) {
    // clear data
    unset($_SESSION['cart'][$loop_index]);

    // reindex array
    $temp_array = array_values($_SESSION['cart']);
    $_SESSION['cart'] = array_values($temp_array);
  }

  $loop_index++;
}
