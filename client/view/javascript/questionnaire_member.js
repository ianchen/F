function init()
{
    $(".advice_area").keyup(function(){
        var tmp = this.id.split("_");
        $("#" + tmp[0] + "_wNum_" + tmp[2]).html($(this).attr("value").length);
        if($(this).attr("value").length < 40) document.getElementById(this.id + "_check").value = 1;
        else if($(this).attr("value").length > 70) document.getElementById(this.id + "_check").value = 2;
        else document.getElementById(this.id + "_check").value = 0;
    });
}

function nextQ()
{
	var flag = false;
	if(myGlobe.nowQ == 1) flag = q1_checkdata();
	else if(myGlobe.nowQ == 2) flag = q2_checkdata();
	else if(myGlobe.nowQ == 3) flag = q3_checkdata();
	else if(myGlobe.nowQ == 4) flag = q4_checkdata();
	else if(myGlobe.nowQ == 5) flag = q5_checkdata();

	if(flag)
	{
		document.getElementById('q' + myGlobe.nowQ).style.display = 'none';
		document.getElementById('next_btn_tr_' + myGlobe.nowQ).style.display = 'none';
		document.getElementById('modify_btn_tr_' + myGlobe.nowQ).style.display = '';
		document.getElementById('q' + myGlobe.nowQ + '_modify').style.visibility = 'visible';
		document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_finished_bg';
		
		if(1 === myGlobe.nowQ) document.getElementById('progress').src = 'images/questionaire/percentage_01.png';
		else if(3 === myGlobe.nowQ) document.getElementById('progress').src = 'images/questionaire/percentage_02.png';
		else if(4 === myGlobe.nowQ) document.getElementById('progress').src = 'images/questionaire/percentage_03.png';
		else if(6 === myGlobe.nowQ) document.getElementById('progress').src = 'images/questionaire/percentage_04.png';
		
		
		
		document.getElementById('nowProgress').innerHTML = Math.round(myGlobe.nowQ*100/6);
		
		
		myGlobe.nowQ++;
		document.getElementById('q' + myGlobe.nowQ).style.display = '';
		document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_current_bg';	
	}
}

function openShare(n, o)
{
	if("修改" == o.value || "填寫" == o.value)
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q3_sub_button_' + i).hide();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q3_sub_' + i).hide();
		}
		$('.next_btn').hide();
		$('#q3_sub_' + n).show();
		o.style.display = '';
		o.value = "完成";
	}
	else
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q3_sub_button_' + i).show();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q3_sub_' + i).hide();
		}
		$('.next_btn').show();
		o.value = "修改";
	}
}

function openAssign(n, o)
{
	if("修改" == o.value || "填寫" == o.value)
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q4_sub_button_' + i).hide();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q4_sub_' + i).hide();
		}
		$('.next_btn').hide();
		$('#q4_sub_' + n).show();
		o.style.display = '';
		o.value = "完成";
	}
	else
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q4_sub_button_' + i).show();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q4_sub_' + i).hide();
		}
		$('.next_btn').show();
		o.value = "修改";
	}
}

function openOther(n, o)
{
	if("修改" == o.value || "填寫" == o.value)
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q5_sub_button_' + i).hide();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q5_sub_' + i).hide();
		}
		$('.next_btn').hide();
		$('#q5_sub_' + n).show();
		o.style.display = '';
		o.value = "完成";
	}
	else
	{
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q5_sub_button_' + i).show();
		}		
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			$('#q5_sub_' + i).hide();
		}
		$('.next_btn').show();
		o.value = "修改";
	}
}

function checkOther(n, o)
{
	if(myGlobe.otherFlag == 0)
	{
		var tmp = 0;
		for(var i = 1; i <= myGlobe.otherNum; i++)
		{
			if(document.getElementById('q5_sub_check_' + i).checked)
			{
				tmp++;
			}
		}
		if(tmp >= n)
		{
			$('.span_tr').hide();
			$('.other_check').hide();
			$('#q5_main').show();
			$('#next_btn_tr_5').show();
			myGlobe.otherFlag = 1;
			o.value = "回上層更換不同料理";
		}
		else
		{
			alert("菜數不足喔!");
		}
	}
	else
	{
		$('.other_check').show();
		$('.span_tr').show();
		$('#q5_main').hide();
		$('#next_btn_tr_5').hide();
		myGlobe.otherFlag = 0;
		o.value = "確認菜色";
	}
}


