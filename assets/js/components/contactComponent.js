$(document).on('submit', '#contactComponentForm', function(e){
  e.preventDefault();
  $form = $(this);
  $button = $(this).find('button');
  $('#sendButton').attr('disabled', 'disabled');

  var faction = $(this).attr('action');
  var fmethod = $(this).attr('method');
  var formData = $(this).serialize();

  var name = $("input#cname").val();
	var email = $("input#cemail").val();
	var message = $("textarea#cmessage").val();

  var $message = $('#contactComponentMessage');

  if (validateEmail(email)) {
    $.ajax({
      type: fmethod,
      url: faction,
      data: {
        name: name,
        email: email,
        message: message
      },
      cache: false,
      dataType: 'json',
      complete: function(data) {
        if (data.statusText == "OK") {
          $form.fadeOut(600);
          $('#contactComponentMessage p').html('Thank you for contacting me! You\'re message has been send successfully!');
          $message.fadeIn(700);
        } else {
          $('#contactComponentMessage p').html('Something went wrong, please try again later or <a href="mailto:wk@mrkaluzny.com">contact me directly</a>');
          $message.fadeIn(700);
          $('#sendButton').attr('disabled');
        }
      }
    });
  } else {
    $('#contactComponentMessage p').html('It seems your email address is not correct, try again!');
    $message.fadeIn(700);
    $('#sendButton').attr('disabled');
  }

  function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      console.log("Verifying email...");
      return re.test(email);
  }
});
