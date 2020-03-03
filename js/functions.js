function price_calc_add (price, qty) {
  let total = price * qty + price;
  return total.toFixed(2);
};

function price_calc_min (price, qty) {
  let total = price * qty - price;
  return total.toFixed(2);
};

function update_cart_totals() {
  let total = 0;

  $('#cart .cart-item').each(function() {
    if ($(this).is(":visible")) {
      total = total + +$(this).find('.price').html();
    }
  });

  $('#cart .total-price').html('&#x20ac ' + total.toFixed(2));
};
