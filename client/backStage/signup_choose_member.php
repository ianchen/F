<?php
	$connect = mysql_connect("localhost", "root");
	$db = mysql_query("SET NAMES 'utf8'");
    mysql_select_db("db_f");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>填團懶人包</title>
    <link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="Stylesheet" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
</head>
	<script>
	$(function() {
		$( "#date" ).datepicker();
		var availableTags = [
		<?php
			$query = "SELECT * FROM `user`";
			$result = mysql_query($query);
			$num = mysql_affected_rows();
			for($i = 0; $i < $num; $i++)
			{
				$record = mysql_fetch_assoc($result);
				if($i === $num-1) echo "'" . $record['NICKNAME'] . "/" . $record['ACCOUNT'] . "/" . $record['AID'] . "'";
				else echo "'" . $record['NICKNAME'] . "/" . $record['ACCOUNT'] . "/" . $record['AID'] . "',";
			}
		?>
		];
		$( ".tags" ).autocomplete({
			source: availableTags
		});
	});
	function openTag()
	{
		var n = document.getElementById('num').value;
		$(".trTag").hide();
		for(var i = 0; i < n; i++)
		{
			$("#tr-" + i).show();	
		}
	}
	function openDish()
	{
		var str = document.getElementById('restaurantName').value;
		var rid = str.split("/")[2];
		$(".dishDiv").hide();
		$("#dDiv-" + rid).show();	
	}
	</script>
<body>
	<form action="signup_decide.php" method="post">
		預計出團人數:
		<select id="preNum" name="preNum">
			<option value=4>4</option>
			<option value=6>6</option>
			<option value=8>8</option>
			<option value=10>10</option>
			<option value=12>12</option>
			<option value=14>14</option>	
		</select>
		</br>
		報名人數:
		<input type="text" id="num"/>
		<input type="button" id="numCheck" onclick="openTag();" value="確認">
		<br />
		報名者暱稱/手機/ID:
		<table>
		<?php
			for($i = 0; $i < 100; $i++)
			{
				echo "<tr style='display:none' id='tr-" . $i . "' class='trTag'>";
				echo "<td><input id='tag-" . $i . "' name='tag-" . $i . "' class='tags'></td>";
				echo "</tr>";
			}
		?>
		</table>
		<input type="submit" value="送出">
	</form>
</body>
</html>
