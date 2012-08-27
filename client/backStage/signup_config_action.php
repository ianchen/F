<?php
require('config.php');
foreach($_POST as $key => $value)
{
  $query = "UPDATE `signup_config` SET  `$key` =  '$value' WHERE `scid` =1";
  $record = mysql_query($query) or die(mysql_error());
}
//var_dump($_POST);
?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>      
    <form id="form1" name="form1" action="signup_config.php" method="GET">
    </form>
  </body>
<script language="javascript">
setTimeout('document.form1.submit();',500);
</script>
</html>
