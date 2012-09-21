(function(){
  $(".frame-img").click(function(event){
    var src = $(event.currentTarget).attr("url");
    $("#frame-inner-window").attr("src", src).show();
    $("#frame-window")
    .modal('show')
    .css({
      width: 'auto',
      'margin-top': '-360px',
      'margin-left': function () {
        return -($(this).width() / 2);
      }
    });
  });
  $("#close-frame").click(function(){
    $("#frame-window").modal('hide');
  });
})();
