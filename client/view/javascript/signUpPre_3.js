function agree_1(){
	document.getElementById('question').innerHTML = '2. ��ť����ɡA�����ӭn�Ȯ������ᱵť�A���|�������_�ӳ�';
	document.getElementById('agree').onclick = agree_2;	
}

function agree_2(){
	document.getElementById('question').innerHTML = '3. �έ����ɦۤv�����D�ɡA�����ӭn�ݧڪ�����A��ڪ��ѡA��ڪ��F�y�p�U����';
	document.getElementById('agree').onclick = agree_3;
}

function agree_3(){
	document.getElementById('question').innerHTML = '4. �Ϊ��J��ݭn���������p�A�����ӭn�P�j�a�@�_���U�L';
	document.getElementById('agree').onclick = agree_4;
}

function agree_4(){
	setTimeout('document.signUpPre_3.submit();',0);
}

function wrong(){
	alert('���צn�����ӹ��~�n���n�A�Ҽ{�@�U�O?');
}