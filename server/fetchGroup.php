<?php
require("config.php");
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
  
?>
