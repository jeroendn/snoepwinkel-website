$(document).ready(function() {

  $('#cart .cart-item').each(function() {
    let price = $(this).find('.quantity input[type="number"]').val() * $(this).find('.price').html();
    $(this).find('.price').html(price.toFixed(2));
  });

  setTimeout(function(){
    update_cart_totals();
  }, 500);

  $('#cart .cart-item .qty-min').on('click', function() {
    if ($(this).parent().find('input[type="number"]').val() > 1) {
      let num = $(this).parent().find('input[type="number"]').val() - 1;
      $(this).parent().find('input[type="number"]').val(num);

      let qty = +$(this).parent().find('input').val() + 1;
      let price = $(this).parent().parent().find('.price').html() / qty;
      $(this).parent().parent().find('.price').html(price_calc_min(price, qty));

      update_cart_totals();

      let product_id = $(this).parent().parent().find('input[type="hidden"]').attr('data');

      $.ajax({
        type: "POST",
        url: 'php/update_qty_cart.php' + '?id=' + product_id + '&qty=min',
      });
    }
  });

  $('#cart .cart-item .qty-plus').on('click', function() {
    let num = +$(this).parent().find('input[type="number"]').val() + 1;
    $(this).parent().find('input[type="number"]').val(num);

    let qty = $(this).parent().find('input[type="number"]').val() - 1;
    let price = $(this).parent().parent().find('.price').html() / qty;
    $(this).parent().parent().find('.price').html(price_calc_add(price, qty));

    update_cart_totals();

    let product_id = $(this).parent().parent().find('input[type="hidden"]').attr('data');

    $.ajax({
      type: "POST",
      url: 'php/update_qty_cart.php' + '?id=' + product_id + '&qty=plus',
    });
  });
  
  $('#cart .cart-item .delete').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');

    $.ajax({
      type: "POST",
      url: 'php/delete_cart.php' + '?id=' + product_id,
      success: (json) => {
        $(this).parent().fadeOut('slow');

        setTimeout(function(){
          update_cart_totals();
        }, 1000);
      }
    });
  });

});
