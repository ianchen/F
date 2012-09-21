<?php
session_start();
if(!$_SESSION["user-" . $_GET["uid"]] || !$_SESSION[$_GET["t"]]){
  echo "permission denied";
  exit();
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>大F與一起吃飯的朋友-小道消息</title>
    <link href="compass/stylesheets/Info.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="content">
      <div class="info-nav">
        <img class="logo" src="compass/images/common/Logo.png">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="compass/images/common/menu_bg_blue.png"></td>
            <td></td>
            <td><a href="user.php<?php echo "?t={$_GET['t']}&uid={$_GET['uid']}";?>"><img class="menu" src="compass/images/common/menu_personal_01.png"></a></td>
            <td></td>
            <td><img class="menu" src="compass/images/common/menu_gourmet_01.png"></td>
            <td></td>
            <td><a href="http://122.248.219.96/BigF_fixmenu.php<?php echo "?t={$_GET['t']}&uid={$_GET['uid']}";?>"><img class="menu" src="compass/images/common/menu_bigF_01.png"></a></td>
            <td></td>
            <td><img src="compass/images/common/menu_bg_blue.png"></td>
          </tr>
          <tr>
            <td></td>
            <td><img src="compass/images/common/menu_bg_green.png"></td>
            <td></td>
            <td><a href="InfoNew.php<?php echo "?t={$_GET['t']}&uid={$_GET['uid']}";?>"><img src="compass/images/common/menu_info_02.png"></a></td>
            <td></td>
            <td><img src="compass/images/common/menu_bg_green.png"></td>
            <td></td>
            <td><a href="http://122.248.219.96/Cook_fixmenu.php<?php echo "?t={$_GET['t']}&uid={$_GET['uid']}";?>"><img class="menu" src="compass/images/common/menu_cook_01.png"></a></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div id="frame-window">
        <button id="close-frame">X</button>
        <iframe id="frame-inner-window" width="858" height="750" marginwidth="0" #marginheight="0" scrolling="yes" frameborder="0"></iframe>
      </div>

      <div class="calendar">
        <div class="calendar-top">
          <img class="cal-hot-text" src="compass/images/Info/cal_hot_pix.gif">
        </div>
        <div class="calendar-selector">
          <img id="cal-pre-month" src="compass/images/Info/cal_month_btn_last.png">
          <span id="cal-year"></span>
          <span id="cal-month"></span>
          <img id="cal-next-month" src="compass/images/Info/cal_month_btn_next.png">
        </div>
        <div class="calendar-body">
          <table class="calendar-table" cellpadding="0" cellspacing="0">
            <thead>
              <tr>
                <td>SUN</td>
                <td>MON</td>
                <td>TUE</td>
                <td>WED</td>
                <td>THU</td>
                <td>FRI</td>
                <td>SAT</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>
              <tr>
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>                                               
              <tr>                                                
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>                                               
              <tr>                                                
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>                                               
              <tr>                                                
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>                                               
              <tr>                                                
                <td class="sun-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="mon-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="tue-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="wed-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="thu-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="fri-col"><span class="day-mark"></span><div class="day-content"></div></td>
                <td class="sat-col"><span class="day-mark"></span><div class="day-content"></div></td>
              </tr>
            </tbody>
          </table>
          <img src="compass/images/Info/info_cal_bottom_bg.png">
        </div>
        <div class="calendar-bottom">
          <img src="compass/images/Info/info_monthlyevent_bg_top.png">
          <img src="compass/images/Info/info_monthlyevent_bg_bottom.png">
        </div>
      </div>
    </div>    
  </body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type="text/javascript" src="javascripts/jquery.url.js"></script>
  <script type="text/javascript" src="javascripts/jquery.blockUI.js"></script>
  <script type="text/javascript" src="javascripts/Info.js"></script>
</html>
