<?php
require("config.php");
$now = date("Y-m-d");
$query = "INSERT INTO  `db_f`.`three_word` (`TWID` ,`AID` ,`TITLE` ,`CONTENT` ,`DATE`) VALUES (NULL ,  '{$_POST['uid']}',  '{$_POST['title']}',  '{$_POST['content']}',  '$now');";
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
