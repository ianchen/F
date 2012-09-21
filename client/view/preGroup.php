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

$slogan = "";
$restaurantName = "";
$description = "";
$href = "RealA_01?gid={$_GET['gid']}&uid={$_GET['uid']}&t={$_GET['t']}";
//check signup status
$query = "SELECT g.*, r.NAME, r.ADDRESS_R, u.NICKNAME FROM `group` g, `restaurant` r, `user` u WHERE g.GID = '$gid' AND g.RID = r.RID AND u.AID = g.CAPTAIN";
#  exit(var_dump($query));
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $record = mysql_fetch_assoc($result);
  $restaurantName = $record['NAME'];
  $description = $record['DESCRIPTION'];
  $month = date("m", mktime($record['DATE']));
  $day = date("d", $record['DATE']);
  $week = date("D", $record['DATE']);
  $addr = $record['ADDRESS_R'];
  $captain = $record['NICKNAME'];
  $preNum = $record['PRE_NUM'];
  $prePrice = $record['PRE_PRICE'];
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
      <td height="50" align="left" valign="top" class="title"><?php echo $restaurantName;?></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top" class="title">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="middle_bg"><table width="640" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td height="22" align="left" valign="top" class="content_title"><?php echo "時間：{$record['DATE']}";?></td>
        </tr><tr>
        <td height="22" align="left" valign="top" class="content_title"><?php echo "地址：$addr";?></td>
        </tr><tr>
          <td height="60" align="left" valign="top" class="template_titlebg_red">詳細介紹</td>
        </tr>
        <tr>
        <td align="left" valign="top"  class="content_txt_01"><?php echo $description;?></td>
        </tr>
        <tr>
          <td height="60" align="left" valign="top" class="template_titlebg_red">網友推薦</td>
        </tr>
        <tr>
          <td align="left" valign="top"  class="content_txt_01">
            <p></p>
            <p></p>
            <p></p>
          </td>
        </tr>
        <tr>
          <td height="30" align="left" valign="top" class="dotline_01">&nbsp;</td>
        </tr>
        <tr>
        <td height="25" align="left" valign="middle" bgcolor="#EDE9E4" class="content_title"><?php echo "本次團長：$captain";?></td>
        </tr>
        <tr>
        <td height="22" align="left" valign="middle" bgcolor="#EDE9E4" class="content_title"><?php echo "人數：{$preNum}人";?></td>
        </tr>
        <tr>
        <td height="22" align="left" valign="middle" bgcolor="#EDE9E4" class="content_title"><?php echo "費用：約{$prePrice}元";?></td>
        </tr><tr>
        <td height="22" align="right" valign="middle" bgcolor="#EDE9E4" class="content_title"><a href="<?php echo $href;?>"> &gt;&gt;點我報名</a></td>
        </tr>
        <tr>
          <td height="30" align="left" valign="top" class="dotline_01">&nbsp;</td>
        </tr>
        <tr>
              <td height="30" align="left" valign="top" ></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" class="bottom_bg">&nbsp;</td>
  </tr>
</table>
</body>
</html>
