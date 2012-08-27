<?php
#  session_start();
#  if(!$_SESSION["user-" . $_GET["uid"]] || !$_SESSION[$_GET["t"]]){
#    echo "permission denied";
#    exit();
#  }
#
$connect = mysql_connect("localhost", "root", "1234555");
$db = mysql_query("SET NAMES 'utf8'");
mysql_select_db("db_f");

$query = "SELECT * FROM `restaurant`";
$result = mysql_query($query);
$num = mysql_affected_rows();
$restaurantNameList = array();
for($i = 0; $i < $num; $i++){
  $restaurant = mysql_fetch_assoc($result);
  array_push($restaurantNameList, $restaurant["NAME"]); 
}

$query = "SELECT * FROM `group` where `GID` = {$_GET["gid"]}";
$result = mysql_query($query);
$num = mysql_affected_rows();
$group = mysql_fetch_assoc($result);
$rigthDays = array();
switch($group["CLASS"]){
case 0:
  break;
default:
  break;
}
#  exit(var_dump($group));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>下期團長問卷</title>
<link href="../compass/stylesheets/questionnaire.css" rel="stylesheet" type="text/css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.js"></script>
</head>

<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="600" align="center" valign="top" bgcolor="#efebe5" ><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" colspan="2" class="top_bg">&nbsp;</td>
        </tr>
      <tr>
        <td width="280" height="500" align="center" valign="top"><table width="280" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="240" height="70" class="question_finished_bg">下期餐廳資訊</td>
            <td width="40" align="left" valign="bottom" class="btn_edit_fix"><input name="btn_login" type="submit" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
          </tr>
          <tr>
            <td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            </tr>
<tr>
            <td height="70" class="question_finished_bg">下期出團資訊</td>
            <td width="40" align="left" valign="bottom" class="btn_edit_fix"><input name="btn_login" type="submit" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
          </tr>
          <tr>
            <td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            </tr>
          <tr>
            <td height="50" colspan="2" align="center" valign="bottom" class="percentage_txt">完成進度: 50%</td>
            </tr>
          <tr>
            <td height="30" colspan="2" align="center" valign="bottom"><img src="../compass/images/questionaire/percentage_02.png" width="139" height="26" /></td>
            </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            </tr>
        </table></td>
        <td width="520" height="500" align="left" valign="top" class="main_bg"><table width="460" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="450" align="left" valign="top">
              <div width="100%" height="440" marginwidth="0" #marginheight="0" align="left">
                <ul>
                  <li>店名: <input id="restaurant-name"></li>
                  <li>地址: <input id="restaurant-address-r"></li>
                  <li>電話: <input id="restaurant-phone"></li>
                </ul>
              </div>
              <div width="100%" height="440" marginwidth="0" #marginheight="0" align="left">
                <ul>
                  <li>出團日期: <input id="group-date"></li>
                  <li>出團人數: <input id="group-number"></li>
                  <li>預計金額: <input id="group-price"></li>
                  <li>推薦文章連結: <input id="group-url"></li>
                  <li>推薦ptt美食版文章: <input id="group-ptt"></li>
                  <li>ptt作者: <input id="group-author"></li>
                </ul>
              </div>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<script language="javascript">
$("#restaurant-name").autocomplete({
  source: <?php echo json_encode($restaurantNameList);?>
});
$("#group-date").datepicker({
  dateFormat: "yy-mm-dd"
    , beforeShowDay: function(date){
      var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
      if(m == 8 || d == 8){
        return [true];
      }
      return [false];
  }
});


</script>



</html>
