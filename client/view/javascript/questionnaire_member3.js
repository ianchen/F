function next_question_1(){
	document.getElementById('main').className = 'main_block_2';
	document.getElementById('q1_main').className = 'done_main';
	document.getElementById('q2_main').className = 'now_main';
	document.getElementById('q1_sub').className = 'done_sub';
	document.getElementById('q2_sub').className = 'now_sub';
	document.getElementById('q1_modify').style.display = '';
	document.getElementById('next_button_1').style.display = 'none';
	document.getElementById('done_button_1').style.display = '';
	document.getElementById('now1').value = 2;
	document.getElementById('now2').value = 0;
	document.getElementById('switch').value = 1;
}
function next_question_2(){
	document.getElementById('main').className = 'main_block_3';
	document.getElementById('q2_main').className = 'done_main';
	document.getElementById('q3_main').className = 'now_main';
	document.getElementById('q2_sub').className = 'done_sub';
	document.getElementById('q3_sub').className = 'now_sub';
	document.getElementById('q2_modify').style.display = '';
	document.getElementById('next_button_2').style.display = 'none';
	document.getElementById('done_button_2').style.display = '';
	document.getElementById('now1').value = 3;
	document.getElementById('now2').value = 0;
	document.getElementById('switch').value = 1;
}

function next_question_3(){
	if(share_num == 0){
		document.getElementById('main').className = 'main_block_4';
		document.getElementById('q3_main').className = 'done_main';
		document.getElementById('q4_main').className = 'now_main';
		document.getElementById('q3_sub').className = 'done_sub';
		document.getElementById('q4_sub').className = 'now_sub';
		document.getElementById('q3_modify').style.display = '';
		document.getElementById('next_button_3').style.display = 'none';
		document.getElementById('done_button_3').style.display = '';
		document.getElementById('now1').value = 4;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		document.getElementById('main').className = 'main_block_3';
		document.getElementById('q3_main').className = 'now_main';
		document.getElementById('q3_main_sub').className = 'use_table';
		document.getElementById('share_1').className = 'now_dish';
		document.getElementById('q3_sub').className = 'done_sub';
		document.getElementById('q3_sub_1').className = 'now_sub';
		document.getElementById('q3_modify').style.display = '';
		document.getElementById('next_button_3').style.display = 'none';
		document.getElementById('done_button_3').style.display = '';
		document.getElementById('now1').value = 3;
		document.getElementById('now2').value = 1;
		document.getElementById('switch').value = 2;
	}
}

function next_question_3_sub(){
	var now2 = document.getElementById('now2').value;
	var done_dish = 'share_' + now2;
	var now_dish = 'share_' + (parseInt(now2)+1);
	var done_sub = 'q3_sub_' + now2;
	var now_sub = 'q3_sub_' + (parseInt(now2)+1);
	var modify = 'share_modify_' + now2;
	var next = 'next_button_3_' + now2;
	var done = 'done_button_3_' + now2;
		
	if(now2 == share_num){
		document.getElementById('main').className = 'main_block_4';
		document.getElementById('q3_main').className = 'done_main';
		document.getElementById('q4_main').className = 'now_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q4_sub').className = 'now_sub';
		document.getElementById('q3_main_sub').className = 'unuse_table';
		document.getElementById(modify).style.display = '';
		document.getElementById(next).style.display = 'none';
		document.getElementById(done).style.display = '';
		document.getElementById('now1').value = 4;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		document.getElementById('main').className = 'main_block_3';
		document.getElementById('q3_main').className = 'now_main';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(modify).style.display = '';
		document.getElementById(next).style.display = 'none';
		document.getElementById(done).style.display = '';
		document.getElementById('now1').value = 3;
		document.getElementById('now2').value++;
		document.getElementById('switch').value = 2;
	}
}

