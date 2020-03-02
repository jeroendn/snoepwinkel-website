<?php
session_start();

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$_SESSION['productid']= $params['id'];
$_SESSION['p_qty']= $params['qty'];
$_SESSION['return_page']= $params['page'];

$row_count = 0;

$cart = array (
  'p_id' => $_SESSION['productid'],
  'p_qty' => $_SESSION['p_qty']
);

if (!empty($_SESSION['cart'][0])) {
  foreach ($_SESSION['cart'] as $row) {
    $row_count++;
  }
  $_SESSION['cart'][$row_count] = $cart;
}
else {
  $_SESSION['cart'][0] = $cart;
}

// foreach ($_SESSION['cart'] as $item) {
//   echo 'p_id: ', $item['p_id'], '<br />';
//   echo 'p_qty: ', $item['p_qty'], '<br /><br />';
// }

$url = $params['page'];
header( "Location: ../$url" );
