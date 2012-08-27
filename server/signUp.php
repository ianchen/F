<?php
require("config.php");
$now = date("Y-m-d H:i:s");
$query = "INSERT INTO  `db_f`.`signup` (`GROUP`, `MEMBER`, `TALK`, `SIGNTIME`) VALUES ('{$_POST['gid']}',  '{$_POST['uid']}',  '{$_POST['content']}',  '$now');";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  echo json_encode(array(
    "success" => true
  )); 
  header("success", true, 200);
  exit();
}else{
  echo json_encode(array(
    "success" => false
  ));
  header("fail", true, 404);
  exit();
}
?>
