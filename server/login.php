<?php
session_start();
require("config.php");
$query = "SELECT * FROM `user` WHERE ACCOUNT = \"{$_POST["a"]}\" AND PWD = \"{$_POST["p"]}\"";
$result = mysql_query($query);
if(0 !== mysql_affected_rows() && mysql_affected_rows()){
  $user = mysql_fetch_assoc($result);
  $token = uniqid(); 
  $_SESSION["user-" . $user["AID"]] = true;
  $_SESSION[$token] = true;
  echo json_encode(array(
    "success" => true,
    "uid" => $user["AID"],
    "first" => $user["first"],
    "token" => $token
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
