$(document).ready(function() {

  $(window).scroll(function() {
      var height = $(window).scrollTop();

      if(height > 100) {
        $('#header').addClass('floating');
      }
      else {
        $('#header').removeClass('floating');
      }
  });

  $('#product-page .product-cart-button:not(.added)').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');
    let product_qty = $(this).parent().find('input[type="number"]').val();
    let product_page = 'product?id=' + product_id;

    window.location.href = 'php/cart.inc.php?id=' + product_id + '&qty=' + product_qty + '&page=' + product_page;
  });

  $('#shop-page .product-cart-button:not(.added)').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');
    let product_qty = 1;
    let product_page = 'shop#product-' + product_id;

    window.location.href = 'php/cart.inc.php?id=' + product_id + '&qty=' + product_qty + '&page=' + product_page;
  });

});