function next_question_4(){
	if(share_num == 0){
		document.getElementById('main').className = 'main_block_5';
		document.getElementById('q4_main').className = 'done_main';
		document.getElementById('q5_main').className = 'now_main';
		document.getElementById('q4_sub').className = 'done_sub';
		document.getElementById('q5_sub').className = 'now_sub';
		document.getElementById('q4_modify').style.display = '';
		document.getElementById('next_button_4').style.display = 'none';
		document.getElementById('done_button_4').style.display = '';
		document.getElementById('now1').value = 5;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		document.getElementById('main').className = 'main_block_4';
		document.getElementById('q4_main').className = 'now_main';
		document.getElementById('q4_main_sub').className = 'use_table';
		document.getElementById('assign_1').className = 'now_dish';
		document.getElementById('q4_sub').className = 'done_sub';
		document.getElementById('q4_sub_1').className = 'now_sub';
		document.getElementById('q4_modify').style.display = '';
		document.getElementById('next_button_4').style.display = 'none';
		document.getElementById('done_button_4').style.display = '';
		document.getElementById('now1').value = 4;
		document.getElementById('now2').value = 1;
		document.getElementById('switch').value = 3;
	}
}

function next_question_4_sub(){
	var now2 = document.getElementById('now2').value;
	var done_dish = 'assign_' + now2;
	var now_dish = 'assign_' + (parseInt(now2)+1);
	var done_sub = 'q4_sub_' + now2;
	var now_sub = 'q4_sub_' + (parseInt(now2)+1);
	var modify = 'assign_modify_' + now2;
	var next = 'next_button_4_' + now2;
	var done = 'done_button_4_' + now2;
		
	if(now2 == assign_num){
		document.getElementById('main').className = 'main_block_5';
		document.getElementById('q4_main').className = 'done_main';
		document.getElementById('q5_main').className = 'now_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q5_sub').className = 'now_sub';
		document.getElementById('q4_main_sub').className = 'unuse_table';
		document.getElementById(modify).style.display = '';
		document.getElementById(next).style.display = 'none';
		document.getElementById(done).style.display = '';
		document.getElementById('now1').value = 5;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		document.getElementById('main').className = 'main_block_4';
		document.getElementById('q4_main').className = 'now_main';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(modify).style.display = '';
		document.getElementById(next).style.display = 'none';
		document.getElementById(done).style.display = '';
		document.getElementById('now1').value = 4;
		document.getElementById('now2').value++;
		document.getElementById('switch').value = 3;
	}
}

function vol_check(){
	vol_num = 0;
	for(var i = 1; i <= other_num; i++){
		var vol_select = 'vol_select_' + i;
		if(document.getElementById(vol_select).checked){
			vol_num++;
			var vol_span = 'vol_span_' + vol_num;
			vol_choose[i] = 1;
			document.getElementById(vol_span).innerHTML = other_name[i];
		}
		else	vol_choose[i] = 0;
	}
	for(i = (parseInt(vol_num)+1); i <= other_num; i++){
		var vol_span = 'vol_span_' + i;
		document.getElementById(vol_span).innerHTML = '';
	}
}

function next_question_5(){
	if(vol_num == 0){
		document.getElementById('main').className = 'main_block_6';
		document.getElementById('q5_main').className = 'done_main';
		document.getElementById('q6_main').className = 'now_main';
		document.getElementById('q5_sub').className = 'done_sub';
		document.getElementById('q6_sub').className = 'now_sub';
		document.getElementById('q5_modify').style.display = '';
		document.getElementById('next_button_5').style.display = 'none';
		document.getElementById('done_button_5').style.display = '';
		document.getElementById('now1').value = 6;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		for(var i = 1; i <= other_num; i++){
			if(vol_choose[i] == 1)	break;
		}
		var now_sub = 'q5_sub_' + i;
		document.getElementById('main').className = 'main_block_5';
		document.getElementById('q5_main').className = 'now_main';
		document.getElementById('q5_main_sub').className = 'use_table';
		document.getElementById('vol_1').className = 'now_dish';
		document.getElementById('q5_sub').className = 'done_sub';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById('q5_modify').style.display = '';
		document.getElementById('next_button_5').style.display = 'none';
		document.getElementById('done_button_5').style.display = '';
		document.getElementById('now1').value = 5;
		document.getElementById('now2').value = i;
		document.getElementById('switch').value = 4;
		document.getElementById('vol_count').value++;
	}
}
	