function openOtherButton()
{
	for(var i = 1; i <= myGlobe.otherNum; i++)
	{
		if(document.getElementById('q5_sub_check_' + i).checked)
		{
			//$('#q5_sub_span_' + i).hide();
			$('#q5_sub_button_' + i).show();
			$('#q5_sub_tr_' + i).show();
			$('#q5_sub_table_' + i).show();
		}
		else
		{
			//$('#q5_sub_span_' + i).show();
			$('#q5_sub_button_' + i).hide();
			$('#q5_sub_tr_' + i).hide();
			$('#q5_sub_table_' + i).hide();
			$('#q5_sub_' + i).hide();
		}
	}
	$('#check_tr').show();
}

function folderQuestion(t, q, n)
{
	var x = 0;
	if("share" === t) x = 3;
	else if("assign" === t) x = 4;
	else if("other" === t) x = 5;
	
	if(1 === n)
	{
		$('#q' + x + '_sub_score6_' + q).show();
		document.getElementById('q' + x + '_sub_span6_' + q).innerHTML = "無話可說~真滿足!";
		$('#q' + x + '_sub_score2_' + q).show();
		document.getElementById('q' + x + '_sub_span2_' + q).innerHTML = "嗯..有合格喔";
		$('#' + t + '_div1_' + q).hide();
		$('#' + t + '_div2_' + q).hide();
	}
	if(2 === n || 3 === n || 4 === n || 5 === n)
	{
		$('#q' + x + '_sub_score6_' + q).show();
		document.getElementById('q' + x + '_sub_span6_' + q).innerHTML = "無話可說~真滿足!";
		$('#q' + x + '_sub_score2_' + q).hide();
		document.getElementById('q' + x + '_sub_span2_' + q).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;嗯..有合格喔";
		if(2 === n)	document.getElementById('q' + x + '_sub_score3_' + q).checked = true;
		$('#' + t + '_div1_' + q).show();
		$('#' + t + '_div2_' + q).hide();
	}
	if(6 === n || 7 === n || 8 === n || 9 === n)
	{
		$('#q' + x + '_sub_score6_' + q).hide();
		document.getElementById('q' + x + '_sub_span6_' + q).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;無話可說~真滿足!";
		if(6 === n)	document.getElementById('q' + x + '_sub_score7_' + q).checked = true;
		$('#' + t + '_div1_' + q).show();
		$('#' + t + '_div2_' + q).show();
	}
}

function q1_checkdata()
{
	for(var i = 1; i <= 10; i++)
	{
		var flag = 0;	
		for(var j = 1; j <= 5; j++)
		{
			if(document.getElementById("score" + i + "_" + j).checked) flag = 1;
		}
		if(flag == 0)
		{
			alert("尚有項目未打分數,請檢查!");
			return false;
		}
	}
	if(document.getElementById('restaurant_advice').value == '')
	{
		alert('進步一分的方法不可為空白!');
		return false;
	}
	return true;	
}

function q2_checkdata()
{
	for(var i = 1; i <= myGlobe.orderNum; i++)
	{
		var flag = 0;	
		for(var j = 1; j <= 3; j++)
		{
			if(document.getElementById("d_score_" + i + "_" + j).checked) flag = 1;
		}
		if(flag == 0)
		{
			alert("尚有項目未打分數,請檢查!");
			return false;
		}
	}
	
	return true;	
}
function q3_checkdata()
{
	for(var i = 1; i <= myGlobe.shareNum; i++)
	{
		var CheckData = document.getElementById('share_advice_' + i).value;
		if(CheckData == ''){
			alert('共享菜色尚有評論為空白,請檢查.');
			return false;
		}
		if(CheckData.length > 40 && CheckData.length < 70){
			alert('共享菜色尚有評論不符字數要求,請檢查.');
			return false;
		}		
	}
	return true;
}

function q4_checkdata()
{
	for(var i = 1; i <= myGlobe.assignNum; i++)
	{
		var CheckData = document.getElementById('assign_advice_' + i).value;
		if(CheckData == ''){
			alert('指定菜色尚有評論為空白,請檢查.');
			return false;
		}
		if(CheckData.length < 70){
			alert('指定菜色必須發表長評論(字數70以上).');
			return false;
		}		
	}
	return true;
}

