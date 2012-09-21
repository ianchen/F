var myGlobe = {
	nowQ : 1
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


function q1_checkdata()
{
	if(document.getElementById('q1_blank').value == '')
	{
		alert('The answer can not be empty.');
		return false;
	}
	return true;	
}

function q2_checkdata()
{
	if(document.getElementById('q2_blank').value == '')
	{
		alert('The answer can not be empty.');
		return false;
	}
	return true;	
}
function q3_checkdata()
{
	if(document.getElementById('q3_blank').value == '')
	{
		alert('The answer can not be empty.');
		return false;
	}
	return true;	
}

function q4_checkdata()
{
	if(document.getElementById('q4_blank').value == '')
	{
		alert('The answer can not be empty.');
		return false;
	}
	return true;	
}

function q5_checkdata()
{
	if(document.getElementById('q5_blank').value == '')
	{
		alert('The answer can not be empty.');
		return false;
	}
	return true;	
}

function q6_checkdata()
{
	if(document.getElementById('q6_blank').value == '')
	{
		alert('The answer can not be empty.');
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
	}
}

function send()
{
	if(!q6_checkdata())
	{
		return;
	}
	document.questionnire_first_form.submit();
	//alert("No database.");
}