function next_question_5_sub(){
	var next = find_next();
	var now2 = document.getElementById('now2').value;
	var vol_count = document.getElementById('vol_count').value;
	var done_sub = 'q5_sub_' + now2;
	var now_sub = 'q5_sub_' + next;
	var done_dish = 'vol_' + vol_count;
	var now_dish = 'vol_' + (parseInt(vol_count)+1);
	var next_button = 'next_button_5_' + now2;
	var done_button = 'done_button_5_' + now2;
	var modify_button = 'vol_modify_' + vol_count;
	
	if(next == 0){
		document.getElementById('main').className = 'main_block_6';
		document.getElementById('q5_main').className = 'done_main';
		document.getElementById('q6_main').className = 'now_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q6_sub').className = 'now_sub';
		document.getElementById('q5_main_sub').className = 'unuse_table';
		document.getElementById(modify_button).style.display = '';
		document.getElementById(next_button).style.display = 'none';
		document.getElementById(done_button).style.display = '';
		document.getElementById('now1').value = 6;
		document.getElementById('now2').value = 0;
		document.getElementById('switch').value = 1;
	}
	else{
		document.getElementById('main').className = 'main_block_5';
		document.getElementById('q5_main').className = 'now_main';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(modify_button).style.display = '';
		document.getElementById(next_button).style.display = 'none';
		document.getElementById(done_button).style.display = '';
		document.getElementById('now1').value = 5;
		document.getElementById('now2').value = next;
		document.getElementById('switch').value = 4;
		document.getElementById('vol_count').value++;
	}
}
	
function find_next(){
	var now2 = document.getElementById('now2').value;
	var vol_count = document.getElementById('vol_count').value;
	
	if(vol_count == vol_num)	return 0;
	else{
		for(var i = (parseInt(now2)+1); i <= other_num; i++){
			if(vol_choose[i] == 1)	return i;
		}
	}
}

function next_question_6(){
	document.getElementById('main').className = 'main_block_6';
	document.getElementById('q6_main').className = 'done_main';
	document.getElementById('q6_sub').className = 'done_sub';
	document.getElementById('q6_modify').style.display = '';
	document.getElementById('next_button_6').style.display = 'none';
	document.getElementById('done_button_6').style.display = '';
	document.getElementById('now1').value = 0;
	document.getElementById('now2').value = 0;
	document.getElementById('switch').value = 0;
}

function next_onclick_1(){
	next_question_1();
}

function next_onclick_2(){
	next_question_2();
}

function next_onclick_3(){
	next_question_3();
}

function next_onclick_3_sub(){
	next_question_3_sub();
}

function next_onclick_4(){
	next_question_4();
}

function next_onclick_4_sub(){
	next_question_4_sub();
}

function next_onclick_5(){
	vol_check();
	next_question_5();
}

function next_onclick_5_sub(){
	next_question_5_sub();
}

function next_onclick_6(){
	next_question_6();
}

function modify_question(mod){
	close_modify();
	close_now();
	var main_block = 'main_block_' + mod;
	var now_main = 'q' + mod + '_main';
	var now_sub = 'q' + mod + '_sub';
	document.getElementById('main').className = main_block;
	document.getElementById(now_main).className = 'now_main';
	document.getElementById(now_sub).className = 'now_sub';
	
	if(mod == 3||mod == 4||mod == 5){
		var now2 = document.getElementById('now2').value;
		var state = document.getElementById('switch').value;
		var vol_count = document.getElementById('vol_count').value;
		var end = 0;
		var table = 'q' + mod + '_main_sub';
		
		document.getElementById(table).className = 'use_table';
		if(mod == 3){
			if(state == 2)	end = now2-1;
			else end = share_num;
		}
		else if(mod == 4){
			if(state == 3)	end = now2-1;
			else end = assign_num;
		}
		else if(mod == 5){
			if(state == 4)	end = vol_count-1;
			else end = vol_num;
		}
		for(var i = 1; i <= end; i++){
			if(mod == 3)	var modify = 'share_modify_' + i;
			else if(mod == 4)	var modify = 'assign_modify_' + i;
			else if(mod == 5)	var modify = 'vol_modify_' + i;
			document.getElementById(modify).style.display = '';
		}
	}
}

function modify_question_3_sub(mod){
	close_modify();
	close_now();
	var now_dish = 'share_' + mod;
	var now_sub = 'q3_sub_' + mod;
	document.getElementById('q3_main').className = 'now_main';
	document.getElementById(now_sub).className = 'now_sub';
	document.getElementById(now_dish).className = 'now_dish';
	document.getElementById('q3_main_sub').className = 'use_table';
}

