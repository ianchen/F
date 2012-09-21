function agree_1(){
	document.getElementById('question').innerHTML = '2. 接聽手機時，我應該要';
	document.getElementById('agree').value = '暫時離場後接聽';
	document.getElementById('disagree').value = '直接拿起來喂';
	document.getElementById('agree').onclick = agree_2;	
}

function agree_2(){
	document.getElementById('question').innerHTML = '3. 團員分享自己的話題時，我應該要';
	document.getElementById('agree').value = '與大家一起聆聽';
	document.getElementById('disagree').value = '看我的手機，聊我的天，跟我的鄰座私下鬼扯';
	document.getElementById('agree').onclick = agree_3;
}

function agree_3(){
	document.getElementById('question').innerHTML = '4. 團長遇到需要幫忙的狀況，我應該要';
	document.getElementById('agree').value = '與大家一起幫助他';
	document.getElementById('disagree').value = '變成一起看好戲的朋友，看他出糗';
	document.getElementById('agree').onclick = agree_4;
}

function agree_4(){
	setTimeout('document.signUpPre_2.submit();',0);
}

function wrong(){
	alert('答案好像不太對喔~要不要再考慮一下呢?');
}
