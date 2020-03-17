$(document).ready(function() {

  $('#login-form').submit(function(e) {
    var request;
    e.preventDefault();

    if (request) {
      request.abort();
    }

    var form = $(this);
    var inputs = form.find("input, select, button, textarea");
    var serializedData = form.serialize();

    inputs.prop("disabled", true);

    request = $.ajax({
      url: "../admin/php/login_submit.php",
      type: "post",
      data: serializedData
    });

    request.done(function () {
      window.location.href = 'dashboard';
    });

    request.always(function () {
      inputs.prop("disabled", false);
    });

  });

  // product management

  $('#products .card .btn-delete').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');

    $.ajax({
      type: "POST",
      url: '../admin/php/delete_product.php',
      data: { product_id: product_id },
      success: (json) => {
        $(this).parent().parent().fadeOut('slow');
      }
    });
  });

  $('#products .card .btn-update').on('click', function() {
    let product_id = $(this).parent().find('input[type="hidden"]').attr('data');
    let product_name = $(this).parent().parent().find('.title input').val();
    let product_price = $(this).parent().parent().find('.price input').val();
    let product_img = $(this).parent().parent().find('.img input').val();
    let product_desc = $(this).parent().parent().find('textarea').val();

    $(this).parent().parent().find('.title .card-title').html('Aan het bijwerken: ' + product_name);

    $.ajax({
      type: "POST",
      url: '../admin/php/update_product.php',
      data: { product_id: product_id, product_name: product_name, product_price: product_price, product_img: product_img, product_desc: product_desc },
      success: (json) => {
        $(this).parent().parent().find('.img img').attr('src', product_img);
        $(this).parent().parent().find('.title .card-title').html('Bijgewerkt: ' + product_name).css('color', '#afd275');

        let this_btn = $(this);

        setTimeout(function() {
          this_btn.parent().parent().find('.title .card-title').html('Bewerk: ' + product_name).css('color', 'unset');
        }, 10000);
      }
    });
  });

  $('.btn-add').on('click', function() {
    $('#product-add').slideToggle();
  });

  $('#products #product-add .btn-add-submit').on('click', function() {
    let product_name = $(this).parent().find('.title input').val();
    let product_price = $(this).parent().find('.price input').val();
    let product_img = $(this).parent().find('.img input').val();
    let product_desc = $(this).parent().find('textarea').val();

    $.ajax({
      type: "POST",
      url: '../admin/php/insert_product.php',
      data: { product_name: product_name, product_price: product_price, product_img: product_img, product_desc: product_desc },
      success: (json) => {
        if (product_name != '') {
          $('#product-add').slideUp();
          $(this).parent().find('.error').remove();
          $(this).parent().find('.title input').val('');
          $(this).parent().find('.price input').val('');
          $(this).parent().find('.img input').val('');
          $(this).parent().find('textarea').val('');
        }
        else if (!$(this).parent().find('.error').length) {
          $(this).parent().prepend('<p class="error">Naam is verplicht!</p>');
        }
      }
    });
  });

  // order management

  $('#orders .btn-show-order').on('click', function() {
    $(this).next().slideToggle();
  });

  $('#orders .btn-close-all').on('click', function() {
    $('.order').each(function() {
      $(this).slideUp();
    });
  });

});
