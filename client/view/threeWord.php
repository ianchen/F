<?php
session_start();
if(!$_SESSION["user-" . $_GET["uid"]] || !$_SESSION[$_GET["t"]]){
  echo "permission denied";
  exit();
}
require('config.php');

$uid = $_GET['uid'];
$t = $_GET['t'];
$threeWord = array();
$query = "SELECT * FROM `three_word` WHERE `AID` = $uid ORDER BY `DATE` DESC";
#  exit(var_dump($query));
$result = mysql_query($query);
if(0 !== ($n = mysql_affected_rows()) && mysql_affected_rows()){
  for($i = 0; $i < $n; $i++){
    array_push($threeWord, mysql_fetch_assoc($result));
  }
}

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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="compass/stylesheets/template.css" rel="stylesheet" type="text/css">
<link href="compass/stylesheets/threeWord.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="856" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="200" align="center" valign="bottom" class="top_bg"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td height="50" align="left" valign="top" class="title">我的三個字</td>
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
for($i = 0; $i < count($threeWord); $i++){
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"60\" align=\"left\" valign=\"top\" class=\"template_titlebg_red\">";
  echo $threeWord[$i]['TITLE'];
  echo "</td>";
  echo "</tr>";
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
  echo "</tr>";
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"25\" align=\"left\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">{$threeWord[$i]["CONTENT"]}</td>";
  echo "</tr>";
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"22\" align=\"right\" valign=\"middle\" bgcolor=\"#EDE9E4\" class=\"content_title\">";
  echo "<span>{$threeWord[$i]["DATE"]}</spana>";
  echo "</td>";
  echo "</tr>";
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"30\" align=\"left\" valign=\"top\" class=\"dotline_01\">&nbsp;</td>";
  echo "</tr>";
  echo "<tr class=\"controll-tr controll-$i\">";
  echo "<td height=\"30\" align=\"left\" valign=\"top\" ></td>";
  echo "</tr>";
}
if(0 === count($threeWord)%3){
  $maxPage = count($threeWord)/3;
}else{
  $maxPage = (count($threeWord)/3) + 1;
}
?>
      <tr>
        <td>
          <button id="first-page">最前頁</button> 
          <button id="pre-page">前一頁</button>
          <button id="next-page">後一頁</button>
          <button id="last-page">最後頁</button>
        </td>

      </tr>
    </table>
</div>
</td>
  </tr>

  <tr>
    <td height="50" class="bottom_bg">&nbsp;</td>
  </tr>
</table>
<input type="hidden" value="1" id="page">
<input type="hidden" value="<?php echo "$maxPage";?>" id="maxPage">
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type="text/javascript" src="javascripts/threeWord.js"></script>
</html>
