function a1_next(){
	document.getElementById('question1').style.display = 'none';
	document.getElementById('a1').style.display = 'none';
	document.getElementById('question2').style.display = '';
	document.getElementById('a2').style.display = '';
}

function a2_next(){
	document.getElementById('question2').style.display = 'none';
	document.getElementById('a2').style.display = 'none';
	document.getElementById('question3').style.display = '';
	document.getElementById('a3').style.display = '';
}

function a3_next(){
	document.getElementById('question3').style.display = 'none';
	document.getElementById('a3').style.display = 'none';
	document.getElementById('question4').style.display = '';
	document.getElementById('a4').style.display = '';
}

function a4_next(){
	document.getElementById('question4').style.display = 'none';
	document.getElementById('a4').style.display = 'none';
	document.getElementById('question5').style.display = '';
	document.getElementById('a5').style.display = '';
}

function a5_next(){
	document.getElementById('question5').style.display = 'none';
	document.getElementById('a5').style.display = 'none';
	document.getElementById('question6').style.display = '';
	document.getElementById('a6').style.display = '';
}

function a6_next(){
	alert('恭喜您報名完成囉！系統將為您轉回主頁面．');
	setTimeout('document.signUp.submit();',0);
}

function wrong(){
	alert('這是每個人都要遵守的項目喔！如果不同意的話就沒辦法參加囉！');
}