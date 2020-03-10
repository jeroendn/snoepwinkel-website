$(document).ready(function() {

  $("#login-form").submit(function(e) {
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

});
