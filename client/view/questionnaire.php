<?php
  require('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>團長問卷</title>
<link href="css/questionnaire.css" rel="stylesheet" type="text/css">
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
</head>

<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="600" align="center" valign="top" bgcolor="#efebe5" ><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" colspan="2" class="top_bg">&nbsp;</td>
        </tr>
      <tr>
        <td width="280" height="500" align="center" valign="top"><table width="280" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td id="q1_title" width="240" height="70" class="question_current_bg">1 我要回報今天的活動狀態</td>
            <td id="q1_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
          </tr>
          <tr>
            <td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            </tr>
<tr>
            <td id="q2_title" height="70" class="question_before_bg">2  今天吃了哪些菜</td>
            <td id="q2_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
          </tr>
          <tr>
            <td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            </tr>
<tr>
            <td id="q3_title" height="70" class="question_before_bg">3  我要給所有團員出功課啦</td>
            <td id="q3_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
          </tr>
          <tr>
            <td height="10" colspan="2" class="dotline_03">&nbsp;</td>
            </tr>
<tr>
            <td id="q4_title" height="70" class="question_before_bg">4  我要介紹這間餐廳的小背景</td>
            <td id="q4_modify" width="40" align="left" valign="bottom" bgcolor="#EFEBE5" class="btn_edit_fix"><input name="btn_login" type="button" class="btn_edit" id="btn_edit" value=" "  valign="top" /></td>
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
        </table></td>
        <td width="520" height="500" align="left" valign="top" class="main_bg"><table width="460" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="450" align="left" valign="middle">
				<div id="q1" width="100%" marginwidth="0" #marginheight="0"  border="0" align="left" style="overflow:scroll; height:440px;">
					<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					  <tr>
						<td align="center" bgcolor="#FFFFFF"><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">1.請問今天有哪幾位團員缺席呢?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
								<li><input name="allArrive" type="checkbox" value="1" />全員到齊</li>
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
										echo "<li><input name='absent[]' type='checkbox' value='" . $member[$i] . "' />" . $record1['NICKNAME'] . "</li>";
									}
								?>
							</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">2.平均每個人花了多少錢呢?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul><li><input name="avgPrice" type="text"/></ul>
							</td>
						  </tr>
								<tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
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
									<select>
								<li>
							</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr id="next_btn_tr_1"><td align="right"><input type="button" class="next_btn" onclick="nextQ();" value="下一題"></td></tr>
						  <tr style="display:none;" id="modify_btn_tr_1"><td align="right"><input type="button" class="modify_btn" onclick="modifyQ();" value="修改完成"></td></tr>
						</table></td>
					  </tr>
					</table>
				</div>
				<div id="q2" width="100%" marginwidth="0" #marginheight="0"  border="0" align="left" style="overflow:scroll; height:440px; display:none;">
					<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					  <tr>
						<td align="center" bgcolor="#FFFFFF"><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">請告訴我們今天吃過的菜及其價錢</td>
						  </tr>
						  <tr>
							<td class="selection_area">
								<table id="dish_table" style="border: 5px;" frame="border" rules="all">
									<thead id="dish_thead">
										<tr align="center">
											<td >第幾道</td>
											<td >菜名<br />(網友吃過的菜可直接下拉選擇)</td>
											<td >價位<br>(直接填數字 ex: 250)</td>
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
										
										echo "<tr id='dish_tr_0'><td>第1道</td><td><table><tr><td>";
										echo "<select id='dishNameSelect_0' name='dishNameSelect_0'>";
										for($j = 0; $j < $num; $j++) echo "<option value='". $dishIdArr[$j] ."'>" . $dishNameArr[$j] . "</option>";
										echo "</select></td></tr><tr><td>";
										echo "<input type='text' name='dishNameText_0' id='dishNameText_0' />";
										echo "</td></tr></table></td><td>";
										echo "<input type='text' name='dishPrice' id='dishPrice' />";
										echo "</td></tr>";
										
										for($i = 1; $i < 50; $i++)
										{
											echo "<tr id='dish_tr_" . $i . "' style='display:none'><td>第" . (int)($i+1) . "道</td><td><table><tr><td>";
											echo "<select id='dishNameSelect_" . $i . "' name='dishNameSelect_" . $i . "'>";
											for($j = 0; $j < $num; $j++) echo "<option value='". $dishIdArr[$j] ."'>" . $dishNameArr[$j] . "</option>";
											echo "</select></td></tr><tr><td>";
											echo "<input type='text' name='dishNameText_" . $i . "' id='dishNameText_" . $i . "' />";
											echo "</td></tr></table></td><td>";
											echo "<input type='text' name='dishPrice' id='dishPrice' />";
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
						  <tr align="right"><td><input type="button" value="新增菜色" onclick="addDish();"><input type="button" value="刪除菜色" onclick="delDish();"></td></tr>
						  <tr id="next_btn_tr_2"><td align="right"><input type="button" class="next_btn" onclick="nextQ();" value="下一題"></td></tr>
						  <tr style="display:none;" id="modify_btn_tr_2"><td align="right"><input type="button" class="modify_btn" onclick="modifyQ();" value="修改完成"></td></tr>
						</table></td>
					  </tr>
					</table>
				</div>
				<div id="q3" width="100%" marginwidth="0" #marginheight="0"  border="0" align="left" style="overflow:scroll; height:440px; display:none;">
					<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					  <tr>
						<td align="center" bgcolor="#FFFFFF"><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">1.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">2.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />
							  選項選項選項選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
								<tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">3.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">4.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						  <tr id="next_btn_tr_3"><td align="right"><input type="button" class="next_btn" onclick="nextQ();" value="下一題"></td></tr>
						  <tr style="display:none;" id="modify_btn_tr_3"><td align="right"><input type="button" class="modify_btn" onclick="modifyQ();" value="修改完成"></td></tr>
						</table></td>
					  </tr>
					</table>
				</div>
				<div id="q4" width="100%" marginwidth="0" #marginheight="0"  border="0" align="left" style="overflow:scroll; height:440px; display:none;">
					<table border="0" align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="420">
					  <tr>
						<td align="center" bgcolor="#FFFFFF"><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">1.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">2.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />
							  選項選項選項選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
								<tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">3.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						</table><table width="420" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="left" class="guestion_title">4.問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一問題一?</td>
						  </tr>
						  <tr>
							<td class="selection_area">
							<ul>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>
							<li><input name="" type="checkbox" value="" />選項</li>		
					
								</ul>
							</td>
						  </tr>
						  <tr>
							<td height="20" class="dotline_04"></td>
						  </tr>
						  <tr id="finish_btn_tr"><td align="right"><input type="button" class="finish_btn" onclick="finishQ();" value="填完囉"></td></tr>
						  <tr style="display:none;" id="modify_btn_tr_4"><td align="right"><input type="button" class="modify_btn" onclick="modifyQ();" value="修改完成"></td></tr>
						</table></td>
					  </tr>
					</table>
				</div>
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<script type="text/javascript" src="javascript/questionnaire.js"></script>
</html>
