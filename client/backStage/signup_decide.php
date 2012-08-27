<?php
require('config.php');
$query = "SELECT * FROM `signup_config` WHERE scid = '1'";
$record = mysql_query($query) or die(mysql_error());
$config = mysql_fetch_assoc($record);

$query = "SELECT * FROM `signup` WHERE `GROUP` = '$_GET[GID]' ORDER BY `SIGNTIME` ASC";
$signup_record = mysql_query($query) or die(mysql_error());
$signup_num = mysql_num_rows($signup_record);	
$signup = array();
for($i = 0; $i < $signup_num; $i++)
{
  array_push($signup, mysql_fetch_assoc($signup_record));
}
$query = "SELECT * FROM `group` WHERE `GID` = '$_GET[GID]'";
$group_record = mysql_query($query) or die(mysql_error());
$group = mysql_fetch_assoc($group_record);

//判斷忙人
function check_b($member, $config, $gender)
{
  $query = "SELECT * FROM `signup` WHERE `MEMBER` = '$member' AND TO_DAYS(NOW()) - TO_DAYS(SIGNTIME) <= $config[b_num_3]";
  $record = mysql_query($query) or die(mysql_error());
  $num1 = mysql_num_rows($record);	
  if($num1 >= $config['b_num_4'])
  {
    $query = "SELECT * FROM `user` WHERE `AID` = '$member' AND `GENDER` = '$gender'";
    $record = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($record);	
    if(0 != $num) return true;
  }

  $query = "SELECT * FROM `group` WHERE TO_DAYS(NOW()) - TO_DAYS(DATE) <= $config[b_num_1]";
  $record = mysql_query($query) or die(mysql_error());
  $g_num = mysql_num_rows($record);	
  $count = 0;
  for($i = 0; $i < $g_num; $i++)
  {
    $tmp = mysql_fetch_assoc($record);
    $tmp_arr = explode(";", $member);
    if(in_array($member, $tmp_arr)) $count++;
  }
  if($count >= $config['b_num_2'])
  {
    $query = "SELECT * FROM `user` WHERE `AID` = '$member' AND `GENDER` = '$gender'";
    $record = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($record);	
    if(0 != $num) return true;
  }

  return false;
}	
//判斷新人
function check_n($member, $config, $gender)
{
  $query = "SELECT * FROM `group`";
  $record = mysql_query($query) or die(mysql_error());
  $g_num = mysql_num_rows($record);	
  $count = 0;
  for($i = 0; $i < $g_num; $i++)
  {
    $tmp = mysql_fetch_assoc($record);
    $tmp_arr = explode(";", $member);
    if(in_array($member, $tmp_arr)) $count++;
  }
  if($count < $config['n_num'])
  {
    $query = "SELECT * FROM `user` WHERE `AID` = '$member' AND `GENDER` = '$gender'";
    $record = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($record);	
    if(0 != $num) return true;
  }
  return false;
}
//判斷中人
function check_m($member, $config, $gender)
{
  $query = "SELECT * FROM `group`";
  $record = mysql_query($query) or die(mysql_error());
  $g_num = mysql_num_rows($record);	
  $count = 0;
  for($i = 0; $i < $g_num; $i++)
  {
    $tmp = mysql_fetch_assoc($record);
    $tmp_arr = explode(";", $member);
    if(in_array($member, $tmp_arr)) $count++;
  }
  if($count >= $config['m_num'] && $count < $config['o_num'])
  {
    $query = "SELECT * FROM `user` WHERE `AID` = '$member' AND `GENDER` = '$gender'";
    $record = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($record);	
    if(0 != $num) return true;
  }
  return false;
}
//判斷老人
function check_o($member, $config, $gender)
{
  $query = "SELECT * FROM `group`";
  $record = mysql_query($query) or die(mysql_error());
  $g_num = mysql_num_rows($record);	
  $count = 0;
  for($i = 0; $i < $g_num; $i++)
  {
    $tmp = mysql_fetch_assoc($record);
    $tmp_arr = explode(";", $member);
    if(in_array($member, $tmp_arr)) $count++;
  }
  if($count >= $config['o_num'])
  {
    $query = "SELECT * FROM `user` WHERE `AID` = '$member' AND `GENDER` = '$gender'";
    $record = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($record);	
    if(0 != $num) return true;
  }
  return false;
}
if(4 == $group['PRE_NUM']) $type = '0';
else if(6 == $group['PRE_NUM']) $type = '1';
else if(8 == $group['PRE_NUM']) $type = '2';
else if(10 == $group['PRE_NUM']) $type = '3';
else if(12 == $group['PRE_NUM']) $type = '4';
else if(14 == $group['PRE_NUM']) $type = '5';
$memberClass = array(
  "normal" => array(
    array(),
    array(),
    array(),
    array(),
    array(),
    array()
  ),
  "busy" => array(
    array(),
    array(),
    array(),
    array(),
    array(),
    array()
  )
);

