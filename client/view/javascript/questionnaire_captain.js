function nextQ()
{
	document.getElementById('q' + myGlobe.nowQ).style.display = 'none';
	document.getElementById('next_btn_tr_' + myGlobe.nowQ).style.display = 'none';
	document.getElementById('modify_btn_tr_' + myGlobe.nowQ).style.display = '';
	document.getElementById('q' + myGlobe.nowQ + '_modify').style.visibility = 'visible';
	document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_finished_bg';
	
	document.getElementById('progress').src = 'images/questionaire/percentage_0' + myGlobe.nowQ + '.png';
	document.getElementById('nowProgress').innerHTML = myGlobe.nowQ*25;
	
	
	myGlobe.nowQ++;
	document.getElementById('q' + myGlobe.nowQ).style.display = '';
	document.getElementById('q' + myGlobe.nowQ + '_title').className = 'question_current_bg';	
}

function addDish()
{
	if(myGlobe.dishNum <= 49)
		document.getElementById('dish_tr_' + myGlobe.dishNum).style.display = '';
		
	myGlobe.dishNum++;
}

function delDish()
{
	if(myGlobe.dishNum >= 2)
	{
		myGlobe.dishNum--;
		document.getElementById('dish_tr_' + myGlobe.dishNum).style.display = 'none';
	}
}

function generateQ3()
{
	var absentArr = document.getElementsByName("absent[]");
	for(var key in absentArr)
	{
		if(!isNaN(absentArr[key].value) && absentArr[key].checked)
		{
			myGlobe.absentMember.push(absentArr[key].value);
		}
	}
	
	myGlobe.arriveNum = myGlobe.memberNum - myGlobe.absentMember.length;
	for(var i = 0; i < myGlobe.memberNum; i++){
		if((i*myGlobe.arriveNum*2) > myGlobe.dishNum){
			myGlobe.assignNum = i;
			break;
		}
	}
	
	for(var key in myGlobe.memberHash)
	{
		var flag = true;
		for(var key2 in myGlobe.absentMember)
		{
			if(key == myGlobe.absentMember[key2])
			{
				flag = false;
			}
		}
		if(flag)
		{
			myGlobe.arriveMember.push(key);
		}
	}
	
	myGlobe.dishList = [];
	for(var i = 0; i < myGlobe.dishNum; i++)
	{
		if("" === document.getElementById("dishNameText_" + i).value)
		{
			myGlobe.dishList.push(document.getElementById("dishNameSelect_" + i).value);
		}
		else
		{
			myGlobe.dishList.push(document.getElementById("dishNameText_" + i).value);
		}
	}
	
	
	var t = document.getElementById("share_tbody");
	for(var key in myGlobe.arriveMember)
	{
		var row = document.createElement("tr");//新增加 tr element
		var col = document.createElement("td");//新增加 td element
		var cellText = document.createTextNode(myGlobe.memberHash[myGlobe.arriveMember[key]]);//加入文字
		col.appendChild(cellText);//將文字放到 td element 內
		row.appendChild(col);//將 td element 放到 tr element 中
		col = document.createElement("td");
 		for(var i = 0; i < myGlobe.assignNum; i++)
		{
			var dishSelect =  document.createElement("select");
			dishSelect.name = "assign_" + myGlobe.arriveMember[key] + "_" + i;
			for(var key2 in myGlobe.dishList)
			{
				var opt = document.createElement("option");
				var cellText = document.createTextNode(myGlobe.dishList[key2]);
				opt.value = myGlobe.dishList[key2];
				opt.appendChild(cellText);
				dishSelect.appendChild(opt);
			}	
			col.appendChild(dishSelect);
		}
		row.appendChild(col);
		t.appendChild(row);//將 tr element 放到 tbody 中
	}
}

function q1_checkdata_1(){
	if(document.getElementById('allArrive').checked)
	{
		for(var i = 0; i < myGlobe.memberNum; i++)
		{
			document.getElementById('absent_' + i).checked = false;
			document.getElementById('absent_' + i).disabled = true;
		}
	}
	else
	{
		for(var i = 0; i < myGlobe.memberNum; i++)
		{
			document.getElementById('absent_' + i).checked = false;
			document.getElementById('absent_' + i).disabled = false;
		}
	}
}

