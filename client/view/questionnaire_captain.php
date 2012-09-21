<?php
	$connect = mysql_connect("localhost", "root", "1234555");
	$db = mysql_query("SET NAMES 'utf8'");
    mysql_select_db("db_f");
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>團長問卷</title>
	<link href="css/questionnaire_captain.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />
	<script type="text/javascript" src="javascript/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="javascript">
		var myGlobe = {
			nowQ : 1,
			numQ : 4,
			dishNum : 1,
			arriveNum : 0,
			assignNum : 1,
			memberNum : 0,
			memberHash : {},
			absentMember : [],
			arriveMember : []
		}
		<?php
			$query = "SELECT * FROM `group` WHERE `GID` = " . $_GET['GID'];
			$result = mysql_query($query);
			$record = mysql_fetch_assoc($result);
			$member = explode(';', $record['MEMBER']);
			$memberNum = $record['NUMBER'];
			echo "myGlobe.memberNum=". $memberNum . ";";
			for($i = 0; $i < $memberNum; $i++)
			{
				$query1 = "SELECT * FROM `user` WHERE `AID` = " . $member[$i];
				$result1 = mysql_query($query1);
				$record1 = mysql_fetch_assoc($result1);
				echo "myGlobe.memberHash[". $member[$i] . "]='" . $record1['NICKNAME'] . "';";
			}
		?>
	</script>
</head>