foreach($signup as $key => $value)
{
  if(check_b($value['MEMBER'], $config, 'M'))
  {
    if(check_n($value['MEMBER'], $config, 'M')) array_push($memberClass["busy"][0], $value['MEMBER']);
    else if(check_m($value['MEMBER'], $config, 'M')) array_push($memberClass["busy"][1], $value['MEMBER']);
    else if(check_o($value['MEMBER'], $config, 'M')) array_push($memberClass["busy"][2], $value['MEMBER']);
  }
  else if(check_b($value['MEMBER'], $config, 'F'))
  {
    if(check_n($value['MEMBER'], $config, 'F')) array_push($memberClass["busy"][3], $value['MEMBER']);
    else if(check_m($value['MEMBER'], $config, 'F')) array_push($memberClass["busy"][4], $value['MEMBER']);
    else if(check_o($value['MEMBER'], $config, 'F')) array_push($memberClass["busy"][5], $value['MEMBER']);
  }
  else if(check_n($value['MEMBER'], $config, 'M')) array_push($memberClass["normal"][0], $value['MEMBER']);
  else if(check_n($value['MEMBER'], $config, 'F')) array_push($memberClass["normal"][3], $value['MEMBER']);
  else if(check_m($value['MEMBER'], $config, 'M')) array_push($memberClass["normal"][1], $value['MEMBER']);
  else if(check_m($value['MEMBER'], $config, 'F')) array_push($memberClass["normal"][4], $value['MEMBER']);
  else if(check_o($value['MEMBER'], $config, 'M')) array_push($memberClass["normal"][2], $value['MEMBER']);
  else if(check_o($value['MEMBER'], $config, 'F')) array_push($memberClass["normal"][5], $value['MEMBER']);
}

//hard code
$priority = array(
  array(
    array(4,2,5,3,6),
    array(1,4,5,3,6),
    array(2,5,6),
    array(5,6,3),
    array(6,2),
    array(5,3)
  ),
  array(
    array(4,2,5,3,6),
    array(1,4,5,3,6),
    array(2,5,6),
    array(1,2,5,3,6),
    array(2,3,6),
    array(3,2,5)
  )
);

