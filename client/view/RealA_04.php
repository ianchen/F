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

$order = "05";
$nextUrl = "RealA_{$order}.php?uid=$uid&t=$t&gid=$gid";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一般活動報名</title>
<link href="../compass/stylesheets/signupA.css" rel="stylesheet" type="text/css">
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
                <td height="200" align="left" valign="top" class="real_title_01"><p>4. 能否用三個字形容您最近這一個禮拜的生活</p></td>
                </tr>
              <tr>
                <td height="50" align="center" valign="top"><label for="textfield"></label>
                  <form name="myForm" method='get' action="<?php echo $nextUrl;?>">
                  <input type="hidden" name="uid" value="<?php echo $uid;?>">
                  <input type="hidden" name="t" value="<?php echo $t;?>">
                  <input type="hidden" name="gid" value="<?php echo $gid;?>">
                    <input name="tw" type="text" class="real_txtbox_01" id="textfield" /> 
                  　<img class="submit-btn" src="../compass/images/Signup/btn_confirm.png" width="66" height="30" />
                  </form>
                  </td>
                </tr>
              <tr>
                <td height="100" align="center" valign="top">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script language="javascript">
$(".submit-btn").click(function(){
  if("" !== $(".real_txtbox_01").val()){
    document.myForm.action += "&title=" + $(".real_txtbox_01").val();
    document.myForm.submit();
  }else{
    alert("不可為空白");
  }
});
</script>
</html>
