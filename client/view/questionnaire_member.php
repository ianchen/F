<?php
	ini_set('default_charset','utf-8', "thekono1");
  require('config.php');
?>
<?php
//判斷是否為第一次參加
function checkFirst(){
	$query= "SELECT COUNT(AID) FROM `first_question` WHERE `AID` = '$_GET[AID]'";
	$Recordset = mysql_query($query) or die(mysql_error());
	$row_Recordset = mysql_fetch_assoc($Recordset);
	if(0 == $row_Recordset['COUNT(AID)']) return true;
	return false;
}
if(checkFirst())
header( 'Location: questionnaire_first.php?GID='.$_GET['GID'].'&AID='.$_GET['AID']);

?>
<!--團員ID,DB:group/MEMBER(slice it) => intAID[]-->
<?php
	$query_Recordset1 = "SELECT * FROM `group` WHERE `GID` = '$_GET[GID]'";
	$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	
	$member_num = $row_Recordset1["NUMBER"];
	$str = $row_Recordset1["MEMBER"];
	$strAID = strtok($str, ";");
	for($i = 1; $i <= $row_Recordset1['NUMBER']; $i++){
		$intAID[$i] = (int)$strAID;
		$strAID = strtok(";");		
	}
?>

<!--團員綽號,DB:user/NICKNAME => nick[]-->
<?php
	for($i = 1; $i <= $row_Recordset1['NUMBER']; $i++){
		$query_Recordset2 = sprintf("SELECT * FROM `user` WHERE `AID` = $intAID[$i]");
		$Recordset2 = mysql_query($query_Recordset2) or die(mysql_error());
		$row_Recordset2 = mysql_fetch_assoc($Recordset2);
		$totalRows_Recordset2 = mysql_num_rows($Recordset2);
		$nick[$i] = $row_Recordset2['NICKNAME'];
	}
		
?>

<!--吃過菜色DB:group/RID => DB:dish/DISH => dish_ID[] & dish_name[]-->
<?php
	$query_Recordset3 = "SELECT * FROM `dish` WHERE `RESTAURANT` = $row_Recordset1[RID]";
	$Recordset3 = mysql_query($query_Recordset3) or die(mysql_error());
	$totalRows_Recordset3 = mysql_num_rows($Recordset3);
	$dish_num = $totalRows_Recordset3;
	for($i = 1; $i <= $dish_num; $i++){
		$row_Recordset3 = mysql_fetch_assoc($Recordset3);
		$dish_ID[$i] = $row_Recordset3['DID'];
		$dish_name[$i] = $row_Recordset3['DISH'];
	}
	$vol_num = 2 + ceil(($row_Recordset1["DISHAMOUNT"]-4)/3);
	
?>

<!--共同菜色DB:group/SHARE => share_ID[] & share_name[] & share_num-->
<?php
	$query_Recordset4 = "SELECT * FROM `group` WHERE `GID` = $_GET[GID]";
	$Recordset4 = mysql_query($query_Recordset4) or die(mysql_error());
	$row_Recordset4 = mysql_fetch_assoc($Recordset4);
	$totalRows_Recordset4 = mysql_num_rows($Recordset4);
	
	$share_num = $row_Recordset4['SHARENUM'];
	$str = $row_Recordset4["SHARE"];
	$strSID = strtok($str, ";");
	for($i = 1; $i <= $share_num; $i++){
		$share_ID[$i] = (int)$strSID;
		for($j = 1; $j <= $dish_num; $j++){
			if($share_ID[$i] == $dish_ID[$j]){
				$share_name[$i] = $dish_name[$j];
			}
		}
		$strSID = strtok(";");		
	}
?>

<!--指定菜色DB:group/ASSIGN => assign_ID[] & assign_name[] & assign_num-->
<?php
	$query_Recordset5 = "SELECT * FROM `group` WHERE `GID` = $_GET[GID]";
	$Recordset5 = mysql_query($query_Recordset5) or die(mysql_error());
	$row_Recordset5 = mysql_fetch_assoc($Recordset5);
	$totalRows_Recordset5 = mysql_num_rows($Recordset5);
	
	$assign_num = $row_Recordset5['ASSIGN_NUM'];
	$str = $row_Recordset5["ASSIGN"];
	$strAssign = strtok($str, ";");
	for($t = 1; $t <= $row_Recordset5["NUMBER"]; $t++){
		$strAID = strtok($strAssign, ":");
		if($strAID == $_GET['AID']){
			for($i = 1; $i <= $row_Recordset5["ASSIGN_NUM"]; $i++){	
				$strAID = strtok(",");
				$assign_ID[$i] = (int)$strAID;
				for($j = 1; $j <= $dish_num; $j++){
					if($assign_ID[$i] == $dish_ID[$j]){
						$assign_name[$i] = $dish_name[$j];
					}
				}
			}
		}
		else{
			$strAssign = strtok($str, ";");
			for($i = 0; $i < $t; $i++) $strAssign = strtok(";");
		}
	}				