$memberClassBackup = $memberClass;
$done = false;
$fail = false;
while(!$done && !$fail)
{	
  $ok = array();
  $memberClass = $memberClassBackup;
  $mNum = 0;
  $fNum = 0;
  $lack = array();
  for($i = 0; $i < 6; $i++)
    $lack[$i] = (int)$config['dist_' . $type . '_' . $i];
  //先盡量放
  for($i = 0; $i < 6; $i++)
  {
    while(0 !== count($memberClass["normal"][$i]) && 0 !== $lack[$i])
    {
      array_push($ok, array_shift($memberClass["normal"][$i]));
      $lack[$i]--;
      if(1 === ($i%2)) $fNum++;
      else $mNum++;
    }
  }
  //沒滿的補人
  $over = false;
  $crash = false;
  while(!$over && !$crash)
  {
    for($i = 0; $i < 6; $i++)
    {
      if(0 !== $lack[$i])
      {
        $gotIt = false;
        while(!$gotIt && !$crash)
        {
          if(1 === ($i%2))
          {
            $p = 1;
            if($mNum >= $fNum) $p = 0;
          }
          else
          {
            $p = 1;
            if($mNum < $fNum) $p = 0;
          }
          for($j = 0; $j < count($priority[$p][$i]); $j++)
          {
            if(0 !== count($memberClass["normal"][$priority[$p][$i][$j]-1]))
            {
              array_push($ok, array_shift($memberClass["normal"][$priority[$p][$i][$j]-1]));
              $lack[$i]--;
              if(2 < ($priority[$p][$i][$j]-1)) $fNum++;
              else $mNum++;
              $gotIt = true;
              break;
            }
            //都沒補到,補忙人
            if($j === count($priority[$p][$i]) - 1) 
            {
              for($k = 0; $k < count($priority[$p][$i]); $k++)
              {
                if(0 !== count($memberClass["busy"][$priority[$p][$i][$k]-1]))
                {
                  array_push($ok, array_shift($memberClass["busy"][$priority[$p][$i][$k]-1]));

                  $lack[$i]--;
                  if(2 < ($priority[$p][$i][$j]-1)) $fNum++;
                  else $mNum++;
                  $gotIt = true;
                  break;
                }
                if($k === count($priority[$p][$i]) - 1)
                {
                  $crash = true;
                  if($type != 0 ) $type--;
                  else $fail = true;
                }
              }
            }
          }
        }
        break;		
      }				
      if($crash)
      {
        break;
      }
      if(5 === $i) 
      {
        if(checkCrash($type, $mNum, $fNum, $ok, $memberClassBackup))
        {
          $crash = true;
          if($type != 0 ) $type--;
          else $fail = true;
          break;
        }
        $over = true;
        $done = true;
      }		
    }
  }
}

function switchName($id)
{
  $query = "SELECT `NICKNAME` FROM `user` WHERE `AID` = '$id'";
  $result = mysql_query($query);
  $record = mysql_fetch_assoc($result);
  return $record["NICKNAME"];
}

function checkCrash($type, $mNum, $fNum, $ok, $memberClass)
{
  $busy = 0;
  foreach($ok as $key => $value)
  {
    foreach($memberClass["busy"] as $key2 => $value2)
    {
      if(in_array($value, $value2))
      {
        $busy++;
        break;
      }
    }
  }
  $genderDiff = abs((int)($mNum-$fNum));
  if(0 == $type)
  {
    if($busy>=2 || $genderDiff > 3)
    {
      return true;
    }
  }
  else if(1 == $type)
  {
    if($busy>=3 || $genderDiff > 3)
    {
      return true;
    }
  }
  else if(2 == $type)
  {
    if($busy>=3 || $genderDiff > 5)
    {
      return true;
    }
  }
  else if(3 == $type)
  {
    if($busy>=4 || $genderDiff > 5)
    {
      return true;
    }
  }
  else if(4 == $type)
  {
    if($busy>=5 || $genderDiff > 5)
    {
      return true;
    }
  }
  else if(5 == $type)
  {
    if($busy>=5 || $genderDiff > 5)
    {
      return true;
    }
  }
  return false;
}	

