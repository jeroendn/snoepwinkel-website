<?php
session_start();
include_once __DIR__ . '../../php/dbconnection.inc.php';

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$_SESSION['productid']= $params['id'];
$_SESSION['productid']= $params['id'];

// header( "Location: ../order_status" );
?>
