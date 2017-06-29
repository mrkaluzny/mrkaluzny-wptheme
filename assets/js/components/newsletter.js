if (jQuery.contains(document, $(".cta--signup")[0])) {
  console.log('Newsletter signup found!');
  if (checkSignUpStatus()) {
    console.log('Signed up!')
    $(".cta--signup").hide();
  } else {
    console.log('User not signed up!');
    var $message = $('.cta__message--signup');
    var $form = $('#newsletterForm');
    $(document).on('submit', '#newsletterForm', function(e) {
      e.preventDefault();
      console.log('Submited!');
      var dataForm = $form.serialize();

      if (validateEmail($('#newsletterEmailSignup').val())) {
        console.log('Verified!');
        $message.fadeOut(120);

        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: dataForm,
          cache: false,
          dataType: 'jsonp',
          jsonp: 'c',
          contentType: "application/json; charset=utf-8",

          error: function (err) {
            console.log(err);
            $('#newsletterMessage p').html('Something went wrong... Try again later!');
            $message.fadeIn(700);
          },

          success: function (data) {
            console.log(data.msg);
            if (data.result != "success") {
              var conf = "is already";

              if (data.msg.indexOf(conf) !== -1) {
                $('#newsletterMessage p').html(data.msg);
                $message.fadeIn(700);
                setCookie('nsignedup', 'true', 30);
              } else {
                $('#newsletterMessage p').html('Well... That didn\'t work.. Maybe try again?');
                $message.fadeIn(700);
              }

            } else {
              $form.fadeOut(600);
              $('#newsletterMessage p').html('Success! Brace yourself for awesome content. But first - check your mailbox to confirm subscription!');
              $message.fadeIn(700);
              setCookie('nsignedup', 'true', 30);
            }
          }
        });

      } else {
        $('#newsletterMessage p').html('It seems your email address is not correct, try again!');
        $message.fadeIn(700);
      }
    });
  }

}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    console.log("Verifying email...");
    return re.test(email);
}

function setCookie(cname, cvalue, exdays) {
  if (exdays == undefined || exdays == null || exdays == '') {exdays = 365;}
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
    var ca = document.cookie.split(';');
    console.log('Cookie: ' + ca);
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkSignUpStatus() {
  var signed = getCookie("nsignedup");
  if (signed == "true") {
    return true;
  } else {
    return false;
  }
}