?>

<!--團菜色DB:group/DISHORDERED => order_ID[] & order_name[] & order_num-->
<?php
	$query_Recordset6 = "SELECT * FROM `group` WHERE `GID` = $_GET[GID]";
	$Recordset6 = mysql_query($query_Recordset6) or die(mysql_error());
	$row_Recordset6 = mysql_fetch_assoc($Recordset6);
	$totalRows_Recordset6 = mysql_num_rows($Recordset6);
	
	$order_num = $row_Recordset6['DISHAMOUNT'];
	$str = $row_Recordset6["DISHORDERED"];
	$strOID = strtok($str, ";");
	for($i = 1; $i <= $order_num; $i++){
		$order_ID[$i] = (int)$strOID;
		for($j = 1; $j <= $dish_num; $j++){
			if($order_ID[$i] == $dish_ID[$j]){
				$order_name[$i] = $dish_name[$j];
			}
		}
		$strOID = strtok(";");		
	}
?>
	
<!--其他菜色 => other_ID[] & other_name[] & other_num-->
<?php
	$other_num = 0;
	for($i = 1; $i <= $order_num; $i++){
		$flag = 0;
		for($j = 1; $j <= $share_num; $j++){
			if($order_ID[$i] == $share_ID[$j]){
				$flag = 1;
				break;
			}
		}
		for($j = 1; $j <= $assign_num; $j++){
			if($order_ID[$i] == $assign_ID[$j]){
				$flag = 1;
				break;
			}
		}
		if($flag == 0){
			$other_num++;
			$other_ID[$other_num] = $order_ID[$i];
			$other_name[$other_num] = $order_name[$i];
		}
	}
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>團員問卷</title>
	<link href="css/questionnaire_member.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />
	<script type="text/javascript" src="javascript/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript">
		var myGlobe = {
			nowQ : 1,
			numQ : 6,
			otherFlag : 0
		}
		<!--php變數=>js變數-->
		myGlobe.memberNum = <?php echo $member_num;?>;
		myGlobe.dishNum = <?php echo $dish_num;?>;
		myGlobe.shareNum = <?php echo $share_num;?>;
		myGlobe.assignNum = <?php echo $assign_num;?>;
		myGlobe.orderNum = <?php echo $order_num;?>;
		myGlobe.otherNum = <?php echo $other_num;?>;
		myGlobe.volNum = 0;
		myGlobe.otherName = new Array();
		myGlobe.volChoose = new Array();
		<?php
			for($i = 1; $i <= $other_num; $i++){
		?>
		myGlobe.otherName[<?php echo $i;?>] = '<?php echo $other_name[$i];?>';
		myGlobe.volChoose[<?php echo $i;?>] = 0;
		<?php
			}	
		?>
	</script>
</head>

