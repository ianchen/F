<?php
	$connect = mysql_connect("localhost", "root", "1234555");
	$db = mysql_query("SET NAMES 'utf8'");
    mysql_select_db("db_f");
	
	$query = "SELECT * FROM `user` WHERE `AID` = '{$_GET["uid"]}'";
	$record = mysql_query($query) or die(mysql_error());
	$row_num = mysql_num_rows($record);	
	$row = mysql_fetch_assoc($record);	
	$aid = $row['AID'];
	
	$query = "SELECT * FROM `group`";
	$record = mysql_query($query) or die(mysql_error());
	$row_num = mysql_num_rows($record);	
	$memberArray = array();
	$memberDate = array();
	$memberRestaurant = array();
	$captainArray = array();
	$captainDate = array();
	$captainRestaurant = array();
	
	
	for($i = 0; $i < $row_num; $i++)
	{
		$row = mysql_fetch_assoc($record);	
		$flag = 0;
		$member = explode(';', $row['MEMBER']);
		$absent = explode(';', $row['ABSENT']);
		if("" === $row['ASSIGN'])
		{
			if($aid === $row['CAPTAIN'])
			{
				array_push($captainArray, $row['GID']);
				array_push($captainDate, $row['DATE']);
				$query1 = "SELECT * FROM `restaurant` WHERE `RID` = '$row[RID]';";
				$record1 = mysql_query($query1) or die(mysql_error());
				$row1 = mysql_fetch_assoc($record1);	
				array_push($captainRestaurant, $row1['NAME']);
			}
		}
		else
		{
			if(in_array($aid, $member) && !in_array($aid, $absent))
			{
				$query1 = "SELECT * FROM `member_restaurant` WHERE `MEMBER` = '$aid' AND `GROUP` = '$row[GID]';";
				$record1 = mysql_query($query1) or die(mysql_error());
				$row_num1 = mysql_num_rows($record1);	
				if(0 === $row_num1)
				{
					array_push($memberArray, $row['GID']);
					array_push($memberDate, $row['DATE']);
					$query1 = "SELECT * FROM `restaurant` WHERE `RID` = '$row[RID]';";
					$record1 = mysql_query($query1) or die(mysql_error());
					$row1 = mysql_fetch_assoc($record1);	
					array_push($memberRestaurant, $row1['NAME']);
				}
			}
		}
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>問卷確認</title>
	</head>
	<body>
		<div>團長問卷</div>
		<form name="captain_form" method="get" action="questionnaire_captain.php">
			<select name="GID">
				<?php
					for($i = 0; $i < count($captainArray); $i++)
					{
						echo "<option value = " . $captainArray[$i] . ">" . $captainRestaurant[$i] . " : " . $captainDate[$i] . "</option>";
					}
				?>
			</select>
			<input type="submit" value="確認">
		</form>
		<br><br><br>
		<div>團員問卷</div>
		<form name="member_form" method="get" action="questionnaire_member.php">
			<select name="GID">
				<?php
					for($i = 0; $i < count($memberArray); $i++)
					{
						echo "<option value = " . $memberArray[$i] . ">" . $memberRestaurant[$i] . " : " . $memberDate[$i] . "</option>";
					}
				?>
			</select>
			<input type="hidden" name="AID" value="<?php echo $aid;?>">
			<input type="submit" value="確認">
		</form>
	</body>
</html>
