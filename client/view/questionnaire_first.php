
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>首次參加問卷</title>
	<link href="css/questionnaire_first.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />
	
</head>
<body>
	<form id="questionnire_first_form" name="questionnire_first_form" action="questionnaire_first_action.php" method="post"> 
	<div id="real_body">
		<div id="top_bar"><img src="images/questionaire/quest_top_bg_m.png"></div>
		<div id="left_bar">
			<table>
				<tbody>
					<tr>
						<td id="q1_title" width="240" height="43" class="question_current_bg">1 我是從哪裡知道＂一起吃飯的朋友＂的？ </td>
						<td id="q1_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(1);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q2_title" height="43" class="question_before_bg">2  第一次知道我們的時候就報名了嗎？如果沒有，請問當時您有什麼考量因此沒有報名？ </td>
						<td id="q2_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(2);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q3_title" height="43" class="question_before_bg">3  那麼，這次會讓您決定報名這一間餐廳的原因是什麼？</td>
						<td id="q3_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(3);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q4_title" height="43" class="question_before_bg">4  收到邀請名單後，出團前有任何讓您覺得緊張或不放心的事情嗎？</td>
						<td id="q4_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(4);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q5_title" height="43" class="question_before_bg">5  實際參加＂一起吃飯的朋友＂聚會之後，您對這樣的活動的感覺是？</td>
						<td id="q5_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(5);" /></td>
					</tr>
					<tr>
						<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
					</tr>
					<tr>
						<td id="q6_title" height="43" class="question_before_bg">6  還希望我們可以舉辦什麼樣的活動呢？</td>
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
						<tr><td><h3 align="left">我是從哪裡知道＂一起吃飯的朋友＂的？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q1_blank" id="q1_blank"></textarea></td></tr>
						<tr id="next_btn_tr_1"><td colspan="6" align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_1"><td colspan="6" align="right"><input type="button" class="modify_btn" onClick="endModifyQ(1);" value="修改完成"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="question_content" id="q2" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tbody align="center" >
						<tr><td><h3 align="left">第一次知道我們的時候就報名了嗎？如果沒有，請問當時您有什麼考量因此沒有報名？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q2_blank" id="q2_blank"></textarea></td></tr>
						<tr id="next_btn_tr_2"><td colspan="6" align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_2"><td colspan="6" align="right"><input type="button" class="modify_btn" onClick="endModifyQ(2);" value="修改完成"></td></tr>
					</tbody>				
				</table>
			</div>
			<div class="question_content" id="q3" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">				
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tbody align="center" >
						<tr><td><h3 align="left">那麼，這次會讓您決定報名這一間餐廳的原因是什麼？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q3_blank" id="q3_blank"></textarea></td></tr>
						<tr id="next_btn_tr_3"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_3"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(3);" value="修改完成"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="question_content" id="q4" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">			
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tbody align="center" >
						<tr><td><h3 align="left">收到邀請名單後，出團前有任何讓您覺得緊張或不放心的事情嗎？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q4_blank" id="q4_blank"></textarea></td></tr>
						<tr id="next_btn_tr_4"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_4"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(4);" value="修改完成"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="question_content" id="q5" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tbody align="center" >
						<tr><td><h3 align="left">實際參加＂一起吃飯的朋友＂聚會之後，您對這樣的活動的感覺是？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q5_blank" id="q5_blank"></textarea></td></tr>
						<tr id="next_btn_tr_5"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						<tr style="display:none;" id="modify_btn_tr_5"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(5);" value="修改完成"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="question_content" id="q6" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="3" cellspacing="0" width="420">
					<tbody align="center" >
						<tr><td><h3 align="left">還希望我們可以舉辦什麼樣的活動呢？</h3></td></tr>
						<tr><td><textarea cols="45" rows="10" name="q6_blank" id="q6_blank"></textarea></td></tr>
						<tr id="next_btn_tr_6"><td align="right"><input type="button" class="next_btn" onClick="send();" value="填完囉！"></td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<input type="hidden" name="GID" id="GID" value="<?php echo $_GET["GID"]?>">
	<input type="hidden" name="AID" id="AID" value="<?php echo $_GET["AID"]?>">
	</form>
</body>
<script type="text/javascript" src="javascript/questionnaire_first.js" charset="utf-8"></script>
</html>