$final = array();
foreach($memberClassBackup as $key => $value)
{
  foreach($value as $key2 => $value2)
  {
    foreach($value2 as $key3 => $value3)
    {
      $tmp = array("id" => $value3, "admit" => false, "busy" => false, "gender" => "F", "age" => "old");
      if(in_array($value3, $ok))
      {
        $tmp["admit"] = true;
      }
      if("busy" === $key)
      {
        $tmp["busy"] = true;
      }
      if(3 > (int)$key2)
      {
        $tmp["gender"] = "M";

      }
      if(0 === (int)$key2 || 3 === (int)$key2)
      {
        $tmp["age"] = "new";
      }
      else if(1 === (int)$key2 || 4 === (int)$key2)
      {
        $tmp["age"] = "middle";
      }	
      array_push($final, $tmp);
    }
  }
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>錄取</title>
<style type="text/css">
.no { 
  color:blue;
}
.yes { 
  color:red;
}

</style>


</head>
<body>
<form name="form1" method="post" action="signup_real_decide.php">
<?php
if(!$fail)
{
?>
  <h3>建議錄取名單</h3>
  <table rules="all">
  <tr>
    <td width="50px">id</td>
    <td width="120px">暱稱</td>
    <td width="50px">性別</td>
    <td width="50px">資歷</td>
    <td width="50px">忙人</td>
    <td width="50px">確定錄取</td>
  </tr>
<?php
  foreach($final as $key => $value)
  {
    if($value["admit"])
    {
      echo "<tr>";
      echo "<td>{$value['id']}</td>";
      echo "<td>" . switchName($value["id"]) . "</td>";
      echo "<td>{$value['gender']}</td>";
      echo "<td><span class=\"{$value['age']}\">{$value['age']}</span></td>";
      if($value["busy"])
      {
        echo "<td><span class=\"yes\">是</span></td>";
      }
      else
      {
        echo "<td><span class=\"no\">否</span></td>";
      }
      echo "<td><input type=\"checkbox\" value=\"{$value['id']}\" name=\"list[]\" checked=true></td>";
      echo "</tr>	";
    }
  }
?>
  </table>

  <h3>建議候補名單</h3>
  <table rules="all">
  <tr>
    <td width="50px">id</td>
    <td width="120px">暱稱</td>
    <td width="50px">性別</td>
    <td width="50px">資歷</td>
    <td width="50px">忙人</td>
    <td width="50px">確定錄取</td>
  </tr>
<?php
  foreach($final as $key => $value)
  {
    if(!$value["admit"])
    {
      echo "<tr>";
      echo "<td>{$value['id']}</td>";
      echo "<td>" . switchName($value["id"]) . "</td>";
      echo "<td>{$value['gender']}</td>";
      echo "<td><span class=\"{$value['age']}\">{$value['age']}</span></td>";
      if($value["busy"])
      {
        echo "<td><span class=\"yes\">是</span></td>";
      }
      else
      {
        echo "<td><span class=\"no\">否</span></td>";
      }
      echo "<td><input type=\"checkbox\" value=\"{$value['id']}\" name=\"list[]\"></td>";
      echo "</tr>	";
    }
  }
?>
  </table>
<?php
}
else
{ 
  echo "<h1>fail!</h1>";
?>
  <h3>建議候補名單</h3>
  <table rules="all">
  <tr>
    <td width="50px">id</td>
    <td width="120px">暱稱</td>
    <td width="50px">性別</td>
    <td width="50px">資歷</td>
    <td width="50px">忙人</td>
    <td width="50px">確定錄取</td>
  </tr>
<?php
  foreach($final as $key => $value)
  {
    echo "<tr>";
    echo "<td>{$value['id']}</td>";
    echo "<td>" . switchName($value["id"]) . "</td>";
    echo "<td>{$value['gender']}</td>";
    echo "<td><span class=\"{$value['age']}\">{$value['age']}</span></td>";
    if($value["busy"])
    {
      echo "<td><span class=\"yes\">是</span></td>";
    }
    else
    {
      echo "<td><span class=\"no\">否</span></td>";
    }
    echo "<td><input type=\"checkbox\" value=\"{$value['id']}\" name=\"list[]\"></td>";
    echo "</tr>	";
  }
?>
  </table>

<?php
}
?>
</form>
</body>
</html>
