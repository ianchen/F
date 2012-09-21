var myGlobe = {
	nowQ : 1,
	numQ : 4,
	dishNum : 1
}

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