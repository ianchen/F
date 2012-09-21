var infoGlobal = {
  dayMap: ["sun", "mon", "tue", "wed", "thu", "fri", "sat"],
  //initial the date
  initDate : function(){
               var now = new Date();
               infoGlobal.year = now.getFullYear();
               infoGlobal.month = now.getMonth()+1;
               infoGlobal.changeSelectorText(infoGlobal.year, infoGlobal.month);
             },

  //ajax of fetch groups of month
  fetchGroup : function(year, month){
                 $.ajax({
                   url: "../Fpi/fetchGroup.php?year=" + year + "&month=" + month,
                   type: "GET",
                   dataType: "json",
                   error: function(){
                     alert("伺服器錯誤,請稍後再試.");
                   },
                   success: function(response){
                              infoGlobal.renderGroups(response.year, response.month, response.groups);
                            }
                 });
               },
  //render groups calendar
  renderGroups : function(year, month, groups){
                   var dateCounter = new Date();
                   dateCounter.setFullYear(year);
                   if(0 === parseInt(month)){
                     month = month[1];
                   }
                   dateCounter.setMonth(parseInt(month) - 1);
                   dateCounter.setDate(1);
                   var firstDay = dateCounter.getDay();
                   for(var i = 0; i < groups.length; i++){
                     dateCounter.setDate(parseInt(groups[i].date));
                     var week = parseInt((parseInt(groups[i].date) - 1 + firstDay)/7);
                     $($(".calendar-table > tbody > tr")[week])
                       .find("." + infoGlobal.dayMap[dateCounter.getDay()] +"-col")
                       .find(".day-content").append("<button url=\"preGroup.php?gid=" + groups[i].gid 
                           + "&uid=" + $.url.param("uid")
                           + "&t=" + $.url.param("t")
                           + "\" class=\"frame-btn\" target=\"_blank\">前往報名</button>");
                   }
                   $(".frame-btn").click(function(event){
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

                 },
  //change the date selector text
  changeSelectorText : function(year, month){
                         if(month < 10){
                           month = "0" + month.toString();
                         }else{
                           month = month.toString();
                         }
                         $('#cal-year').text(year);
                         $('#cal-month').text(month);
                         infoGlobal.initCalendar(year, month);
                       },
  initCalendar: function(year, month){
                  $(".calendar-table > tbody > tr > td > .day-mark").empty();
                  $(".calendar-table > tbody > tr > td > .day-content").empty();
                  var dateCounter = new Date();
                    dateCounter.setFullYear(year);
                    if(0 === parseInt(month)){
                      month = month[1];
                    }
                    dateCounter.setMonth(parseInt(month) - 1);
                  var weekCounter = 0, nowDay;
                  for(var dayCounter = 1; dayCounter < 32; dayCounter++){
                    dateCounter.setDate(dayCounter);
                    if(parseInt(month) !== dateCounter.getMonth() + 1){
                      break;
                    }else{
                      if(0 === dateCounter.getDay() && 1 !== dayCounter){
                        weekCounter++;
                      }
                      $($(".calendar-table > tbody > tr")[weekCounter])
                        .find("." + infoGlobal.dayMap[dateCounter.getDay()] +"-col").find(".day-mark").text(dayCounter);
                    }
                  }
                  for(var exceedWeek = 0; exceedWeek < 6; exceedWeek++){
                    if(exceedWeek > weekCounter){
                      $($(".calendar-table > tbody > tr")[exceedWeek]).hide();
                    }else{
                      $($(".calendar-table > tbody > tr")[exceedWeek]).show();
                    }
                  }
                }
};

//initial the page
(function(){
  //initial the date
  infoGlobal.initDate();

  //initial the navigation
  $(".menu").mouseover(function(event){
    var src = $(event.currentTarget).attr("src").replace("01", "02");
    $(event.currentTarget).attr("src", src);
  });
  $(".menu").mouseout(function(event){
    var src = $(event.currentTarget).attr("src").replace("02", "01");
    $(event.currentTarget).attr("src", src);
  });

  //event of click the calendar selector
  $("#cal-pre-month").click(function(){
    if(1 === infoGlobal.month){
      infoGlobal.year--;
      infoGlobal.month = 12;
    }else{
      infoGlobal.month--;
    }
    infoGlobal.changeSelectorText(infoGlobal.year, infoGlobal.month);
    infoGlobal.fetchGroup(infoGlobal.year, infoGlobal.month);
  });
  $("#cal-next-month").click(function(){
    if(12 === infoGlobal.month){
      infoGlobal.year++;
      infoGlobal.month = 1;
    }else{
      infoGlobal.month++;
    }
    infoGlobal.changeSelectorText(infoGlobal.year, infoGlobal.month);
    infoGlobal.fetchGroup(infoGlobal.year, infoGlobal.month);
  });
})();
