<body onLoad="init();">
	<form id="questionnire_member_form" name="questionnire_member_form" action="questionnaire_member_action.php" method="post"> 
	<div id="real_body">
		<div id="top_bar"><img src="images/questionaire/quest_top_bg_m.png"></div>
		<div id="left_bar">
			<table>
				<tbody>
					<tr>
						<td id="q1_title" width="240" height="43" class="question_current_bg">1 我要替今晚的餐廳打分數</td>
						<td id="q1_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(1);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q2_title" height="43" class="question_before_bg">2  我要為每道菜打分數</td>
						<td id="q2_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(2);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q3_title" height="43" class="question_before_bg">3  我要為共同菜色打分數</td>
						<td id="q3_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(3);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q4_title" height="43" class="question_before_bg">4  我要為指定菜色打分數</td>
						<td id="q4_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(4);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q5_title" height="43" class="question_before_bg">5  我要為自願菜色打分數</td>
						<td id="q5_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(5);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q6_title" height="43" class="question_before_bg">6  活動狀態</td>
						<td id="q6_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(6);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td height="50" colspan="2" align="center" valign="bottom" class="percentage_txt">完成進度: <span id="nowProgress">0</span>%</td>
					</tr>
					<tr>
						<td height="30" colspan="2" align="center" valign="bottom"><img id="progress" src="images/questionaire/percentage_00.png" width="139" height="26" /></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="content">
			<div class="question_content" id="q1" marginwidth="0" #marginheight="0"  border="0" align="left">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tbody align="center" >
						<tr>
							<td width="50px"></td>
							<td>恩....不合格</td>
							<td>一般店家水準</td>
							<td>算OK值得推薦</td>
							<td>滿意!無話可說</td>
							<td>超級無敵滿意!</td>
						</tr>
						<tr>
							<td height="40px">適合朋友聚會</td>
							<td><input id="score1_1" name="score1[]" type="radio" value="1" /></td>
							<td><input id="score1_2" name="score1[]" type="radio" value="2" /></td>
							<td><input id="score1_3" name="score1[]" type="radio" value="3" /></td>
							<td><input id="score1_4" name="score1[]" type="radio" value="4" /></td>
							<td><input id="score1_5" name="score1[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">適合情侶約會</td>
							<td><input id="score2_1" name="score2[]" type="radio" value="1" /></td>
							<td><input id="score2_2" name="score2[]" type="radio" value="2" /></td>
							<td><input id="score2_3" name="score2[]" type="radio" value="3" /></td>
							<td><input id="score2_4" name="score2[]" type="radio" value="4" /></td>
							<td><input id="score2_5" name="score2[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">適合家庭聚餐</td>
							<td><input id="score3_1" name="score3[]" type="radio" value="1" /></td>
							<td><input id="score3_2" name="score3[]" type="radio" value="2" ></td>
							<td><input id="score3_3" name="score3[]" type="radio" value="3" /></td>
							<td><input id="score3_4" name="score3[]" type="radio" value="4" /></td>
							<td><input id="score3_5" name="score3[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">用餐氣氛</td>
							<td><input id="score4_1" name="score4[]" type="radio" value="1" /></td>
							<td><input id="score4_2" name="score4[]" type="radio" value="2" /></td>
							<td><input id="score4_3" name="score4[]" type="radio" value="3" /></td>
							<td><input id="score4_4" name="score4[]" type="radio" value="4" /></td>
							<td><input id="score4_5" name="score4[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">價錢與餐點的划算度</td>
							<td><input id="score5_1" name="score5[]" type="radio" value="1" /></td>
							<td><input id="score5_2" name="score5[]" type="radio" value="2" /></td>
							<td><input id="score5_3" name="score5[]" type="radio" value="3" /></td>
							<td><input id="score5_4" name="score5[]" type="radio" value="4" /></td>
							<td><input id="score5_5" name="score5[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">美味度(就該價位而言)</td>
							<td><input id="score6_1" name="score6[]" type="radio" value="1" /></td>
							<td><input id="score6_2" name="score6[]" type="radio" value="2" /></td>
							<td><input id="score6_3" name="score6[]" type="radio" value="3" /></td>
							<td><input id="score6_4" name="score6[]" type="radio" value="4" /></td>
							<td><input id="score6_5" name="score6[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">服務品質</td>
							<td><input id="score7_1" name="score7[]" type="radio" value="1" /></td>
							<td><input id="score7_2" name="score7[]" type="radio" value="2" /></td>
							<td><input id="score7_3" name="score7[]" type="radio" value="3" /></td>
							<td><input id="score7_4" name="score7[]" type="radio" value="4" /></td>
							<td><input id="score7_5" name="score7[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">再次拜訪意願</td>
							<td><input id="score8_1" name="score8[]" type="radio" value="1" /></td>
							<td><input id="score8_2" name="score8[]" type="radio" value="2" /></td>
							<td><input id="score8_3" name="score8[]" type="radio" value="3" /></td>
							<td><input id="score8_4" name="score8[]" type="radio" value="4" /></td>
							<td><input id="score8_5" name="score8[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">推薦朋友意願</td>
							<td><input id="score9_1" name="score9[]" type="radio" value="1" /></td>
							<td><input id="score9_2" name="score9[]" type="radio" value="2" /></td>
							<td><input id="score9_3" name="score9[]" type="radio" value="3" /></td>
							<td><input id="score9_4" name="score9[]" type="radio" value="4" /></td>
							<td><input id="score9_5" name="score9[]" type="radio" value="5" /></td>
						</tr>
						<tr>
							<td height="40px">綜合評價</td>
							<td><input id="score10_1" name="score10[]" type="radio" value="1" /></td>
							<td><input id="score10_2" name="score10[]" type="radio" value="2" /></td>
							<td><input id="score10_3" name="score10[]" type="radio" value="3" /></td>
							<td><input id="score10_4" name="score10[]" type="radio" value="4" /></td>
							<td><input id="score10_5" name="score10[]" type="radio" value="5" /></td>
						</tr>
						<tr><td colspan="6"><p>怎麼樣可以多加一分呢?</p><textarea id="restaurant_advice" name="restaurant_advice" cols="50" rows="4" /></textarea></td></tr>
						<tr id="next_btn_tr_1"><td colspan="6" align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_1"><td colspan="6" align="right"><input type="button" class="modify_btn" onClick="endModifyQ(1);" value="修改完成"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="question_content" id="q2" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tbody align="center" >
						<tr>
							<td></td>
							<td>反推這道菜</td>
							<td>還能接受</td>
							<td>推薦這道菜</td>
						</tr>
						<?php
							for($i = 1; $i <= $order_num; $i++){
						?>
						<tr>
							<td height="40px"><?php echo $order_name[$i];?></td>
							<td><input id="<?php echo 'd_score_'.$i.'_1';?>" name="<?php echo 'd_score_'.$i.'[]';?>" type="radio" value="0" /></td>
							<td><input id="<?php echo 'd_score_'.$i.'_2';?>" name="<?php echo 'd_score_'.$i.'[]';?>" type="radio" value="50" /></td>
							<td><input id="<?php echo 'd_score_'.$i.'_3';?>" name="<?php echo 'd_score_'.$i.'[]';?>" type="radio" value="100" /></td>
						</tr>
						<?php
							}
						?>
						<tr id="next_btn_tr_2"><td colspan="6" align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_2"><td colspan="6" align="right"><input type="button" class="modify_btn" onClick="endModifyQ(2);" value="修改完成"></td></tr>
					</tbody>				
				</table>
			</div>
			<div class="question_content" id="q3" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
			<?php 
				if(0 == $share_num) echo "本次沒有共同料理,請幫我們點選下一頁"; 
				else if(1 != $share_num) echo "點擊下方的菜色即可進行填寫";
			?>
				<table border="0" align="left" bgcolor="#ffffff" cellpadding="2" cellspacing="0" width="420" rules="rows" class="main_table">
					<tbody align="left" >
						<?php
							for($i = 1; $i <= $share_num; $i++)
							{
						?>
						<tr>
							<td>
								<?php
									if($share_num != 1)
									{
								?>
								<table><tr>
								<td width="120px" align="left"><span><?php echo "第".$i."道";?></span></td>
								<td width="400px" align="left"><span><?php echo $share_name[$i];?></span></td>
								<td align="right"><input onClick="openShare(<?php echo $i;?>, this);" type="button" class="q3_dishSelect" id="<?php echo 'q3_sub_button_'.$i;?>" value="填寫"></td>
								</tr></table>
								<?php
									}
								?>
								<div id="<?php echo 'q3_sub_'.$i;?>" style="text-align:left;<?php if(1 != $share_num) echo "display:none;";?>" class="q3_sub" >
									<?php
										if($assign_num == 1)
										{
									?>	
									<h3 class="sub_title"><?php echo $share_name[$i];?></h3>
									<?php
										}
									?>
									我認為這道菜的美味程度:<br /><br />
									<input id="<?php echo 'q3_sub_score1_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 1);" type="radio" value="10" checked="checked" />
									不算合格<br />
									<input id="<?php echo 'q3_sub_score2_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 2);" type="radio" value="20" />
									<span id="<?php echo 'q3_sub_span2_'.$i;?>">嗯..有合格喔</span><br />
									<div id="<?php echo 'share_div1_'.$i;?>" class="div1" style="display:none;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score3_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 3);" type="radio" value="30" />
										就是ＯＫ而已，一般水準<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score4_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 4);" type="radio" value="40" />
										已經高於一般水準了<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score5_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 5);" type="radio" value="50" />
										同樣的料理裡屬一屬二好吃的<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score6_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 6);" type="radio" value="60" />
										<span id="<?php echo 'q3_sub_span6_'.$i;?>">無話可說~真滿足!</span><br />
									</div>
									<div id="<?php echo 'share_div2_'.$i;?>" class="div2" style="display:none;">
										
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score7_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 7);" type="radio" value="70" />
										恰到好處的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score8_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 8);" type="radio" value="80" />
										完全超出預期的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q3_sub_score9_'.$i;?>" name="<?php echo 'q3_sub_score_'.$i;?>" onClick="folderQuestion('share', <?php echo $i?>, 9);" type="radio" value="90" />
										絕絕對對的無可挑剔,我會給他滿分!<br />
									</div>
									我對這道菜的評論(40字以下或70字以上):<br />
									<textarea class="advice_area" id="<?php echo 'share_advice_'.$i;?>" name="<?php echo 'share_advice_'.$i;?>" cols="52" rows="5"></textarea>
									字數<span id="<?php echo 'share_wNum_'.$i;?>"></span>
									<input type="hidden" name="<?php echo 'share_advice_'.$i.'_check'; ?>" id="<?php echo 'share_advice_'.$i.'_check';?>">
								</div>
							</td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tr id="next_btn_tr_3"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
					<tr style="display:none;" id="modify_btn_tr_3"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(3);" value="修改完成"></td></tr>
				</table>
			</div>
			<div class="question_content" id="q4" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<?php if($assign_num != 1) echo "點擊下方的菜色即可進行填寫";?>
				<table border="0" align="left" bgcolor="#ffffff" cellpadding="2" cellspacing="0" width="420" rules="rows" class="main_table">
					<tbody align="left" >
						<?php
							for($i = 1; $i <= $assign_num; $i++)
							{
						?>
						<tr>
							<td>
								<?php
									if($assign_num != 1)
									{
								?>
								<table><tr>
								<td width="120px" align="left"><span><?php echo "第".$i."道";?></span></td>
								<td width="400px" align="left"><span><?php echo $assign_name[$i];?></span></td>
								<td align="right"><input onClick="openAssign(<?php echo $i;?>, this);" type="button" class="q4_dishSelect" id="<?php echo 'q4_sub_button_'.$i;?>" value="填寫"></td>
								</tr></table>
								<?php
									}
								?>
								<div id="<?php echo 'q4_sub_'.$i;?>" style="text-align:left;<?php if(1 != $assign_num) echo "display:none;";?>" class="q4_sub" >
									<?php
										if($assign_num == 1)
										{
									?>	
									<h3 class="sub_title"><?php echo $assign_name[$i];?></h3>
									<?php
										}
									?>
									我認為這道菜的美味程度:<br /><br />
									<input id="<?php echo 'q4_sub_score1_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 1);" type="radio" value="10" checked="checked" />
									不算合格<br />
									<input id="<?php echo 'q4_sub_score2_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 2);" type="radio" value="20" />
									<span id="<?php echo 'q4_sub_span2_'.$i;?>">嗯..有合格喔</span><br />
									<div id="<?php echo 'assign_div1_'.$i;?>" class="div1" style="display:none;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score3_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 3);" type="radio" value="30" />
										就是ＯＫ而已，一般水準<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score4_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 4);" type="radio" value="40" />
										已經高於一般水準了<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score5_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 5);" type="radio" value="50" />
										 同樣的料理裡屬一屬二好吃的<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <input id="<?php echo 'q4_sub_score6_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 6);" type="radio" value="60" />
										<span id="<?php echo 'q4_sub_span6_'.$i;?>">無話可說~真滿足!</span><br />
									</div>
									<div id="<?php echo 'assign_div2_'.$i;?>" class="div2" style="display:none;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score7_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 7);" type="radio" value="70" />
										恰到好處的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score8_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 8);" type="radio" value="80" />
										完全超出預期的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q4_sub_score9_'.$i;?>" name="<?php echo 'q4_sub_score_'.$i;?>" onClick="folderQuestion('assign', <?php echo $i?>, 9);" type="radio" value="90" />
										絕絕對對的無可挑剔,我會給他滿分!<br />
									</div>
									我對這道菜的評論(70字以上):<br />
									<textarea class="advice_area" id="<?php echo 'assign_advice_'.$i;?>" name="<?php echo 'assign_advice_'.$i;?>" cols="52" rows="5"></textarea>
									字數<span id="<?php echo 'assign_wNum_'.$i;?>"></span>
									<input type="hidden" name="<?php echo 'assign_advice_'.$i.'_check'; ?>" id="<?php echo 'assign_advice_'.$i.'_check';?>">
								</div>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tr id="next_btn_tr_4"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
					<tr style="display:none;" id="modify_btn_tr_4"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(4);" value="修改完成"></td></tr>
				</table>
			</div>
			<div class="question_content" id="q5" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<?php echo "勾選後點擊下方的菜色即可進行填寫,本次請勾選" . $vol_num . "道菜以上";?>
				<table border="0" align="left" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tbody align="left" >
						<?php
							for($i = 1; $i <= $other_num; $i++)
							{
						?>
							<tr class="other_check">
							<td>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input onClick="openOtherButton();" id="<?php echo 'q5_sub_check_'.$i;?>" name="<?php echo 'q5_sub_check_'.$i;?>" type="checkbox" value="<?php echo $other_name[$i];?>"><span id="<?php echo 'q5_sub_span_'.$i;?>"><?php echo $other_name[$i];?></span>
							</td>
							</tr>
						<?php
							}
						?>
				
						<tr id="check_tr"><td colspan="1" align="right"><input onClick="checkOther(<?php echo $vol_num;?>, this);" type="button" value="確認菜色"></td></tr>
					</tbody>
				</table>
				<table id="q5_main" border="0" align="left" bgcolor="#ffffff" cellpadding="2" cellspacing="0" width="420" rules="rows" class="main_table" style="display:none">
					<tbody align="left" >
						<?php
							for($i = 1; $i <= $other_num; $i++)
							{
								echo "<tr class=\"button_tr\" id=\"q5_sub_tr_" . $i . "\" style=\"display:none;\">";
						?>
							<td>
								<table id="<?php echo 'q5_sub_table_'.$i;?>"><tr>
								<td width="400px" align="left"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $other_name[$i];?></span></td>
								<td align="right"><input onClick="openOther(<?php echo $i;?>, this);" id="<?php echo 'q5_sub_button_'.$i;?>" type="button" class="q5_dishSelect" value="填寫" style="display:none;"></td>
								</tr></table>
								<div id="<?php echo 'q5_sub_'.$i;?>" style="text-align:left; display:none" class="q5_sub">
									<!--<h3 class="sub_title"><?php echo $other_name[$i];?></h3>-->
									我認為這道菜的美味程度:<br /><br />
									<input id="<?php echo 'q5_sub_score1_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 1);" type="radio" value="10" checked="checked" />
									不算合格<br />
									<input id="<?php echo 'q5_sub_score2_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 2);" type="radio" value="20" />
									<span id="<?php echo 'q5_sub_span2_'.$i;?>">嗯..有合格喔</span><br />
									<div id="<?php echo 'other_div1_'.$i;?>" class="div1" style="display:none;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score3_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 3);" type="radio" value="30" />
										就是ＯＫ而已，一般水準<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score4_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 4);" type="radio" value="40" />
										已經高於一般水準了<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score5_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 5);" type="radio" value="50" />
										 同樣的料理裡屬一屬二好吃的<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <input id="<?php echo 'q5_sub_score6_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 6);" type="radio" value="60" />
										<span id="<?php echo 'q5_sub_span6_'.$i;?>">無話可說~真滿足!</span><br />
									</div>
									<div id="<?php echo 'other_div2_'.$i;?>" class="div2" style="display:none;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score7_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 7);" type="radio" value="70" />
										恰到好處的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score8_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 8);" type="radio" value="80" />
										完全超出預期的滿足<br />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="<?php echo 'q5_sub_score9_'.$i;?>" name="<?php echo 'q5_sub_score_'.$i;?>" onClick="folderQuestion('other', <?php echo $i?>, 9);" type="radio" value="90" />
										絕絕對對的無可挑剔,我會給他滿分!<br />
									</div>
									我對這道菜的評論(40字以下或70字以上):<br />
									<textarea class="advice_area" id="<?php echo 'other_advice_'.$i;?>" name="<?php echo 'other_advice_'.$i;?>" cols="52" rows="5"></textarea>
									字數<span id="<?php echo 'other_wNum_'.$i;?>"></span>
									<input type="hidden" name="<?php echo 'other_advice_'.$i.'_check'; ?>" id="<?php echo 'other_advice_'.$i.'_check';?>">
								</div>
							</td>
						<?php
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tr style="display:none;" id="next_btn_tr_5"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
					<tr style="display:none;" id="modify_btn_tr_5"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(5);" value="修改完成"></td></tr>
				</table>
			</div>
			<div class="question_content" id="q6" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<div class="bound">
					<p>我有照片可以讓大家下載:</p>
					<input id="photo_radio_1" name="photo_radio" value="1" type="radio" checked="checked" />Y:
					<input id="photo_url" name="photo_url" type="text" /><br />
					<input id="photo_radio_2" name="photo_radio" value="2" type="radio" />N<br /><br />
					<p>在這邊我要改我這禮拜的三個字嗎?</p>
					<input id="mood_radio_1" name="mood_radio" value="1" type="radio" checked="checked" />Y:
					<input id="mood_title" name="mood_title" type="text" /><br />
					<input id="mood_radio_2" name="mood_radio" value="2" type="radio" />N<br /><br />
					<p>我對這三個字的分享是:(我們會幫你整理成一份只有你看的到的專屬日記,請幫忙細細填寫)</p>
					<textarea id="mood_content" name="mood_content" cols="50" rows="4" /></textarea>
					<br /><br />
					<p>最喜歡哪位團員的三個字? (目前只針對三個字的功能,最開心的一餐還沒準備好,請見諒)</p>
					<select id="favorite_mood" name="favorite_mood">
						<?php
							for($i = 1; $i <= $member_num; $i++){
						?>
						<option value="<?php echo $intAID[$i];?>"><?php echo $nick[$i];?></option>
						<?php
							}
						?>
					</select><br /><br />
					<p>我想對這位團員說: (我們會替您把資料整理好,留在每個團員的專屬空間裡)</p>
					<textarea id="mood_talk" name="mood_talk"  cols="50" rows="4" /></textarea><br /><br />
					<p>我這禮拜的特選話題是:</p>
					<select id="favorite_talk" name="favorite_talk">
						<option value="1"><?php echo $row_Recordset1['TALK1'];?></option>
						<option value="2"><?php echo $row_Recordset1['TALK2'];?></option>
						<option value="3"><?php echo $row_Recordset1['TALK3'];?></option>			
					</select><br /><br />
					<p>滿分十分,我對這個話題的喜好度為:</p>
					<input id="talk_score" name="talk_score" type="text" />分<br /><br />
					<p>我對這個話題的分享是:</p>
					<textarea id="talk_content" name="talk_content" cols="50" rows="4" /></textarea><br /><br />
					<p>用餐結束囉!我想對團長說:</p>
					<textarea id="captain_talk" name="captain_talk"  cols="50" rows="4" /></textarea><br /><br />
					<p>我想對所有出團的大家說:</p>
					<textarea id="everyone_talk" name="everyone_talk"  cols="50" rows="4" /></textarea><br /><br />
					<p>希望下次還能邀誰一起吃飯呢?</p>
					<?php
						for($i = 1; $i <= $member_num; $i++){
							if($intAID[$i] != $_GET['AID']){
					?>
					<input type="checkbox" />
					<?php
								if($i%3 == 0)	echo $nick[$i].'<br>';
								else	echo $nick[$i];
							}
						}
					?>
					<br /><br />
					<p>滿分十分,這次活動的總分為:</p>
					<input id="group_score" name="group_score" type="text" />分<br /><br />
				</div>
				
				<table width="420" border="0" cellspacing="0" cellpadding="0">
					<tr id="next_btn_tr_4"><td align="right"><input id="last_btn" type="button" class="next_btn" onClick="send();" value="填完囉！"></td></tr>
				</table>
			</div>
		</div>
	</div>
	<input type="hidden" name="GID" id="GID" value="<?php echo $_GET["GID"]?>">
	<input type="hidden" name="AID" id="AID" value="<?php echo $_GET["AID"]?>">
	</form>
</body>
<script type="text/javascript" src="javascript/questionnaire_member.js" charset="utf-8"></script>
</html>
