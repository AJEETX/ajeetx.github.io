$(document).ready(function() {
    var form = $('#commonForm'); // contact form
    var submit = $('#submit-btn'); // submit button
    var alertMessage = $('.sent-message'); // renamed to alertMessage
  
    // form submit event
    form.on('submit', function(e) {
      e.preventDefault(); // prevent default form submit
  
      $.ajax({
        url: './forms/mail.php', // form action url
        type: 'POST', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        data: form.serialize(), // serialize form data
        beforeSend: function() {
        //   alertMessage.fadeOut();
          submit.html('Sending mail....'); // change submit button text
        },
        success: function(data) {
          alertMessage.html(data).fadeIn(); // fade in response data
          form.trigger('reset'); // reset form
          submit.attr("style", "display: none !important"); // reset submit button text
        },
        error: function(e) {
          console.log(e);
        }
      });
    });
  });
  