function q5_checkdata()
{
	var tmp = 0;
	for(var i = 1; i <= myGlobe.otherNum; i++)
	{
		if(document.getElementById('q5_sub_check_' + i).checked)
		{
			tmp++;
		}
	}
	for(var i = 1; i <= myGlobe.otherNum; i++)
	{
		if(document.getElementById('q5_sub_check_' + i).checked)
		{
			var CheckData = document.getElementById('other_advice_' + i).value;
			if(CheckData == ''){
				alert('自願填寫菜色尚有評論為空白,請檢查.');
				return false;
			}
			if(CheckData.length > 40 && CheckData.length < 70){
				alert('自願填寫菜色尚有評論不符字數要求,請檢查.');
				return false;
			}		
		}
	}
	return true;
}

function q6_checkdata()
{
	if(document.getElementById('photo_radio_1').checked && document.getElementById('photo_url').value == '')
	{
		alert('照片連結為空白,請檢查.');
		return false;
	}
	if(document.getElementById('mood_radio_1').checked && document.getElementById('mood_title').value == '')
	{
		alert('三個字心情為空白,請檢查.');
		return false;
	}		
	if(document.getElementById('mood_radio_1').checked && document.getElementById('mood_title').value.length > 10)
	{
		alert('三個字心情過長,請檢查.');
		return false;
	}	
	if(document.getElementById('mood_content').value == '')
	{
		alert('三個字心情分享為空白,請檢查.');
		return false;
	}	
	if(document.getElementById('mood_talk').value == '')
	{
		alert('對他人的三個字心情分享為空白,請檢查.');
		return false;
	}	
	if(document.getElementById('talk_score').value == '')
	{
		alert('話題分數不可為空白!');
		return false;
	}
	if(isNaN(parseInt(document.getElementById('talk_score').value)))
	{
		alert('話題分數請填入阿拉伯數字!');
		return false;
	}
	if(0 > (parseInt(document.getElementById('talk_score').value)) || 10 < (parseInt(document.getElementById('talk_score').value)))
	{
		alert('話題分數請填入0~10之數字!');
		return false;
	}
	if(document.getElementById('talk_content').value == '')
	{
		alert('話題分享不可為空白!');
		return false;
	}
	if(document.getElementById('captain_talk').value == '')
	{
		alert('對團長說的話不可為空白!');
		return false;
	}
	if(document.getElementById('everyone_talk').value == '')
	{
		alert('對所有團員說的話不可為空白!');
		return false;
	}
	if(document.getElementById('group_score').value == '')
	{
		alert('出團分數不可為空白!');
		return false;
	}
	if(isNaN(parseInt(document.getElementById('group_score').value)))
	{
		alert('出團分數請填入阿拉伯數字!');
		return false;
	}
	if(0 > (parseInt(document.getElementById('group_score').value)) || 10 < (parseInt(document.getElementById('group_score').value)))
	{
		alert('話題分數請填入0~10之數字!');
		return false;
	}
	
	return true;
}

function modifyQ(n)
{
	for(var i = 1; i <= 6; i++)
	{
		document.getElementById('q' + i + '_modify').style.visibility = 'hidden';
		document.getElementById('q' + i).style.display = 'none';
	}
	
	document.getElementById('q' + n).style.display = '';
	document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_before_bg';
	document.getElementById('q' + n + '_title').className = 'question_current_bg';
}

function endModifyQ(n)
{
	var flag = false;
	if(n == 1) flag = q1_checkdata();
	else if(n == 2) flag = q2_checkdata();
	else if(n == 3) flag = q3_checkdata();
	else if(n == 4) flag = q4_checkdata();
	else if(n == 5) flag = q5_checkdata();

	if(flag)
	{
		for(var i = 1; i <= 6; i++)
		{
			if(i < myGlobe.nowQ)
			{
				document.getElementById('q' + i + '_modify').style.visibility = 'visible';
				document.getElementById('q' + i).style.display = 'none';
			}
		}
		
		document.getElementById('q' + myGlobe.nowQ).style.display = '';
		document.getElementById('q' + n + '_title').className = 'question_finished_bg';
		document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_current_bg';
		if(2 === n)
		{
			$("#share_tbody").empty();
			myGlobe.arriveNum = 0;
			myGlobe.assignNum = 1;
			myGlobe.absentMember = [];
			myGlobe.arriveMember = [];
			generateQ3();
			modifyQ(3);
		}
	}
}

function send()
{
	if(!q6_checkdata())
	{
		return;
	}
	document.getElementById('last_btn').disable = true;
	document.questionnire_member_form.submit();
}
