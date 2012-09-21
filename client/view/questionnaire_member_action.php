<?php
	date_default_timezone_set("Asia/Taipei");
	$connect = mysql_connect("localhost", "root");
	$db = mysql_query("SET NAMES 'utf8'");
    mysql_select_db("db_f");
	
	function transDishName($s)
	{
		$query = "SELECT * FROM `group` WHERE `GID` = $_POST[GID]";
		$record = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($record);
		$row_num = mysql_num_rows($record);	
		$rid = $row["RID"];
		
		$query = "SELECT * FROM `dish` WHERE `DISH` = '$s' AND `RESTAURANT` = '$rid'";
		$record = mysql_query($query) or die(mysql_error());
		$row_num = mysql_num_rows($record);	
		$row = mysql_fetch_assoc($record);
		return $row["DID"];
	}	
	//var_dump($_POST);
	function insertArticle($d, $s, $c)
	{
        //var_dump($s);
        //var_dump($c);
        
        echo "<br>";        
		if($c == 1)
		{
			$query = "INSERT INTO `short_article` ( `AUTHOR`, `DISH`, `GROUP`, `CONTENT`, `DATE`) VALUES ( '$_POST[AID]', '" . $d . "', '$_POST[GID]', '" . $s . "', '" . date("Y-m-d") . "' );";
			$record = mysql_query($query) or die(mysql_error());
		}
		else if($c == 2)
		{
			$query = "INSERT INTO `long_article` ( `AUTHOR`, `DISH`, `GROUP`, `CONTENT`, `DATE`) VALUES ( '$_POST[AID]', '" . $d . "', '$_POST[GID]', '" . $s . "', '" . date("Y-m-d") . "' );";
			$record = mysql_query($query) or die(mysql_error());
		}
	}
	
	//member_restaurant
	$query = "SELECT * FROM `group` WHERE `GID` = $_POST[GID]";
	$record = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($record);
	$row_num = mysql_num_rows($record);	
	$rid = $row["RID"];
	$dishNum = $row["DISHAMOUNT"];
	$dish = explode(';', $row['DISHORDERED']);
	$shareNum = $row["SHARENUM"];
	$share = explode(';', $row['SHARE']);
	$assignNum = $row["ASSIGN_NUM"];
	$tmp1 = explode(';', $row['ASSIGN']);
	foreach($tmp1 as $key => $value)
	{
		$tmp2 = explode(':', $value);
		if($_POST['AID'] === $tmp2[0])
		{
			$assign = explode(',', $tmp2[1]);
			break;
		}
	}
	$other = array();
	for($i = 1; $i < 100; $i++)
	{
		if(isset($_POST['q5_sub_check_' . $i]))
		{
			array_push($other, transDishName($_POST['q5_sub_check_' . $i]));
		}
	}
	$otherNum = count($other);
	
	$query = "INSERT INTO `member_restaurant` ( `MEMBER`, `GROUP`, `SCORE1`, `SCORE2`, `SCORE3`, `SCORE4`, `SCORE5`, `SCORE6`, `SCORE7`, `SCORE8`, `SCORE9`, `SCORE10`, `ADVICE`) VALUES ( '$_POST[AID]', '$_POST[GID]', '" . $_POST['score1'][0] . "', '" . $_POST['score2'][0] . "', '" . $_POST['score3'][0] . "', '" . $_POST['score4'][0] . "', '" . $_POST['score5'][0] . "', '" . $_POST['score6'][0] . "', '" . $_POST['score7'][0] . "', '" . $_POST['score8'][0] . "', '" . $_POST['score9'][0] . "', '" . $_POST['score10'][0] . "', '" . $_POST['restaurant_advice'] . "');";
	$record = mysql_query($query) or die(mysql_error());
	
	//member_dish
	for($i = 1; $i <= $dishNum; $i++)
	{
		$query = "INSERT INTO `member_dish` ( `MEMBER`, `DISH`, `SCORE`, `GROUP`) VALUES ( '$_POST[AID]', '" . $dish[$i-1] . "', '" . $_POST["d_score_" . $i][0] . "', '$_POST[GID]');";
		$record = mysql_query($query) or die(mysql_error());
	}
	
	//share_dish
	for($i = 1; $i <= $shareNum; $i++)
	{
		$query = "UPDATE `member_dish` SET `HAPPY` =  '" . $_POST["q3_sub_score_" . $i] . "' WHERE `MEMBER` =  '$_POST[AID]' AND `DISH` = '" . $share[$i-1] . "' AND `GROUP` = '$_POST[GID]';";
		$record = mysql_query($query) or die(mysql_error());
		//echo $query . "<br>";
		insertArticle($share[$i-1], $_POST['share_advice_' . $i], $_POST['share_advice_' . $i . "_check"]);
	}
	
	//assign_dish
	for($i = 1; $i <= $assignNum; $i++)
	{
		$query = "UPDATE `member_dish` SET `HAPPY` =  '" . $_POST["q4_sub_score_" . $i] . "' WHERE `MEMBER` =  '$_POST[AID]' AND `DISH` = '" . $assign[$i-1] . "' AND `GROUP` = '$_POST[GID]';";
		$record = mysql_query($query) or die(mysql_error());
		//echo $query . "<br>";
		insertArticle($assign[$i-1], $_POST['assign_advice_' . $i], $_POST['assign_advice_' . $i . "_check"]);
	}
	//other_dish
    $index = 0;
	for($i = 1; $i <= $dishNum - $shareNum - $assignNum; $i++)
	{
        if("" !== $_POST['other_advice_' . $i])
        {
		    $query = "UPDATE `member_dish` SET `HAPPY` =  '" . $_POST["q5_sub_score_" . $i] . "' WHERE `MEMBER` =  '$_POST[AID]' AND `DISH` = '" . $other[$index] . "' AND `GROUP` = '$_POST[GID]';";
		    $record = mysql_query($query) or die(mysql_error());
		    //echo $query . "<br>";
		    insertArticle($other[$index], $_POST['other_advice_' . $i], $_POST['other_advice_' . $i . "_check"]);
            $index++;
        }
	}
	
	//photo
	if('1' === $_POST['photo_radio'] && isset($_POST['photo_url']))
	{
		$query = "INSERT INTO `member_photo` ( `AID`, `GID`, `URL`) VALUES ( '$_POST[AID]', '$_POST[GID]', '$_POST[photo_url]');";
		$record = mysql_query($query) or die(mysql_error());
		//echo $query . "<br>";
	}
	
	//three words mood
	if('1' === $_POST['mood_radio'])
	{
		$query = "INSERT INTO `three_word` ( `AID`, `TITLE`, `CONTENT`, `DATE`) VALUES ( '$_POST[AID]', '$_POST[mood_title]', '$_POST[mood_content]', '" . date("Y-m-d") . "');";
		$record = mysql_query($query) or die(mysql_error());
		//echo $query . "<br>";
	}
	else
	{
		$query = "UPDATE `three_word` SET `CONTENT` =  '" . $_POST["mood_content"] . "' WHERE `AID` =  '$_POST[AID]' AND `TITLE` = '$_POST[mood_title]';";
		$record = mysql_query($query) or die(mysql_error());
		//echo $query . "<br>";
	}
	
	//member_three_word
	$query = "INSERT INTO `member_three_word` ( `GID`, `TALKER`, `AID`, `CONTENT`) VALUES ( '$_POST[GID]', '$_POST[favorite_mood]', '$_POST[AID]', '$_POST[mood_talk]');";
	$record = mysql_query($query) or die(mysql_error());
	//echo $query . "<br>";
	
	//talk
	$query = "INSERT INTO `talk` ( `GROUP`, `NUMBER`, `SPEAKER`, `CONTENT`, `SCORE`) VALUES ( '$_POST[GID]', '$_POST[favorite_talk]', '$_POST[AID]', '$_POST[talk_content]', '$_POST[talk_score]');";
	$record = mysql_query($query) or die(mysql_error());
	//echo $query . "<br>";
	
	//to captain
	$query = "INSERT INTO `group_talk` ( `TYPE`, `TALKER`, `CONTENT`, `GID`) VALUES ( '1', '$_POST[AID]', '$_POST[captain_talk]', '$_POST[GID]');";
	$record = mysql_query($query) or die(mysql_error());
	//echo $query . "<br>";
	
	//to member
	$query = "INSERT INTO `group_talk` ( `TYPE`, `TALKER`, `CONTENT`, `GID`) VALUES ( '2', '$_POST[AID]', '$_POST[everyone_talk]', '$_POST[GID]');";
	$record = mysql_query($query) or die(mysql_error());
	//echo $query . "<br>";
	
	
	$query = "SELECT * FROM `user` WHERE `AID` = $_POST[AID]";
	$record = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($record);
	$token = $row['ACCOUNT'];
?>
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>      
		感謝您試用本問卷,如需填寫其他問卷請重啟登入頁面.
		<form name="form1" action="questionnaire_check.php" method="post">
			<input type="hidden" name="a" value="<?php echo $token;?>">
			<input type="hidden" name="p" value="<?php echo $token;?>">
		</form>
	</body>
	<script language="javascript">
		setTimeout('document.form1.submit();',500);
	</script>
</html>
