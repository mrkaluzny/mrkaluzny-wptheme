var height = $('#articles').height();
var paddingTop = height - 568 + "px";
$('#articlesTitle').height(height);
$('#articlesTitle').css('padding-top', paddingTop);

window.onresize = function() {
  if (window.innerWidth <= 992) {
    $('#articlesTitle').css('padding-top', "");
    $('#articlesTitle').css('height', "");
  } else if (window.innerWidth >= 992 ) {
    var height = $('#articles').height();
    var paddingTop = height - 568 + "px";
    $('#articlesTitle').css('padding-top', paddingTop);
    $('#articlesTitle').height(height);
  }
};
