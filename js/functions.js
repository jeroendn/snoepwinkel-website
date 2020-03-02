function price_calc_add (price, qty) {
  let total = price * qty + price;
  return total.toFixed(2);
};

function price_calc_min (price, qty) {
  let total = price * qty - price;
  return total.toFixed(2);
};
