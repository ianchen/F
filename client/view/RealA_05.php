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
$title = $_GET['tw'];

$nextUrl = "user.php?uid=$uid&t=$t";
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
                <td height="180" align="left" valign="top" class="real_title_01"><p>5. 能簡單介紹一下會用這三個字形容本周生活的原因嗎?</p></td>
                </tr>
              <tr>
                <td height="200" align="center" valign="top"><p>
                  <label for="textfield"></label>
                  <label for="textarea"></label>
                  <textarea name="textarea" id="textarea" cols="50" rows="5"></textarea>                  
                  </p>
                  <p><img class="submit-btn" src="compass/images/Signup/btn_confirm.png" width="66" height="30" /></p></td>
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
  if("" !== $("#textarea").val()){
    $.ajax({
      url: "../../epi/insertMood.php",
        type: "post",
        dataType: "json",
        data: {
          uid: "<?php echo $uid;?>",
          content: $("#textarea").val(),
          title: "<?php echo $title;?>"
        },
        success: function(response){ 
          alert("報名成功,請回使用者頁面確認");
          window.location.replace("user?uid=<?php echo $uid;?>&t=<?php echo $t;?>");
        },
        error: function(response){
          alert("報名失敗,請稍後再試");
        }
    });

  }else{
    alert("不可為空白");
  }
});
</script>
</html>
