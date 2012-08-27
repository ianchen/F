<?php
session_start();
if(!$_SESSION["user-" . $_GET["uid"]] || !$_SESSION[$_GET["t"]]){
  echo "permission denied";
  exit();
}
require('config.php');

$uid = $_GET['uid'];
$t = $_GET['t'];

$signUpWait = false;
$signUpSuccess = false;
$signUpFail = false;
$beCaptain = false;
$questionnaire = false;

//check signup status
$query = "SELECT * FROM `signup` WHERE MEMBER = '$uid' AND STATUS = 'wait'";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $signUpWait = true;
}
$query = "SELECT * FROM `signup` WHERE MEMBER = '$uid' AND STATUS = 'success'";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $signUpSuccess = true;
}
$query = "SELECT * FROM `signup` WHERE MEMBER = '$uid' AND STATUS = 'fail'";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $signUpFail = true;
}
$query = "SELECT * FROM `group` WHERE CAPTAIN = '$uid' AND DATE(DATE) >= NOW()";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $beCaptain = true;
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>大F與一起吃飯的朋友-個人手札</title>
    <link href="../compass/stylesheets/user.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="content">
      <div class="nav">
        <img class="logo" src="../compass/images/common/Logo.png">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="../compass/images/common/menu_bg_blue.png"></td>
            <td></td>
            <td><img class="menu" src="../compass/images/common/menu_personal_02.png"></td>
            <td></td>
            <td><img class="menu" src="../compass/images/common/menu_gourmet_01.png"></td>
            <td></td>
            <td><img class="menu" src="../compass/images/common/menu_bigF_01.png"></td>
            <td></td>
            <td><img src="../compass/images/common/menu_bg_blue.png"></td>
          </tr>
          <tr>
            <td></td>
            <td><img src="../compass/images/common/menu_bg_green.png"></td>
            <td></td>
            <td><img src="../compass/images/common/menu_info_01.png"></td>
            <td></td>
            <td><img src="../compass/images/common/menu_bg_green.png"></td>
            <td></td>
            <td><img src="../compass/images/common/menu_bg_red.png"></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="title-bar"></div>
      <div class="account">
        <div class="nickname"></div>
        <div class="money"></div>
      </div>
      <div class="three-word">
        <div class="join-date"></div>
        <div class="go-time"></div>
        <div class="three-word-content"></div>
        <div class="more"></div>
      </div>
      <div class="status">
        <div class="status-images">
<?php
if($signUpWait){
  echo "<a href=\"signUpList.php?uid=$uid&t=$t\"><img src=\"../compass/images/common/note_icons/status_icon_03.gif\"></a>";
}
if($signUpSuccess){
  echo "<a href=\"signUpList.php?uid=$uid&t=$t\"><img src=\"../compass/images/common/note_icons/status_icon_04.gif\"></a>";
}
if($signUpFail){
  echo "<a href=\"signUpList.php?uid=$uid&t=$t\"><img src=\"../compass/images/common/note_icons/status_icon_01.gif\"></a>";
}
if($beCaptain){
  echo "<a href=\"captainListList.php?uid=$uid&t=$t\"><img src=\"../compass/images/common/note_icons/status_icon_02.gif\"></a>";
}
if($questionnaire){
  echo "<a href=\"questionnairList.php?uid=$uid&t=$t\"><img src=\"../compass/images/common/note_icons/status_icon_05.gif\"></a>";
}
?>
        </div>
      </div>
      <div class="introduce"></div>
      <div class="hobby"></div>
      <div class="photo"></div>
      <div class="talk"></div>
    </div>
  </body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type="text/javascript" src="../javascripts/user.js"></script>
</html>