function modify_question_4_sub(mod){
	close_modify();
	close_now();
	var now_dish = 'assign_' + mod;
	var now_sub = 'q4_sub_' + mod;
	document.getElementById('q4_main').className = 'now_main';
	document.getElementById(now_sub).className = 'now_sub';
	document.getElementById(now_dish).className = 'now_dish';
	document.getElementById('q4_main_sub').className = 'use_table';
}

function modify_question_5_sub(mod){
	close_modify();
	close_now();
	var now_dish = 'share_' + mod;
	var count = 0;
	for(var i = 1; i <= other_num; i++){
		if(vol_choose[i] == 1)	count++;
		if(count == mod) break;
	}
	var now_sub = 'q5_sub_' + i;
	document.getElementById('q5_main').className = 'now_main';
	document.getElementById(now_sub).className = 'now_sub';
	document.getElementById(now_dish).className = 'now_dish';
	document.getElementById('q5_main_sub').className = 'use_table';
}

function close_modify(){
	for(var i = 1; i <= 6; i++){
		var modify = 'q' + i + '_modify';
		document.getElementById(modify).style.display = 'none';
	}
	for(i = 1; i <= share_num; i++){
		var modify = 'share_modify_' + i;
		document.getElementById(modify).style.display = 'none';
	}
	for(i = 1; i <= assign_num; i++){
		var modify = 'assign_modify_' + i;
		document.getElementById(modify).style.display = 'none';
	}
	for(i = 1; i <= vol_num; i++){
		var modify = 'vol_modify_' + i;
		document.getElementById(modify).style.display = 'none';
	}
}

function close_now(){
	var now1 = document.getElementById('now1').value;
	var now2 = document.getElementById('now2').value;
	var state = document.getElementById('switch').value;
	var vol_count = document.getElementById('vol_count').value;
	
	if(state == 1){
		var wait_main = 'q' + now1 + '_main';
		var wait_sub = 'q' + now1 + '_sub';
		document.getElementById(wait_main).className = 'wait_main';
		document.getElementById(wait_sub).className = 'wait_sub';
	}
	else if(state == 2){
		var wait_main = 'q3_main';
		var wait_sub = 'q3_sub_' + now2;
		var wait_dish = 'share_' + now2;
		document.getElementById(wait_main).className = 'wait_main';
		document.getElementById(wait_sub).className = 'wait_sub';
		document.getElementById(wait_dish).className = 'wait_dish';
		document.getElementById('q3_main_sub').className = 'unuse_table';
	}
	else if(state == 3){
		var wait_main = 'q4_main';
		var wait_sub = 'q4_sub_' + now2;
		var wait_dish = 'assign_' + now2;
		document.getElementById(wait_main).className = 'wait_main';
		document.getElementById(wait_sub).className = 'wait_sub';
		document.getElementById(wait_dish).className = 'wait_dish';
		document.getElementById('q4_main_sub').className = 'unuse_table';
	}
	else if(state == 4){
		var wait_main = 'q5_main';
		var wait_sub = 'q5_sub_' + now2;
		var wait_dish = 'vol_' + vol_count;
		document.getElementById(wait_main).className = 'wait_main';
		document.getElementById(wait_sub).className = 'wait_sub';
		document.getElementById(wait_dish).className = 'wait_dish';
		document.getElementById('q5_main_sub').className = 'unuse_table';
	}
}

function close_question(state, tag){
	if(state == 1){
		var done_main = 'q' + tag + '_main';
		var done_sub = 'q' + tag + '_sub';
		document.getElementById(done_main).className = 'done_main';
		document.getElementById(done_sub).className = 'done_sub';
	}
	else if(state == 2){
		var done_main = 'q3_main';
		var done_sub = 'q3_sub_' + tag;
		var done_dish = 'share_' + tag;
		document.getElementById(done_main).className = 'done_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q3_main_sub').className = 'unuse_table';
	}
	else if(state == 3){
		var done_main = 'q4_main';
		var done_sub = 'q4_sub_' + tag;
		var done_dish = 'assign_' + tag;
		document.getElementById(done_main).className = 'done_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q4_main_sub').className = 'unuse_table';
	}
	else if(state == 4){
		var done_main = 'q5_main';
		var done_sub = 'q5_sub_' + tag;
		var count = 0;
		for(var i = tag ; i >= 1; i--){
			if(vol_choose[i] == 1) count++;
		}
		var done_dish = 'vol_' + count;
		document.getElementById(done_main).className = 'done_main';
		document.getElementById(done_sub).className = 'done_sub';
		document.getElementById(done_dish).className = 'done_dish';
		document.getElementById('q5_main_sub').className = 'unuse_table';
	}
}

