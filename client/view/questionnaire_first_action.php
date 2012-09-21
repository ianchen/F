<?php
	$connect = mysql_connect("localhost", "root");
	$db = mysql_query("SET NAMES 'utf8'");
    mysql_select_db("db_f");
	$query = "INSERT INTO `first_question` ( `AID`, `GID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`) VALUES ( '$_POST[AID]', '$_POST[GID]', '$_POST[q1_blank]', '$_POST[q2_blank]', '$_POST[q3_blank]', '$_POST[q4_blank]', '$_POST[q5_blank]', '$_POST[q6_blank]');";
	$record = mysql_query($query) or die(mysql_error());
	//var_dump($_POST);
?>
<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>      
		感謝您試用本問卷,將自動跳轉至團員問卷.
		<form name="form1" action="questionnaire_member.php" method="GET">
			<input type="hidden" name="AID" value="<?php echo $_POST['AID'];?>">
			<input type="hidden" name="GID" value="<?php echo $_POST['GID'];?>">
		</form>
	</body>
	<script language="javascript">
		setTimeout('document.form1.submit();',500);
	</script>
</html>
