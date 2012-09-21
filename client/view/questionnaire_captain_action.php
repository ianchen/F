<?php
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
		if(0 !== $row_num)
		{
			$row = mysql_fetch_assoc($record);
			return $row["DID"];
		}
		
		$query = "INSERT INTO `dish` ( `RESTAURANT`, `DISH`) VALUES ( '$rid', '$s');";
		$record = mysql_query($query) or die(mysql_error());
		$query = "SELECT * FROM `dish` WHERE `DISH` = '$s' AND `RESTAURANT` = '$rid'";
		$record = mysql_query($query) or die(mysql_error());
		$row_num = mysql_num_rows($record);	
		$row = mysql_fetch_assoc($record);
		return $row["DID"];
	}	
	function insertDishPrice($s, $p)
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
		$did = $row["DID"];
		
		$query = "UPDATE `dish` SET `PRICE` =  '$p' WHERE `DID` =  '$did'";
		$record = mysql_query($query) or die(mysql_error());
		return true;
	}	
	function setDishAmount()
	{
		return $_POST["dishNum"];
	}
	function setDishOrdered()
	{
		$tmp = array();
		for($i = 0; $i < $_POST["dishNum"]; $i++)
		{
			if("" === $_POST["dishNameText_" . $i])
			{
				array_push($tmp, transDishName($_POST["dishNameSelect_" . $i]));
			}
			else
			{
				array_push($tmp, transDishName($_POST["dishNameText_" . $i]));
			}
		}
		return implode(';', $tmp);
	}
	function setNextCaptain()
	{
		return $_POST["nextCaptain"];
	}
	function setShareNum()
	{
		$tmp = 0;
		for($i = 0; $i < $_POST["dishNum"]; $i++)
		{
			if(isset($_POST["isShare_" . $i]))
			{
				$tmp++;
			}
		}
		return $tmp;
	}
	function setShare()
	{
		$tmp = array();
		for($i = 0; $i < $_POST["dishNum"]; $i++)
		{
			if(isset($_POST["isShare_" . $i]))
			{
				if("" === $_POST["dishNameText_" . $i])
				{
					array_push($tmp, transDishName($_POST["dishNameSelect_" . $i]));
				}
				else
				{
					array_push($tmp, transDishName($_POST["dishNameText_" . $i]));
				}
			}
		}
		return implode(';', $tmp);
	}
	function setPrice()
	{
		return $_POST["avgPrice"];
	}
	function setAssignNum()
	{
		return $_POST["assignNum"];
	}
	function setAssign()
	{
		$query = "SELECT * FROM `group` WHERE `GID` = $_POST[GID]";
		$record = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($record);
		$row_num = mysql_num_rows($record);	
		$member = explode(';', $row["MEMBER"]);
		$tmp1 = array();
		for($i = 0; $i < $row["NUMBER"]; $i++)
		{
			if(!isset($_POST["assign_" . $member[$i] . "_0"])) continue;
			$tmp2 = array();
			for($j = 0; $j < $_POST["assignNum"]; $j++)
			{
				if(isset($_POST["assign_" . $member[$i] . "_" . $j]))
				{
					array_push($tmp2, transDishName($_POST["assign_" . $member[$i] . "_" . $j]));
				}
			}	
			$tmp3 = array();
			array_push($tmp3, $member[$i]);
			array_push($tmp3, implode(',', $tmp2));
			array_push($tmp1, implode(':', $tmp3));
		}
		return implode(';', $tmp1);
	}
	function setAbsent()
	{
		$tmp = array();
		if(isset($_POST["absent"]))
		{
			foreach( $_POST["absent"] as $key => $value)
			{
				array_push($tmp, $value);
			}
			return implode(';', $tmp);
		}
	}
	function setDescription()
	{
		return $_POST["description"];
	}
	function setNoteTitle1()
	{
		if(isset($_POST["note_title_1"])) return $_POST["note_title_1"];
		else return "";
	}
	function setNote1()
	{
		if(isset($_POST["note_1"])) return $_POST["note_1"];
		else return "";
	}
	function setNoteTitle2()
	{
		if(isset($_POST["note_title_2"])) return $_POST["note_title_2"];
		else return "";
	}
	function setNote2()
	{
		if(isset($_POST["note_2"])) return $_POST["note_2"];
		else return "";
	}
	function setNoteTitle3()
	{
		if(isset($_POST["note_title_3"])) return $_POST["note_title_3"];
		else return "";
	}
	function setNote3()
	{
		if(isset($_POST["note_3"])) return $_POST["note_3"];
		else return "";
	}
	
	$query = "UPDATE `group` SET `DISHAMOUNT` =  '" . setDishAmount() . "', `DISHORDERED` =  '" . setDishOrdered() . "', `NEXTCAPTAIN` =  '" . setNextCaptain() . "', `SHARENUM` =  '" . setShareNum() . "', `SHARE` =  '" . setShare() . "', `PRICE` =  '" . setPrice() . "', `ASSIGN_NUM` =  '" . setAssignNum() . "', `ASSIGN` =  '" . setAssign() . "', `ABSENT` =  '" . setAbsent() . "', `DESCRIPTION` = '" . setDescription() . "', `NOTE_TITLE1` = '" . setNoteTitle1() . "', `NOTE1` = '" . setNote1() . "', `NOTE_TITLE2` = '" . setNoteTitle2() . "', `NOTE2` = '" . setNote2() . "', `NOTE_TITLE3` = '" . setNoteTitle3() . "', `NOTE3` = '" . setNote3() . "' WHERE `GID` =  '$_POST[GID]'";
	//echo $query . "<br>";
	$record = mysql_query($query) or die(mysql_error());
	
	for($i = 0; $i < $_POST["dishNum"]; $i++)
	{
		if("" === $_POST["dishNameText_" . $i])
		{
			insertDishPrice($_POST["dishNameSelect_" . $i], $_POST["dishPrice_" . $i]);
		}
		else
		{
			insertDishPrice($_POST["dishNameText_" . $i], $_POST["dishPrice_" . $i]);
		}
	}
	
	$query = "SELECT * FROM `group` WHERE `GID` = $_POST[GID]";
	$record = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($record);
	$aid = $row['CAPTAIN'];
	
	$query = "SELECT * FROM `user` WHERE `AID` = $aid";
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