<?php
session_start();
require("config.php");

$p = $_POST['p'];
$introduce = $_POST['introduce'];
$interests = implode(";", $_POST['interests']);
$query = "update `user` set `PWD`='$p', `HABIT`='$interests', `INTRODUCTION`='$introduce', `first`=0 WHERE `AID` = '{$_POST["uid"]}'";
$result = mysql_query($query);
echo json_encode(array(
  "success" => true
  , "query" => $query
));
header("success", true, 200);
exit();
?>
