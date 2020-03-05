$(document).ready(function() {

  $('.checkout-payment-button').on('click', function() {
    let name = $(this).parent().find('input[name="name"]').val();
    let mail = $(this).parent().find('input[name="mail"]').val();
    let city = $(this).parent().find('input[name="city"]').val();
    let zip = $(this).parent().find('input[name="zip"]').val();
    let street = $(this).parent().find('input[name="street"]').val();
    let street_number = $(this).parent().find('input[name="street_number"]').val();

    // check if fields are filled in
    if (name == '' || mail == '' || city == '' || zip == '' || street == '' || street_number == '') {
      $('#checkout .order-status').addClass('empty');
      $('#checkout .order-status').removeClass('success');
      $('#checkout .order-status').removeClass('error');
      return;
    }
    else if (zip.length != 6) {
      $('#checkout .order-status').addClass('error');
      $('#checkout .order-status').removeClass('success');
      $('#checkout .order-status').removeClass('empty');
      return;
    }
    else {
      $.ajax({
        type: "POST",
        url: 'php/place_order.php',
        data: 'name=' + name + '&mail=' + mail + '&city=' + city + '&zip=' + zip + '&street=' + street + '&street_number=' + street_number,
        success: (json) => {
          $('#checkout .order-status').addClass('success');
          $('#checkout .order-status').removeClass('empty');
          $('#checkout .order-status').removeClass('error');
        },
        error: (json) => {
          $('#checkout .order-status').addClass('error');
          $('#checkout .order-status').removeClass('empty');
          $('#checkout .order-status').removeClass('error');
        }
      });
    }

  });

});