function q1_checkdata_2()
{
	if(document.getElementById('avgPrice').value == ''){
		alert('價格不可為空白!');
		return false;
	}
	if(isNaN(parseInt(document.getElementById('avgPrice').value))){
		alert('價格請填入阿拉伯數字!');
		return false;
	}
	return true;
}

function q2_checkdata_1()
{
	for(var i = 0; i < myGlobe.dishNum; i++)
	{
		if(document.getElementById('dishPrice_' + i).value == '')
		{
			alert('第' + (i+1) + '道菜價格不可為空白!');
			return false;
		}
		if(isNaN(parseInt(document.getElementById('dishPrice_' + i).value)))
		{
			alert('第' + (i+1) + '道菜價格請填入阿拉伯數字!');
			return false;
		}
	}
	return true;
}


function q4_checkdata_1()
{
	if(document.getElementById('note_check_1').checked)
	{
		document.getElementById('note_title_2').disabled = false;
		document.getElementById('note_2').disabled = false;
	}
	else
	{
		document.getElementById('note_title_2').disabled = true;
		document.getElementById('note_2').disabled = true;
	}
	if(document.getElementById('note_check_2').checked)
	{
		document.getElementById('note_title_3').disabled = false;
		document.getElementById('note_3').disabled = false;
	}
	else
	{
		document.getElementById('note_title_3').disabled = true;
		document.getElementById('note_3').disabled = true;
	}
}

function q4_checkdata_2(){
	if(document.getElementById('photo_1').checked){
		document.getElementById('photo_url').disabled = false;
	}
	else if(document.getElementById('photo_2').checked){
		document.getElementById('photo_url').disabled = true;
	}
}

function q4_checkdata_3(){
	var CheckData = document.getElementById('description').value;
	if(CheckData == ''){
		alert('餐廳敘述不可空白');
		return false;
	}
	if(CheckData.length < 100){
		alert('餐廳敘述不可低於100字');
		return false;
	}
	if(CheckData.length > 500){
		alert('餐廳敘述不可多於500字');
		return false;
	}
	
	
	var CheckData = document.getElementById('note_title_1').value;
	if(CheckData == ''){
		alert('用餐注意事項一的標題不可為空白');
		return false;
	}
	var CheckData = document.getElementById('note_1').value;
	if(CheckData == ''){
		alert('用餐注意事項一不可為空白');
		return false;
	}
	if(CheckData.length > 30){
		alert('用餐注意事項一不可高於30字');
		return false;
	}
	
	if(document.getElementById('note_check_1').checked){
		var CheckData = document.getElementById('note_title_2').value;
		if(CheckData == ''){
			alert('用餐注意事項二的標題不可為空白');
			return false;
		}
		var CheckData = document.getElementById('note_2').value;
		if(CheckData == ''){
			alert('用餐注意事項二不可為空白');
			return false;
		}
		if(CheckData.length > 30){
			alert('用餐注意事項二不可高於30字');
			return false;
		}
	}
	
	if(document.getElementById('note_check_2').checked){
		var CheckData = document.getElementById('note_title_3').value;
		if(CheckData == ''){
			alert('用餐注意事項三的標題不可為空白');
			return false;
		}
		var CheckData = document.getElementById('note_3').value;
		if(CheckData == ''){
			alert('用餐注意事項三不可為空白');
			return false;
		}
		if(CheckData.length > 30){
			alert('用餐注意事項三不可高於30字');
			return false;
		}
	}
	
	if(document.getElementById('photo_1').checked){
		var CheckData = document.getElementById('photo_url').value;
		if(CheckData == ''){
			alert('照片連結不可為空白');
			return false;
		}
	}
	return true;
}

function modifyQ(n)
{
	for(var i = 1; i <= 4; i++)
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
	for(var i = 1; i <= 4; i++)
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

function send()
{
	if(!q1_checkdata_2())
	{
		return;
	}
	if(!q2_checkdata_1())
	{
		return;
	}
	if(!q4_checkdata_3())
	{
		return;
	}
	$('#dishNum').attr('value', myGlobe.dishNum);
	$('#arriveNum').attr('value', myGlobe.arriveNum);
	$('#assignNum').attr('value', myGlobe.assignNum);
	document.getElementById('last_btn').disable = true;
	document.questionnire_captain_form.submit();
}