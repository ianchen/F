<?php
$connect = mysql_connect("localhost", "root", "1234555");
$db = mysql_query("SET NAMES 'utf8'");
mysql_select_db("db_f");

$query = "SELECT * FROM `group` WHERE YEAR(DATE) = \"{$_GET["year"]}\" AND MONTH(DATE) = " . (int)$_GET["month"];
$result = mysql_query($query);
$num = mysql_affected_rows();
$response = array(
  "year" => $_GET["year"],
  "month" => $_GET["month"],
  "groups" => array()
);
for($i = 0; $i < $num; $i++){
  $group = mysql_fetch_assoc($result);
  $d = explode("-", $group["DATE"]);
  array_push($response["groups"], array(
    "date" => $d[2],
    "gid" => $group['GID']
  )); 
}

echo json_encode($response);
#  
#  echo json_encode(array(
#    "year" => $_GET["year"],
#    "month" => $_GET["month"],
#    "groups" => array(
#      array("date" => "3", "link" => "myLink1"),
#      array("date" => "12", "link" => "myLink2"),
#      array("date" => "15", "link" => "myLink3"),
#      array("date" => "23", "link" => "myLink4"),
#      array("date" => "26", "link" => "myLink5"),
#      array("date" => "30", "link" => "myLink6")
#    )
#  ));
#  
?>
