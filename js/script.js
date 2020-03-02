$(document).ready(function() {

  // sticky header
  $(window).scroll(function() {
      var height = $(window).scrollTop();

      if(height > 100) {
        $('#header').addClass('floating');
      }
      else {
        $('#header').removeClass('floating');
      }
  });

  // add to cart functionality
  $('#product-page .product-cart-button:not(.added)').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');
    let product_qty = $(this).parent().find('input[type="number"]').val();
    let product_page = 'product?id=' + product_id;

    window.location.href = 'php/cart.inc.php?id=' + product_id + '&qty=' + product_qty + '&page=' + product_page;
  });

  // add to cart functionality
  $('#shop-page .product-cart-button:not(.added)').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');
    let product_qty = 1;
    let product_page = 'shop#product-' + product_id;

    window.location.href = 'php/cart.inc.php?id=' + product_id + '&qty=' + product_qty + '&page=' + product_page;
  });

  // on click linking
  $('#shop-page .card img').on('click', function() {
    window.location.href = $(this).next().find('a').attr('href');
  });

  // cart calculations
  $('#cart .cart-item').each(function() {
    let price = $(this).find('.quantity input').val() * $(this).find('.price').html();
    $(this).find('.price').html(price.toFixed(2));
  });

  $('.qty-min').on('click', function() {
    if ($(this).parent().find('input[type="number"]').val() > 1) {
      let num = $(this).parent().find('input[type="number"]').val() - 1;
      $(this).parent().find('input[type="number"]').val(num);

      let qty = +$(this).parent().find('input').val() + 1;
      let price = $(this).parent().parent().find('.price').html() / qty;
      $(this).parent().parent().find('.price').html(price_calc_min(price, qty));
    }
  });

  $('.qty-plus').on('click', function() {
    let num = +$(this).parent().find('input').val() + 1;
    $(this).parent().find('input').val(num);

    // $(this).parent().find('input').attr('val', $(this).parent().find('input').val());

    let qty = $(this).parent().find('input').val() - 1;
    let price = $(this).parent().parent().find('.price').html() / qty;
    $(this).parent().parent().find('.price').html(price_calc_add(price, qty));
  });

  $('#cart .cart-item .quantity input').on('change', function() {

  });

});