<body>
	<form id="questionnire_captain_form" name="questionnire_captain_form" action="questionnaire_captain_action.php" method="post"> 
	<div id="real_body">
		<div id="top_bar"><img src="images/questionaire/quest_top_bg.png"></div>
		<div id="left_bar">
		<table>
			<tbody>
				<tr>
            		<td id="q1_title" width="240" height="70" class="question_current_bg">1 我要回報今天的活動狀態</td>
            		<td id="q1_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(1);" /></td>
          		</tr>
          		<tr>
            		<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            	</tr>
				<tr>
					<td id="q2_title" height="70" class="question_before_bg">2  今天吃了哪些菜</td>
					<td id="q2_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(2);" /></td>
          		</tr>
          		<tr>
            		<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            	</tr>
				<tr>
					<td id="q3_title" height="70" class="question_before_bg">3  我要給所有團員出功課啦</td>
					<td id="q3_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(3);" /></td>
          		</tr>
          		<tr>
            		<td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            	</tr>
				<tr>
					<td id="q4_title" height="70" class="question_before_bg">4  我要介紹這間餐廳的小背景</td>
					<td id="q4_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" onClick="modifyQ(4);" /></td>
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
					<tr>
						<td align="center" bgcolor="#FFFFFF">
							<table width="420" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="guestion_title">1.請問今天有哪幾位團員缺席呢?</td>
								</tr>
								<tr>
									<td class="selection_area">
										<ul>
											<li><input id="allArrive" name="allArrive" type="checkbox" value="1" onClick="q1_checkdata_1();" checked="checked" />全員到齊</li>
											<?php
												$query = "SELECT * FROM `group` WHERE `GID` = " . $_GET['GID'];
												$result = mysql_query($query);
												$record = mysql_fetch_assoc($result);
												$member = explode(';', $record['MEMBER']);
												$memberNum = $record['NUMBER'];
												//var_dump($member);
												for($i = 0; $i < $memberNum; $i++)
												{
													$query1 = "SELECT * FROM `user` WHERE `AID` = " . $member[$i];
													$result1 = mysql_query($query1);
													$record1 = mysql_fetch_assoc($result1);
													//var_dump()	
													echo "<li><input disabled='disabled' id='absent_" . $i . "' name='absent[]' type='checkbox' value='" . $member[$i] . "' />" . $record1['NICKNAME'] . "</li>";
												}
											?>
										</ul>
									</td>
								</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
								</tr>
							</table>
							<table width="420" border="0" cellspacing="0" cellpadding="0">
						  		<tr>
									<td align="left" class="guestion_title">2.平均每個人花了多少錢呢?</td>
						  		</tr>
						  		<tr>
									<td class="selection_area">
										<ul><li><input id="avgPrice" name="avgPrice" type="text"/></ul>
									</td>
						  		</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
						  		</tr>
							</table>
							<table width="420" border="0" cellspacing="0" cellpadding="0">
						  		<tr>
									<td align="left" class="guestion_title">3.下期團長是?</td>
						  		</tr>
						  		<tr>
									<td class="selection_area">
										<ul>
											<li><select name='nextCaptain'/>
											<?php
												//var_dump($member);
												for($i = 0; $i < $memberNum; $i++)
												{
													$query1 = "SELECT * FROM `user` WHERE `AID` = " . $member[$i];
													$result1 = mysql_query($query1);
													$record1 = mysql_fetch_assoc($result1);
													//var_dump()	
													echo "<option value = " . $member[$i] . ">" . $record1['NICKNAME'] . "</option>";
												}
											?>
												</select>
											</li>
										</ul>
									</td>
						  		</tr>
						  		<tr>
									<td height="20" class="dotline_04"></td>
						  		</tr>
							</table>
							<table width="420" border="0" cellspacing="0" cellpadding="0">
						  		<tr id="next_btn_tr_1"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
						  		<tr style="display:none;" id="modify_btn_tr_1"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(1);" value="修改完成"></td></tr>
							</table>
						</td>
					 </tr>
				</table>
			</div>
			<div class="question_content" id="q2" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tr>
						<td align="center" bgcolor="#FFFFFF">
							<table width="420" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="guestion_title">請告訴我們今天吃過的菜及其價錢</td>
								</tr>
								<tr>
									<td>
										<table id="dish_table" style="border: 5px;" frame="border" rules="all">
											<thead id="dish_thead">
												<tr align="center">
													<td class="selection_area" >第幾道</td>
													<td class="selection_area" >菜名<br />(網友吃過的菜可直接下拉選擇)</td>
													<td class="selection_area" >價位<br>(直接填數字 ex: 250)</td>
													<td class="selection_area" >是否為共同大菜?</td>
												</tr>
											</thead>
											<tbody id="dish_tbody">
											<?php
												$query2 = "SELECT * FROM `dish` WHERE `RESTAURANT` = " . $record['RID'];
												$result2 = mysql_query($query2);
												$num = mysql_num_rows($result2);
												for($i = 0; $i < $num; $i++)
												{
													$record2 = mysql_fetch_assoc($result2);
													$dishIdArr[$i] = $record2['DID'];
													$dishNameArr[$i] = $record2['DISH'];
												}
												
												echo "<tr id='dish_tr_0'><td  class='selection_area'>第1道</td><td><table><tr><td>";
												echo "<select id='dishNameSelect_0' name='dishNameSelect_0'>";
												for($j = 0; $j < $num; $j++) echo "<option value='". $dishNameArr[$j] ."'>" . $dishNameArr[$j] . "</option>";
												echo "</select></td></tr><tr><td>";
												echo "<input type='text' name='dishNameText_0' id='dishNameText_0' />";
												echo "</td></tr></table></td><td>";
												echo "<input type='text' name='dishPrice_0' id='dishPrice_0' />";
												echo "</td><td align='center'>";
												echo "<input type='checkbox' name='isShare_0' id='isShare_0' />";
												echo "</td></tr>";
												
												for($i = 1; $i < 50; $i++)
												{
													echo "<tr id='dish_tr_" . $i . "' style='display:none'><td  class='selection_area'>第" . (int)($i+1) . "道</td><td><table><tr><td>";
													echo "<select id='dishNameSelect_" . $i . "' name='dishNameSelect_" . $i . "'>";
													for($j = 0; $j < $num; $j++) echo "<option value='". $dishNameArr[$j] ."'>" . $dishNameArr[$j] . "</option>";
													echo "</select></td></tr><tr><td>";
													echo "<input type='text' name='dishNameText_" . $i . "' id='dishNameText_" . $i . "' />";
													echo "</td></tr></table></td><td>";
													echo "<input type='text' name='dishPrice_" . $i . "' id='dishPrice_" . $i . "' />";
													echo "</td><td align='center'>";
													echo "<input type='checkbox' name='isShare_" . $i . "' id='isShare_" . $i . "' />";
													echo "</td></tr>";
												}
											?>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr align="right"><td><input type="button" value="新增菜色" onClick="addDish();"><input type="button" value="刪除菜色" onClick="delDish();"></td></tr>
					<tr id="next_btn_tr_2"><td align="right"><input type="button" class="next_btn" onClick="generateQ3(); nextQ();" value="下一題"></td></tr>
					<tr style="display:none;" id="modify_btn_tr_2"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(2);" value="修改完成"></td></tr>
				</table>
			</div>
			<div class="question_content" id="q3" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tr>
						<td align="center" bgcolor="#FFFFFF">
							<table width="420" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="guestion_title">請團長幫大家指定個別料理吧!</td>
								</tr>
								<tr>
									<td>
										<table id="share_table" style="border: 5px;" frame="border" rules="all">
											<tbody id="share_tbody">
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr id="next_btn_tr_3"><td align="right"><input type="button" class="next_btn" onClick="nextQ();" value="下一題"></td></tr>
					<tr style="display:none;" id="modify_btn_tr_3"><td align="right"><input type="button" class="modify_btn" onClick="endModifyQ(3);" value="修改完成"></td></tr>
				</table>
			</div>
			<div class="question_content" id="q4" marginwidth="0" #marginheight="0"  border="0" align="left" style="display:none;">
				<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					<tr>
						<td align="center" bgcolor="#FFFFFF">
							<table width="420" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left" class="guestion_title">1.我來介紹一下這家餐廳的地理歷史(200~500字):</td>
								</tr>
								<tr>
									<td class="selection_area">
										<textarea id="description" name="description" cols="50" rows="10"></textarea>
									</td>
								</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
								</tr>
							</table>
							<table width="420" border="0" cellspacing="0" cellpadding="0">
						  		<tr>
									<td align="left" class="guestion_title">2.我要提醒大家用餐的注意事項(最少一項,最多三項):</td>
						  		</tr>
						  		<tr>
									<td class="selection_area">
										(必填)標題一(10字以內):<input id="note_title_1" type="text" name="note_title_1" maxlength="10" /><br />
										內容(30字以內):<br /><textarea id="note_1" name="note_1" cols="50" rows="5"></textarea><br /><br />
										
										<input id="note_check_1" name="note_check_1" type="checkbox" onClick="q4_checkdata_1();" />
										標題二(10字以內):<input id="note_title_2" type="text" name="note_title_2" maxlength="10" disabled="disabled" /><br />
										內容(30字以內):<br /><textarea id="note_2" name="note_2" cols="50" rows="5" disabled="disabled"></textarea><br /><br />
										
										<input id="note_check_2" name="note_check_2" type="checkbox" onClick="q4_checkdata_1();" />
										標題三(10字以內):<input id="note_title_3" type="text" name="note_title_3" maxlength="10" disabled="disabled" /><br />
										內容(30字以內):<br /><textarea id="note_3" name="note_3" cols="50" rows="5" disabled="disabled"></textarea><br /><br />
									</td>
						  		</tr>
								<tr>
									<td height="20" class="dotline_04"></td>
						  		</tr>
							</table>
							<table width="420" border="0" cellspacing="0" cellpadding="0">
						  		<tr id="next_btn_tr_4"><td align="right"><input id="last_btn" type="button" class="next_btn" onClick="send();" value="填完囉！"></td></tr>
							</table>
						</td>
					 </tr>
				</table>
			</div>
		</div>
	</div>
	<input type="hidden" name="dishNum" id="dishNum">
	<input type="hidden" name="arriveNum" id="arriveNum">
	<input type="hidden" name="assignNum" id="assignNum">
	<input type="hidden" name="GID" id="GID" value="<?php echo $_GET["GID"]?>">
	</form>
</body>
<script type="text/javascript" src="javascript/questionnaire_captain.js"></script>
</html>
