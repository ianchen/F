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

$order = "03";
$nextUrl = "RealA_{$order}.php?uid=$uid&t=$t&gid=$gid";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一般活動報名</title>
<link href="compass/stylesheets/signupA.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="600" align="center" valign="top" bgcolor="#f5f4f2" ><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" class="top_bg">&nbsp;</td>
        </tr>
      <tr>
        <td height="500" align="center" valign="top"><table width="716" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="385" align="center" valign="bottom" class="main_bg_03"><table width="550" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="200" colspan="2" align="left" valign="top" class="question_title_01">2. 報名這次的吃飯團將會暫時扣除您吃飯金10元，您確定要報名嗎?</td>
                </tr>
              <tr>
              <td width="275" height="150" align="center" valign="top"><a href="<?php echo $nextUrl;?>"><img src="compass/images/Signup/btn_confirm_02.png" width="66" height="30" /></a></td>
                <td width="275" align="center" valign="top"><a href="#"><img src="compass/images/Signup/btn_deny.png" width="66" height="30" /></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
