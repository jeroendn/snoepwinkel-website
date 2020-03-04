$(document).ready(function() {

  $('.checkout-payment-button').on('click', function() {
    let name = $(this).parent().find('input[name="name"]').val();
    let mail = $(this).parent().find('input[name="mail"]').val();
    let city = $(this).parent().find('input[name="city"]').val();
    let zip = $(this).parent().find('input[name="zip"]').val();
    let street = $(this).parent().find('input[name="street"]').val();
    let street_number = $(this).parent().find('input[name="street_number"]').val();

    $.ajax({
      type: "POST",
      url: 'php/place_order.php',
      data: 'name=' + name + '&mail=' + mail + '&city=' + city + '&zip=' + zip + '&street=' + street + '&street_number=' + street_number,
      // data: { name: name, mail: mail },
      dataType: 'json',
      success: (json) => {
        console.log('order placed');
      }

    });
  });

});

 // + '?name=' + name + '&mail=' + mail + '&city=' + city + '&zip=' + zip + '&street=' + street + '&street_number=' + street_number
