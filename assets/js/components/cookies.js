// $.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
//   if ( data.address.continent_code == 'EU' ) {
//     showCookieBar();
//   }
// });

function showCookieBar() {
  var agreed = checkAgreement();
  if ( !agreed ) {
    $('#cookiesBar').removeClass('cookies--hide');
  }
}

function checkAgreement() {
  var name = "cookieAgreement="
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return true;
        }
    }
    return false;
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

$(document).on('click', '.cookies__hide', function(){
  setCookie('cookieAgreement', 'true', 90);
  $('#cookiesBar').addClass('cookies--hide');
});

$(function(){
  showCookieBar();
})();
