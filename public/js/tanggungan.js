$(function () {
  $('#InputIC').keydown(function (e) {
    var key = e.charCode || e.keyCode || 0;
      $text = $(this); 
      if (key !== 8 && key !== 9) {
        if ($text.val().length === 6) {
          $text.val($text.val() + '-');
        }
        if ($text.val().length === 9) {
          $text.val($text.val() + '-');
        }
      }
    return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
  })
}); 