<?php
session_start();
if(!$_SESSION["user-" . $_GET["uid"]] || !$_SESSION[$_GET["t"]]){
  echo "permission denied";
  exit();
}
require('config.php');

$uid = $_GET['uid'];
$t = $_GET['t'];
$gid = $_GET['gid'];

function getGroupInfoByGid($gid){
  $query = "SELECT * FROM `group` WHERE GID = $gid";
  $result = mysql_query($query);
  return mysql_fetch_assoc($result);
 }

function getRestaurantInfoByGid($gid){
  $query = "SELECT * FROM `group` WHERE GID = $gid";
  $result = mysql_query($query);
  $groupInfo = mysql_fetch_assoc($result);
  $query = "SELECT * FROM `restaurant` WHERE RID = {$groupInfo['RID']}";
  $result = mysql_query($query);
  return mysql_fetch_assoc($result);
}

function switchName($uid){
  $query = "SELECT * FROM `user` WHERE AID = $uid";
  $result = mysql_query($query);
  $userInfo = mysql_fetch_assoc($result);
  return $userInfo['NICKNAME'];
}

function pickThreeWord($uid){
  $query = "SELECT * FROM `three_word` WHERE AID = $uid ORDER BY DATE DESC";
  $result = mysql_query($query);
  $threeWordInfo = mysql_fetch_assoc($result);
  return $threeWordInfo;
}

function pickOthers($gid, $uid){
  $others = array();
  $query = "SELECT * FROM `signup` WHERE `GROUP` = $gid AND `MEMBER` != $uid AND `STATUS` = 'success'";
  $result = mysql_query($query);
  if(0 !== ($n = mysql_affected_rows()) && mysql_affected_rows()){
    for($i = 0; $i < $n; $i++){
      $signupInfo = mysql_fetch_assoc($result);
      array_push($others, $signupInfo['MEMBER']);
    }
  }
  return $others;

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="compass/stylesheets/template.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="856" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="200" align="center" valign="bottom" class="top_bg"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="50" align="left" valign="top" class="title">詳細內容</td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top" class="title">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="middle_bg">
      <div style="width: 660px; height: 450px; overflow: scroll;">
        <table width="640" border="0" cellspacing="0" cellpadding="0">
<?php
$groupInfo = getGroupInfoByGid($gid);
$restaurantInfo = getRestaurantInfoByGid($gid);
$captain = switchName($groupInfo['CAPTAIN']);
$myThreeWord = pickThreeWord($uid);
$others = pickOthers($gid, $uid);
$othersThreeWord = array();
for($i = 0; $i < count($others); $i++){
  array_push($othersThreeWord, pickThreeWord($others[$i]));
}
echo "<tr>";
echo "<td height=\"60\" align=\"left\" valign=\"top\" class=\"template_titlebg_red\">";
echo $restaurantInfo['NAME'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">距離出團時間還有";
$d = (int)abs((strtotime($groupInfo["DATE"]) - strtotime('now'))/86400);
echo $d;
echo "天</td>";
echo "</tr>";

echo "<tr>";
echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">時間：{$groupInfo["DATE"]}</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">地點：{$restaurantInfo["ADDRESS_R"]}</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">用餐預算：{$groupInfo['PRE_PRICE']}元</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">集合地點：該店門口</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">定位姓名：于先生{$groupInfo['NUMBER']}位</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">聯絡電話：0937892119</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">出席名單：</td>";
echo "</tr>";
for($i = 0; $i < count($others); $i++){
  echo "<tr>";
  echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">";
  echo switchName($others[$i]);
  echo "--";
  $tw = pickThreeWord($others[$i]);
  echo $tw['TITLE'];
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">";
  echo $tw['CONTENT'];
  echo "</td>";
  echo "</tr>";
}
echo "<tr>";
echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">本週特選話題：</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">1. {$groupInfo['TALK1']}</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">2. {$groupInfo['TALK2']}</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">3. {$groupInfo['TALK3']}</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<td height=\"30\" align=\"left\" valign=\"top\" ></td>";
echo "</tr>";
?>
    </table>
</div>
</td>
  </tr>

  <tr>
    <td height="50" class="bottom_bg">&nbsp;</td>
  </tr>
</table>
</body>
</html>
