$('#event-registration').on('submit', function(e) {
  e.preventDefault();

  // clear alerts
  $('.alert').text('');

  // define some variables
  var form = $(this);
  var url  = form.attr('action') + '.json';
  var data = form.serialize();

  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: url,
    data: data,

    // if the ajax call is successful ...
    success: function(response) {

      // check if the honeypot was filled out, if yes, redirect somewhere (your homepage, the same page)
      if(response.redirect == true) {
        return;
      }

      // in case form validation has errors
      if(response.errors) {

        // loop through errors array
        $.each(response.errors, function(key, message) {
          // find the alert box for each input field
          var element = form.find('#' + key).next();

          // add the error message to the field
          element.text(message);
        });

      }

      // if registration was successful
      if(response.success) {
        element = $('.message');

        // show success message and hide form
        element.text(response.success);
        form.hide();
      }

      // if registration failed
      if(response.error) {
        element = $('.message');

        // show error message
        element.text(response.error);
      }

    }
  });
});
