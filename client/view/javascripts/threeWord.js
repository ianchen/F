(function(){
  var refreshPage = function(){
    $(".controll-tr").hide();
    var page = $("#page").val();
    var tmp = 3*(page-1);
    $(".controll-" + tmp).show();
    tmp = 3*(page-1)+1;
    $(".controll-" + tmp).show();
    tmp = 3*(page-1)+2;
    $(".controll-" + tmp).show();
  };
  $("#first-page").click(function(){
    $("#page").val(1);
    refreshPage();
  });
  $("#pre-page").click(function(){
    var page = parseInt($("#page").val());
    if(page>0){
      $("#page").val(page-1);
      refreshPage();
    }
  });
  $("#next-page").click(function(){
    var page = parseInt($("#page").val());
    var maxPage = parseInt($("#maxPage").val());
    if(page<maxPage){
      $("#page").val(page+1);
      refreshPage();
    }
  });
  $("#last-page").click(function(){
    var maxPage = $("#maxPage").val();
    $("#page").val(maxPage);
    refreshPage();
  });

  refreshPage();
})();
