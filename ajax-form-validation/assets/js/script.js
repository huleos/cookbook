$(document).ready(function(){

  // listen for form submission
  $('#event-registration').on('submit', function(e) {
    e.preventDefault();

    // define variables
    var url = $(this).data('page');
        validate = '/api/form/validate';
        append = '/api/page/append';
        message = $('.message');
        data = $(this).serialize();

    // make AJAX post request
    $.ajax({
      type: "POST",
      dataType: "json",
      url: url + validate,
      data: data,

      // if the ajax request is successfull ...
      success: function(response) {

        // check if the honeypot was filled in, if yes, redirect somewhere (your homepage, the same page)
        if(response['redirect'] == true) {
          window.location.href = 'https://www.honeypot.io';
          return;
        }

        // check for errors
        if(response['errors']) {

          // clear old errors
          $('.alert').html('');

          // loop through errors array
          $.each(response['errors'], function(i, item) {

            //find the alert box for each input field
            var element = $('#event-registration').find('#' + i).next();

            // add an error message to each alert box
            element.html(item);
          });

        }

        // if validation was successful
        if(response['success'] == true) {

            // make ajax request to the append api
            $.ajax({
              type: "POST",
              dataType: "json",
              url: url + append,
              data: data,

              //if the ajax request was successful ..
              success: function(response){

                // if there is a success response
                if(response['success']) {

                  // show success message and hide form
                  message.html(response['success']);
                  $('#event-registration').hide();

                // if there is an error response
                } else if (response['error']) {

                  // show an error message
                  message.html(response['error']);

                }
              }

           });

        }
      }
    });
  
  });

});