function open_now(){
	var now1 = document.getElementById('now1').value;
	var now2 = document.getElementById('now2').value;
	var state = document.getElementById('switch').value;
	var vol_count = document.getElementById('vol_count').value;
	
	if(state == 1){
		var now_main = 'q' + now1 + '_main';
		var now_sub = 'q' + now1 + '_sub';
		document.getElementById(now_main).className = 'now_main';
		document.getElementById(now_sub).className = 'now_sub';
	}
	else if(state == 2){
		var now_main = 'q3_main';
		var now_sub = 'q3_sub_' + now2;
		var now_dish = 'share_' + now2;
		document.getElementById(now_main).className = 'now_main';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById('q3_main_sub').className = 'use_table';
	}
	else if(state == 3){
		var now_main = 'q4_main';
		var now_sub = 'q4_sub_' + now2;
		var now_dish = 'assign_' + now2;
		document.getElementById(now_main).className = 'now_main';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById('q4_main_sub').className = 'use_table';
	}
	else if(state == 4){
		var now_main = 'q5_main';
		var now_sub = 'q5_sub_' + now2;
		var now_dish = 'vol_' + vol_count;
		document.getElementById(now_main).className = 'now_main';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById('q5_main_sub').className = 'use_table';
	}
}

function open_modify(state, tag){
	for(var i = 1; i <= 6; i++){
		if((state == 1 && i <= tag) || (state == 2 && i <= 3) || (state == 3 && i <= 4) || (state == 4 && i <= 5)){
			var modify = 'q' + i + '_modify';
			document.getElementById(modify).style.display = '';
		}
	}
	for(i = 1; i <= tag; i++){
		if(state == 2){
			var modify = 'share_modify_' + i;
			document.getElementById(modify).style.display = '';
		}
	}
	for(i = 1; i <= tag; i++){
		if(state == 3){
			var modify = 'assign_modify_' + i;
			document.getElementById(modify).style.display = '';
		}
	}
	if(state == 4){
		for(var i = tag ; i >= 1; i--){
			if(vol_choose[i] == 1) count++;
		}
		for(i = 1; i <= count; i++){
			var modify = 'vol_modify_' + i;
			document.getElementById(modify).style.display = '';
		}
	}
}

function done_question(state, tag){
	close_question(state, tag);
	open_now();	
	open_modify(state, tag);
}

function done_onclick_1(){
	done_question(1, 1);
}
function done_onclick_2(){
	done_question(1, 2);
}
function done_onclick_3(){
	done_question(1, 3);
}
function done_onclick_4(){
	done_question(1, 4);
}
function done_onclick_5(){
	vol_check();
	done_question(1, 5);
	document.getElementById('now1').value = 5;
	document.getElementById('now2').value = 0;
	document.getElementById('switch').value = 4;
	document.getElementById('vol_count').value = 0;
	for(var i = 1; i <= other_num; i++){
		var next = 'next_button_5_' + i;
		var done = 'done_button_5_' + i;
		var modify = 'vol_modify_' + i;
		document.getElementById(next).style.display = '';
		document.getElementById(done).style.display = 'none';
		document.getElementById(modify).style.display = 'none';
	}
	document.getElementById('q6_main').className = 'wait_main';
	document.getElementById('q6_sub').className = 'wait_sub';
	document.getElementById('next_button_6').style.display = '';
	document.getElementById('done_button_6').style.display = 'none';
	document.getElementById('q6_modify').style.display = 'none';
	next_question_5();
}
function done_onclick_6(){
	done_question(1, 6);
}
function done_onclick_3_sub(tag){
	done_question(2, tag);
}
function done_onclick_4_sub(tag){
	done_question(3, tag);
}
function done_onclick_5_sub(tag){
	done_question(4, tag);
}

