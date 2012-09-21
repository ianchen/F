(function(){
  $(".frame-img").click(function(event){
    var src = $(event.currentTarget).attr("url");
    $("#frame-inner-window").attr("src", src).show();
    $("#frame-window").show();
    $("#close-frame").show();
    $.blockUI({
      message: $("#frame-window")
      , css: {
        top: '30%' ,
        left: '45%' ,
        textAlign: 'left' ,
        marginLeft: '-320px' ,
        marginTop: '-145px' ,
        width: '858px' ,
        backgroundColor: 'white'
      }
    });
  });
  $("#close-frame").click(function(){
    $("#frame-inner-window").hide();
    $("#close-frame").hide();
    $("#frame-window").hide();
    $.unblockUI();
  });
})();
