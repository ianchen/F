var done = false;
var questionnaire = function(restaurantNameList){
  $("#restaurant-name").autocomplete({
    source: restaurantNameList
  });
  $(".done-btn").click(function(event){
    $(event.currentTarget).parent().hide();
    if($(event.currentTarget).parent().hasClass("q2")){
      done = true;
    }
    if(!done){
      $(".q2").show();
      $(".percentage_txt").text("完成進度: 50%");
      $(".percentage_img").attr("src", "../compass/images/questionaire/percentage_02.png");
      if($(".question_current_bg").hasClass("question_1")){
        $(".question_current_bg").removeClass("question_current_bg").addClass("question_finished_bg");
        $(".question_top_bg").removeClass("question_top_bg").addClass("question_current_bg");
      }
    }
  });
  $(".btn_edit").click(function(event){
    var order = $(event.currentTarget).attr("order");
      $(".q1").hide();
      $(".q2").hide();
      $(".q" + order).show();
  });
  $("#group-date").datepicker({
    dateFormat: "yy-mm-dd"
    , beforeShowDay: function(date){
      var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
      return [true];
    }
  });
};

