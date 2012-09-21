function generate_dish_name(){
	var num = document.getElementById("dish_num").value;
	document.getElementById("old_dish_num").value = num;
	for(var i = 0; i < num; i++){
		
		//宣告列
		var row = 'dish_' + i;
		var tmp = document.createElement("tr");
		tmp.id = row;
		document.getElementById("dish_tbody").appendChild(tmp);
		
		//宣告第零格
		var col_0 = 'dish_' + i + '_0';
		tmp = document.createElement("td");
		tmp.id = col_0;
		tmp.innerHTML = '第' + (i+1) + '道';
		document.getElementById(row).appendChild(tmp);
		
		
		//宣告第一格
		var col_1 = 'dish_' + i + '_1';
		tmp = document.createElement("td");
		tmp.id = col_1;
		document.getElementById(row).appendChild(tmp);
		
		//insert radio1
		var check_radio_name = 'dish_radio_name_' + i;
		var check_radio = 'dish_radio1_' + i;
		tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = 1;
		tmp.onclick = q3_checkdata_1;
		document.getElementById(col_1).appendChild(tmp);
		document.getElementById(check_radio).checked = true;
		
		//insert dish_select
		var dish_select = 'dish_select_' + i;
		tmp = document.createElement("select");
		tmp.id = dish_select;
		tmp.name = dish_select;
		for(var j = 0; j < dish_num; j++){
			var new_option = new Option();
			tmp.options.add(new_option);
			tmp.options[j].value = dish_ID[j];
			tmp.options[j].innerHTML = dish_name[j];
		}
		document.getElementById(col_1).appendChild(tmp);
		
		//換行
		tmp = document.createElement("br");
		document.getElementById(col_1).appendChild(tmp);
		
		//insert radio2
		check_radio = 'dish_radio2_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = 2;
		tmp.onclick = q3_checkdata_1;
		document.getElementById(col_1).appendChild(tmp);
		
		//insert name_text
		var dish_text = 'dish_text_' + i;
		tmp = document.createElement("input");
		tmp.id = dish_text;
		tmp.name = dish_text;
		tmp.type = 'text';
		tmp.disabled = 'disabled';
		document.getElementById(col_1).appendChild(tmp);
		
		
		//宣告第二格
		var col_2 = 'dish_' + i + '_2';
		tmp = document.createElement("td");
		tmp.id = col_2;
		document.getElementById(row).appendChild(tmp);
		document.getElementById(col_2).style.paddingLeft = '5px';
		
		//insert price_text
		var dish_price = 'dish_price_' + i;
		tmp = document.createElement("input");
		tmp.id = dish_price;
		tmp.name = dish_price;
		tmp.type = 'text';
		document.getElementById(col_2).appendChild(tmp);
		document.getElementById(dish_price).style.width = '60px';
		
		//insert "元整"
		tmp = document.createElement("span");
		tmp.innerHTML = '元整';
		document.getElementById(col_2).appendChild(tmp);
		
		//換行
		tmp = document.createElement("br");
		document.getElementById(col_2).appendChild(tmp);
		
		//tab
		tmp = document.createElement("span");
		tmp.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		document.getElementById(col_2).appendChild(tmp);
		
		
		//insert 無法估價checkbox
		var check_price = 'dish_price_check_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_price;
		tmp.name = check_price;
		tmp.type = 'checkbox';
		tmp.value = 1;
		tmp.onclick = q3_checkdata_2;
		document.getElementById(col_2).appendChild(tmp);
		
		
		//insert "無法估價"
		tmp = document.createElement("span");
		tmp.innerHTML = '無特定價位';
		document.getElementById(col_2).appendChild(tmp);
		
		//宣告第三格
		var col_3 = 'dish_' + i + '_3';
		tmp = document.createElement("td");
		tmp.id = col_3;
		document.getElementById(row).appendChild(tmp);
		
		//insert role_select
		var role_select = 'role_select_' + i;
		tmp = document.createElement("select");
		tmp.id = role_select;
		tmp.name = role_select;
		for(var j = 0; j < 8; j++){
			var new_option = new Option();
			var role_name = '';
			tmp.options.add(new_option);
			tmp.options[j].value = parseInt(j)+1;		
			if(j == 0)	role_name = '主食';
			else if(j == 1)	role_name = '甜點';
			else if(j == 2)	role_name = '羹湯';
			else if(j == 3)	role_name = '一般菜餚';
			else if(j == 4)	role_name = '涼拌';
			else if(j == 5)	role_name = '燒肉料';
			else if(j == 6)	role_name = '火鍋料';
			else if(j == 7)	role_name = '其他';
			tmp.options[j].innerHTML = role_name;
		}
		var new_option = new Option();
		tmp.options.add(new_option);
		tmp.options[8].value = 0;
		tmp.options[8].innerHTML = '拉開選角色';
		tmp.options[8].selected = 'selected';
		document.getElementById(col_3).appendChild(tmp);
	}
}

function generate_q3_table(){
	var num = document.getElementById("dish_num").value;
	for(var i = 0; i < num; i++){
		//宣告行
		var row = Math.floor(i/3);
		var col = i%3;
		if(col == 0){
			var tr_id = 'q3_table_' + row;
			var tmp = document.createElement("tr");
			tmp.id = tr_id;
			document.getElementById('q3_tbody').appendChild(tmp);
		}
		
		//宣告格
		var td_id = 'q3_table_' + row + '_' + col;
		tmp = document.createElement("td");
		tmp.id = td_id;
		document.getElementById(tr_id).appendChild(tmp);
		if(i == 0)	document.getElementById(td_id).className = 'now_dish';
		else	document.getElementById(td_id).className = 'wait_dish';
		
		//插入修改按鈕
		var button_id = 'modify_dish_' + i;
		tmp = document.createElement("input");
		tmp.id = button_id;
		tmp.type = 'button';
		tmp.value = '修改';
		tmp.name = i+1;
		tmp.onclick = function(){
						modify_onclick_3(0,this.name);
						};
		document.getElementById(td_id).appendChild(tmp);
		document.getElementById(button_id).style.display = 'none';
		
		//插入菜名
		var span_id = 'td_span_' + row + '_' + col;
		tmp = document.createElement("span");
		tmp.id = span_id;
		var check_radio_1 = 'dish_radio1_' + i;
		var check_radio_2 = 'dish_radio2_' + i;
		if(document.getElementById(check_radio_1).checked){
			for(var j = 0; j < dish_num; j++){
				var dish_select = 'dish_select_' + i;
				if(dish_ID[j] == document.getElementById(dish_select).value){
					tmp.innerHTML = dish_name[j];
				}
			}
		}
		else{
			var dish_text = 'dish_text_' + i;
			tmp.innerHTML = document.getElementById(dish_text).value;
		}
		document.getElementById(td_id).appendChild(tmp);
	}
}

function generate_q3_sub_sub(){
	var cook_name = new Array("生食","煎","煮","炒","炸","滷","燉","烤","其他烹飪法");
	var tast_name = new Array("酸", "甜", "苦", "辣", "其他調味");
	var material_name = new Array("牛", "羊", "雞", "豬", "鴨", "鵝", "內臟", "蛋", "其他陸味", "魚", "蝦", "蟹", "貝", "其他海鮮", "包子", "饅頭", "餃子", "飯", "麵", "漢堡", "三明治", "PIZZA", "餅", "其他主食", "山菜", "根莖", "綠色", "茄類", "白色", "水果", "菇類", "其他蔬菜");
	
	var num = document.getElementById("dish_num").value;
	for(var i = 0; i < num; i++){
		//插入問卷
		var sub_id = 'q3_sub_sub_' + i;
		var tmp = document.createElement("div");
		tmp.id = sub_id;
		tmp.className = 'wait_sub'
		document.getElementById('q3_sub_sub').appendChild(tmp);
		
		//插入問卷標題
		var row = Math.floor(i/3);
		var col = i%3;
		var span_id = 'td_span_' + row + '_' + col;
		var sub_title = document.getElementById(span_id).innerHTML;
		var sub_span = 'q3_sub_sub_span_' + i;
		tmp = document.createElement("div");
		tmp.id = sub_span;
		tmp.innerHTML = sub_title;
		tmp.className = 'sub_title';
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入烹飪法標題
		tmp = document.createElement("span");
		tmp.innerHTML = '一、請問他的烹飪法是?<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入問卷內容--烹飪法
		var cook_select = 'cook_select_' + i;
		tmp = document.createElement("select");
		tmp.id = cook_select;
		tmp.name = cook_select;
		for(var j = 0; j < 9; j++){
			var new_option = new Option();
			tmp.options.add(new_option);
			tmp.options[j].value = j;
			tmp.options[j].innerHTML = cook_name[j];
		}
		var new_option = new Option();
		tmp.options.add(new_option);
		tmp.options[9].value = -1;
		tmp.options[9].innerHTML = '拉開選擇';
		tmp.options[9].selected = 'selected';
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入調味標題
		tmp = document.createElement("span");
		tmp.innerHTML = '<br><br>二、請問他的調味偏向是?<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入問卷內容--調味
		var tast_select = 'tast_select_' + i;
		tmp = document.createElement("select");
		tmp.id = tast_select;
		tmp.name = tast_select;
		for(var j = 0; j < 5; j++){
			var new_option = new Option();
			tmp.options.add(new_option);
			tmp.options[j].value = j;
			tmp.options[j].innerHTML = tast_name[j];
		}
		var new_option = new Option();
		tmp.options.add(new_option);
		tmp.options[5].value = -1;
		tmp.options[5].innerHTML = '拉開選擇';
		tmp.options[5].selected = 'selected';
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入烹飪法標題
		tmp = document.createElement("span");
		tmp.innerHTML = '<br><br>三、請問他的主要食材是?<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		
		//插入問卷內容--食材
		//insert radio1
		var check_radio_name = 'material_control_' + i;
		var check_radio = 'material_radio1_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = i;
		tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入標題文字
		tmp = document.createElement("span");
		tmp.innerHTML = '陸味<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert div1
		var div_id = 'q3_sub_sub_material_1_' + i;
		var tmp = document.createElement("div");
		tmp.id = div_id;
		tmp.name = div_id;
		tmp.className = 'close_material'
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert material1
		for(var j = 0; j < 9; j++){
			var material_id = 'material_' + j + '_' + i;
			var materialName = 'material_' + i;
			var tmp = document.createElement("input");
			tmp.id = material_id;
			tmp.name = materialName;
			tmp.type = 'radio';
			tmp.value = j;
			document.getElementById(div_id).appendChild(tmp);
			
			//插入標題文字
			tmp = document.createElement("span");
			if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
			else	tmp.innerHTML = material_name[j];
			document.getElementById(div_id).appendChild(tmp);
		}
		
		//insert radio2
		check_radio = 'material_radio2_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = i;
		tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入標題文字
		tmp = document.createElement("span");
		tmp.innerHTML = '海鮮<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert div2
		var div_id = 'q3_sub_sub_material_2_' + i;
		var tmp = document.createElement("div");
		tmp.id = div_id;
		tmp.name = div_id;
		tmp.className = 'close_material'
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert material2
		for(var j = 9; j < 14; j++){
			var material_id = 'material_' + j + '_' + i ;
			var materialName = 'material_' + i;
			var tmp = document.createElement("input");
			tmp.id = material_id;
			tmp.name = materialName;
			tmp.type = 'radio';
			tmp.value = j;
			document.getElementById(div_id).appendChild(tmp);
			
			//插入標題文字
			tmp = document.createElement("span");
			if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
			else	tmp.innerHTML = material_name[j];
			document.getElementById(div_id).appendChild(tmp);
		}
		
		//insert radio3
		check_radio = 'material_radio3_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = i;
		tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入標題文字
		tmp = document.createElement("span");
		tmp.innerHTML = '主食<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert div3
		var div_id = 'q3_sub_sub_material_3_' + i;
		var tmp = document.createElement("div");
		tmp.id = div_id;
		tmp.name = div_id;
		tmp.className = 'close_material'
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert material3
		for(var j = 14; j < 24; j++){
			var material_id = 'material_' + j + '_' + i ;
			var materialName = 'material_' + i;
			var tmp = document.createElement("input");
			tmp.id = material_id;
			tmp.name = materialName;
			tmp.type = 'radio';
			tmp.value = j;
			document.getElementById(div_id).appendChild(tmp);
			
			//插入標題文字
			tmp = document.createElement("span");
			if(j%3 == 1)	tmp.innerHTML = material_name[j] + '<br>';
			else	tmp.innerHTML = material_name[j];
			document.getElementById(div_id).appendChild(tmp);
		}
		
		//insert radio4
		check_radio = 'material_radio4_' + i;
		var tmp = document.createElement("input");
		tmp.id = check_radio;
		tmp.name = check_radio_name;
		tmp.type = 'radio';
		tmp.value = i;
		tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
		document.getElementById(sub_id).appendChild(tmp);
		
		//插入標題文字
		tmp = document.createElement("span");
		tmp.innerHTML = '蔬菜<br>';
		document.getElementById(sub_id).appendChild(tmp);
		
		//insert div4
		var div_id = 'q3_sub_sub_material_4_' + i;
		var tmp = document.createElement("div");
		tmp.id = div_id;
		tmp.name = div_id;
		tmp.className = 'close_material'
		document.getElementById(sub_id).appendChild(tmp);	
	
		//insert material4
		for(var j = 24; j < 32; j++){
			var material_id = 'material_' + j + '_' + i ;
			var materialName = 'material_' + i;
			var tmp = document.createElement("input");
			tmp.id = material_id;
			tmp.name = materialName;
			tmp.type = 'radio';
			tmp.value = j;
			document.getElementById(div_id).appendChild(tmp);
			
			//插入標題文字
			tmp = document.createElement("span");
			if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
			else	tmp.innerHTML = material_name[j];
			document.getElementById(div_id).appendChild(tmp);
		}
		
		//插入按鈕div
		var button_div = 'sub_button_3_' + i;
		var tmp = document.createElement("div");
		tmp.id = button_div;
		tmp.name = button_div;
		tmp.className = 'sub_button';
		document.getElementById(sub_id).appendChild(tmp);	
		
		//插入next按鈕
		var next_button = 'next_button_3_' + i;
		var tmp = document.createElement("input");
		tmp.id = next_button;
		tmp.name = i;
		tmp.type = 'button';
		tmp.value = '下一題';
		tmp.className = 'next_button';
		document.getElementById(button_div).appendChild(tmp);	
		document.getElementById(tmp.id).onclick = function(){next_onclick_3_sub(this.name)};	
		
		//插入done按鈕
		var done_button = 'done_button_3_' + i;
		var tmp = document.createElement("input");
		tmp.id = done_button;
		tmp.name = (i+1);
		tmp.type = 'button';
		tmp.value = '完成';
		tmp.className = 'done_button';
		tmp.style.display = 'none';
		tmp.onclick = function(){done_onclick_3_sub((this.name-1),0,this.name);};
		document.getElementById(button_div).appendChild(tmp);	
	}
}

function generate_q4(){
	//點名
	var arrive_num = member_num;
	for(var i = 1; i <= member_num; i++){
		var absent = 'absent_' + i;
		if(document.getElementById(absent).checked)	arrive_num--;
	}
	var num = document.getElementById("dish_num").value;
	for(var i = 0; i < num; i++){
		if((i*arrive_num*2) > num){
			document.getElementById("assign_num").value = i;
			break;
		}
	}
	var assign_num = document.getElementById("assign_num").value;
	var order_ID = new Array();
	var order_name = new Array();
	for(var i = 0; i < num; i++){
		var check_radio_1 = 'dish_radio1_' + i;
		var check_radio_2 = 'dish_radio2_' + i;
		if(document.getElementById(check_radio_1).checked){
			for(var j = 0; j < dish_num; j++){
				var dish_select = 'dish_select_' + i;
				if(dish_ID[j] == document.getElementById(dish_select).value){
					order_ID[i] = dish_ID[j];
					order_name[i] = dish_name[j];
				}
			}
		}
		else{
			var dish_text = 'dish_text_' + i;
			order_ID[i] = -1;
			order_name[i] = document.getElementById(dish_text).value;
		}
	}
	
	//處理共同菜色
	var share_name = 'share_list[]';
	for(var i = 0; i < num; i++){
		var share_ID = 'share_' + i;
		var tmp = document.createElement("input");
		tmp.id = share_ID;
		tmp.name = share_name;
		tmp.type = 'checkbox';
		tmp.value = order_name[i];
		document.getElementById('share_div').appendChild(tmp);
		
		//插入菜名
		tmp = document.createElement("span");
		tmp.id = 'share_span_id_' + i;
		if(i%5 == 4)	tmp.innerHTML = order_name[i] + '<br>';
		else	tmp.innerHTML = order_name[i];
		document.getElementById('share_div').appendChild(tmp);
	}
	
	//處理指定菜色
	for(var i = 0; i <= member_num; i++){
		//指定行
		var assign_tr = 'assign_' + i;
		var tmp = document.createElement("tr");
		tmp.id = assign_tr;
		document.getElementById('assign_tbody').appendChild(tmp);
		
		//指定格
		for(var j = 0; j <= assign_num; j++){
			var assign_td = 'assign_' + i + '_' + j;
			var tmp = document.createElement("td");
			tmp.id = assign_td;
			
			//第0行第0格
			if(i == 0 && j == 0)	tmp.innerHTML = '團員';
				
			//第0行非第0格
			else if(i == 0 && j != 0)	tmp.innerHTML = '第' + j + '道指定料理';
			//其他行
			else{
				//第0格
				if(j == 0)	tmp.innerHTML = nick[i];
			}
			document.getElementById(assign_tr).appendChild(tmp);
			//插入選單
			if(i != 0 && j != 0){
				var assign_select = 'assign_select_' + i + '_' + j;
				var tmp = document.createElement("select");
				tmp.id = assign_select;
				tmp.name = assign_select;
				for(var t = 0; t < num; t++){
					var new_option = new Option();
					tmp.options.add(new_option);
					tmp.options[t].value = order_name[t];		
					tmp.options[t].innerHTML = order_name[t];
				}
				document.getElementById(assign_td).appendChild(tmp);
			}
		}
	}
}

function next_question(){
	var now1 = document.getElementById('now1').value;
	var now2 = document.getElementById('now2').value;
	if(now1 == 1){
		document.getElementById('main').className = 'main_block_2';
		document.getElementById('q1_main').className = 'done_main';
		document.getElementById('q1_sub').className = 'done_sub';
		document.getElementById('q1_modify').style.display = '';
		document.getElementById('next_button_1').style.display = 'none';
		document.getElementById('done_button_1').style.display = 'block';
		document.getElementById('q2_main').className = 'now_main';
		document.getElementById('q2_sub').className = 'now_sub';
		document.getElementById('now1').value++;
	}
	else if(now1 == 2){
		document.getElementById('main').className = 'main_block_3';
		document.getElementById('q2_main').className = 'done_main';
		document.getElementById('q2_sub').className = 'done_sub';
		document.getElementById('q2_modify').style.display = '';
		document.getElementById('next_button_2').style.display = 'none';
		document.getElementById('done_button_2').style.display = 'block';
		document.getElementById('q3_main').className = 'now_main';
		document.getElementById('q3_sub').className = 'now_sub';
		document.getElementById('now1').value++;
	}
	else if(now1 == 3){
		var num = document.getElementById('dish_num').value;
		var next_button = 'next_button_3_' +　(now2-1);
		var done_button = 'done_button_3_' +　(now2-1);
		var modify_button = 'modify_dish_' +　(now2-1);
		var now_sub = 'q3_sub_sub_' + (now2-1);
		var row = Math.floor((now2-1)/3);
		var col = (now2-1)%3;
		var next_row = Math.floor(now2/3);
		var next_col = now2%3;
		var now_dish = 'q3_table_' + row + '_' + col;
		var next_sub = 'q3_sub_sub_' + (now2);
		var next_dish = 'q3_table_' + next_row + '_' + next_col;
			
		if(now2 == 0){
			document.getElementById('q3_sub').className = 'done_sub';
			document.getElementById('q3_modify').style.display = '';
			document.getElementById('next_button_3').style.display = 'none';
			document.getElementById('done_button_3').style.display = '';
			document.getElementById('q3_main_sub').className = 'use_table';
			document.getElementById('q3_sub_sub_0').className = 'now_sub';
			document.getElementById('now2').value++;
		}
		else if(now2 >= num){
			document.getElementById('main').className = 'main_block_4';
			document.getElementById('q3_main_sub').className = 'unuse_table';
			document.getElementById('q3_main').className = 'done_main';
			document.getElementById('q3_modify').style.display = '';
			document.getElementById(now_sub).className = 'done_sub';
			document.getElementById(now_dish).className = 'done_dish';
			document.getElementById(modify_button).style.display = '';
			document.getElementById(next_button).style.display = 'none';
			document.getElementById(done_button).style.display = '';
			document.getElementById('q4_main').className = 'now_main';
			document.getElementById('q4_sub').className = 'now_sub';
			document.getElementById('now1').value++;
			if(now2 == num)	document.getElementById('now2').value++;
		}
		else{
			document.getElementById(now_sub).className = 'done_sub';
			document.getElementById(now_dish).className = 'done_dish';
			document.getElementById(modify_button).style.display = '';
			document.getElementById(next_button).style.display = 'none';
			document.getElementById(done_button).style.display = '';
			document.getElementById(next_dish).className = 'now_dish';
			document.getElementById(next_sub).className = 'now_sub';
			document.getElementById('now2').value++;
		}
	}
	else if(now1 == 4){
		document.getElementById('main').className = 'main_block_5';
		document.getElementById('q4_main').className = 'done_main';
		document.getElementById('q4_sub').className = 'done_sub';
		document.getElementById('q4_modify').style.display = '';
		document.getElementById('next_button_4').style.display = 'none';
		document.getElementById('done_button_4').style.display = 'block';
		document.getElementById('q5_main').className = 'now_main';
		document.getElementById('q5_sub').className = 'now_sub';
		document.getElementById('now1').value++;
	}
	else if(now1 == 5){
		document.getElementById('q5_main').className = 'done_main';
		document.getElementById('q5_sub').className = 'done_sub';
		document.getElementById('q5_modify').style.display = '';
		document.getElementById('next_button_5').style.display = 'none';
		document.getElementById('done_button_5').style.display = 'block';
		document.getElementById('now1').value++;
	}
}

function modify_question(mod1, mod2){
	var now1 = document.getElementById('now1').value;
	var now2 = document.getElementById('now2').value;
	var num = document.getElementById('dish_num').value;
	//關掉大問題修改鍵
	document.getElementById('q1_modify').style.display = 'none';
	document.getElementById('q2_modify').style.display = 'none';
	document.getElementById('q3_modify').style.display = 'none';
	document.getElementById('q4_modify').style.display = 'none';
	document.getElementById('q5_modify').style.display = 'none';
		
	var style = 'main_block_' + mod1;
	document.getElementById('main').className = style;	
	if((now2-num) > 0 || now2 == 0){
		if(now1 <= 5){
			var qmain = 'q'+ now1 + '_main';
			var qsub = 'q'+ now1 + '_sub';
			document.getElementById(qmain).className = 'wait_main';
			document.getElementById(qsub).className = 'wait_sub';	
		}
	}
	else{
		var now_sub = 'q3_sub_sub_' + (now2-1);
		var dish_table = 'q3_main_sub';
		var row = Math.floor((now2-1)/3);
		var col = (now2-1)%3;
		var now_dish = 'q3_table_' + row + '_' + col;
		document.getElementById('q3_main_sub').className = 'unuse_table';
		document.getElementById(now_sub).className = 'wait_sub';
		document.getElementById('q3_main').className = 'wait_main';
		document.getElementById(now_dish).className = 'wait_dish';
	}
	//把要修改問題打開
	if(mod2 == 0){
		qmain = 'q'+ mod1 + '_main';
		qsub = 'q'+ mod1 + '_sub';
		document.getElementById(qmain).className = 'now_main';
		document.getElementById(qsub).className = 'now_sub';
		if(mod1 == 3)	document.getElementById('q3_main_sub').className = 'use_table';
	}
	else{
		//關掉小問題修改鍵
		for(var i = 0; i < num; i++){
			var modify_button = 'modify_dish_' +　i;
			document.getElementById(modify_button).style.display = 'none';
		}
		var now_sub = 'q3_sub_sub_' + (mod2-1);
		var row = Math.floor((mod2-1)/3);
		var col = (mod2-1)%3;
		var now_dish = 'q3_table_' + row + '_' + col;
		document.getElementById('q3_main_sub').className = 'use_table';
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById(now_sub).className = 'now_sub';	
		document.getElementById('q3_main').className = 'now_main';
		document.getElementById('q3_sub').className = 'done_sub';
	}
}

function done_question(mod1, mod2){
	var now1 = document.getElementById('now1').value;
	var now2 = document.getElementById('now2').value;
	var o_num = document.getElementById('old_dish_num').value;
	var n_num = document.getElementById('dish_num').value;
	document.getElementById('old_dish_num').value = n_num;
	if((now2-1) > n_num) document.getElementById('now2').value = n_num + 1;
	
	//第二題
	if(mod1 == 2){
		//點名
		var flag = 0;
		//算出出席人數及指定菜數
		var old_assign_num = document.getElementById("assign_num").value;
		var arrive_num = member_num;
		for(var i = 1; i <= member_num; i++){
			var absent = 'absent_' + i;
			if(document.getElementById(absent).checked)	arrive_num--;
		}
		var assign_num = 1;
		document.getElementById("assign_num").value = 1;
		for(var i = 0; i < n_num; i++){
			if((i*arrive_num*2) > n_num){
				document.getElementById("assign_num").value = i;
				assign_num = i;
				break;
			}
		}
		//dish_num 變少
		if(o_num > n_num){
			var tbody = 'dish_tbody';
			var q3_sub_sub = 'q3_sub_sub'
			for(var i = (o_num-1); i > (n_num-1); i--){
				//砍填菜名表格
				var q2_row = 'dish_' + i;
				var fo = document.getElementById(tbody);
				var so = document.getElementById(q2_row);
				fo.removeChild(so);
				if(now2 > 0){
					//砍	菜名列表
					var row = Math.floor(i/3);
					var col = i%3;
					var tr_id = 'q3_table_' + row;
					var td_id = 'q3_table_' + row + '_' + col;
					fo = document.getElementById(tr_id);
					so = document.getElementById(td_id);
					fo.removeChild(so);
					//砍問卷
					var q_dish = 'q3_sub_sub_' + i;
					fo = document.getElementById(q3_sub_sub);
					so = document.getElementById(q_dish);
					fo.removeChild(so);
					//砍共同菜色
					var share_ID = 'share_' + i;
					fo = document.getElementById('share_div');
					so = document.getElementById(share_ID);
					fo.removeChild(so);
					
					var share_span = 'share_span_id_' + i;
					so = document.getElementById(share_span);
					fo.removeChild(so);
					
					
					//砍指定菜色
					for(var j = 1; j <= member_num; j++){
						for(var t = 1; t < old_assign_num; t++){
							var assign_select = 'assign_select_' + j + '_' + t;
							document.getElementById(assign_select).remove(i);
						}
					}
				}
			}
			flag = 1;
		}
		//dish_num 變多
		if(o_num < n_num){
			var cook_name = new Array("生食","煎","煮","炒","炸","滷","燉","烤","其他烹飪法");
			var tast_name = new Array("酸", "甜", "苦", "辣", "其他調味");
			var material_name = new Array("牛", "羊", "雞", "豬", "鴨", "鵝", "內臟", "蛋", "其他陸味", "魚", "蝦", "蟹", "貝", "其他海鮮", "包子", "饅頭", "餃子", "飯", "麵", "漢堡", "三明治", "PIZZA", "餅", "其他主食", "山菜", "根莖", "綠色", "茄類", "白色", "水果", "菇類", "其他蔬菜");
	
			var tbody = 'dish_tbody';
			var q3_sub_sub = 'q3_sub_sub'
			for(var i = o_num; i < n_num; i++){
				//加填菜名表格
				//宣告列
				var ii = i;
				ii++;
				var row = 'dish_' + i;
				var tmp = document.createElement("tr");
				tmp.id = row;
				document.getElementById("dish_tbody").appendChild(tmp);
				
				//宣告第零格
				var col_0 = 'dish_' + i + '_0';
				tmp = document.createElement("td");
				tmp.id = col_0;
				tmp.innerHTML = '第' + ii + '道';
				document.getElementById(row).appendChild(tmp);
				
				//宣告第一格
				var col_1 = 'dish_' + i + '_1';
				tmp = document.createElement("td");
				tmp.id = col_1;
				document.getElementById(row).appendChild(tmp);
				
				//insert radio1
				var check_radio_name = 'dish_radio_name_' + i;
				var check_radio = 'dish_radio1_' + i;
				tmp = document.createElement("input");
				tmp.id = check_radio;
				tmp.name = check_radio_name;
				tmp.type = 'radio';
				tmp.value = 1;
				document.getElementById(col_1).appendChild(tmp);
				document.getElementById(check_radio).checked = true;
				
				//insert dish_select
				var dish_select = 'dish_select_' + i;
				tmp = document.createElement("select");
				tmp.id = dish_select;
				tmp.name = dish_select;
				for(var j = 0; j < dish_num; j++){
					var new_option = new Option();
					tmp.options.add(new_option);
					tmp.options[j].value = dish_ID[j];
					tmp.options[j].innerHTML = dish_name[j];
				}
				document.getElementById(col_1).appendChild(tmp);
				//換行
				tmp = document.createElement("br");
				document.getElementById(col_1).appendChild(tmp);
				
				//insert radio2
				check_radio = 'dish_radio2_' + i;
				var tmp = document.createElement("input");
				tmp.id = check_radio;
				tmp.name = check_radio_name;
				tmp.type = 'radio';
				tmp.value = 2;
				document.getElementById(col_1).appendChild(tmp);
				
				//insert name_text
				var dish_text = 'dish_text_' + i;
				tmp = document.createElement("input");
				tmp.id = dish_text;
				tmp.type = 'text';
				tmp.value = '直接填寫';
				tmp.disabled = 'disabled';
				document.getElementById(col_1).appendChild(tmp);
				
				//宣告第二格
				var col_2 = 'dish_' + i + '_2';
				tmp = document.createElement("td");
				tmp.id = col_2;
				document.getElementById(row).appendChild(tmp);
				document.getElementById(col_2).style.paddingLeft = '5px';
				
				//insert price_text
				var dish_price = 'dish_price_' + i;
				tmp = document.createElement("input");
				tmp.id = dish_price;
				tmp.type = 'text';
				document.getElementById(col_2).appendChild(tmp);
				document.getElementById(dish_price).style.width = '60px';
				
				//insert "元整"
				tmp = document.createElement("span");
				tmp.innerHTML = '元整';
				document.getElementById(col_2).appendChild(tmp);
				
				//換行
				tmp = document.createElement("br");
				document.getElementById(col_2).appendChild(tmp);
				
				//tab
				tmp = document.createElement("span");
				tmp.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				document.getElementById(col_2).appendChild(tmp);
				
				
				//insert 無法估價checkbox
				check_price = 'dish_price_check_' + i;
				var tmp = document.createElement("input");
				tmp.id = check_price;
				tmp.name = check_price;
				tmp.type = 'checkbox';
				tmp.value = 1;
				document.getElementById(col_2).appendChild(tmp);
				
				//insert "無法估價"
				tmp = document.createElement("span");
				tmp.innerHTML = '無特定價位';
				document.getElementById(col_2).appendChild(tmp);
				
				//宣告第三格
				var col_3 = 'dish_' + i + '_3';
				tmp = document.createElement("td");
				tmp.id = col_3;
				document.getElementById(row).appendChild(tmp);
				
				//insert role_select
				var role_select = 'role_select_' + i;
				tmp = document.createElement("select");
				tmp.id = role_select;
				tmp.name = role_select;
				for(var j = 0; j < 8; j++){
					var new_option = new Option();
					var role_name = '';
					tmp.options.add(new_option);
					tmp.options[j].value = (j+1);		
					if(j == 0)	role_name = '主食';
					else if(j == 1)	role_name = '甜點';
					else if(j == 2)	role_name = '羹湯';
					else if(j == 3)	role_name = '一般菜餚';
					else if(j == 4)	role_name = '涼拌';
					else if(j == 5)	role_name = '燒肉料';
					else if(j == 6)	role_name = '火鍋料';
					else if(j == 7)	role_name = '其他';
					tmp.options[j].innerHTML = role_name;
				}
				var new_option = new Option();
				tmp.options.add(new_option);
				tmp.options[8].value = 0;
				tmp.options[8].innerHTML = '拉開選角色';
				tmp.options[8].selected = 'selected';
				document.getElementById(col_3).appendChild(tmp);
				
				if(now2 > 0){
					//加	菜名列表
					//宣告行
					var row = Math.floor(i/3);
					var col = i%3;
					var tr_id = 'q3_table_' + row;
						
					if(col == 0){
						var tmp = document.createElement("tr");
						tmp.id = tr_id;
						document.getElementById('q3_tbody').appendChild(tmp);
					}
					
					//宣告格
					var td_id = 'q3_table_' + row + '_' + col;
					tmp = document.createElement("td");
					tmp.id = td_id;
					document.getElementById(tr_id).appendChild(tmp);
					if(i == 0)	document.getElementById(td_id).className = 'now_dish';
					else	document.getElementById(td_id).className = 'wait_dish';
					
					//插入修改按鈕
					var button_id = 'modify_dish_' + i;
					tmp = document.createElement("input");
					tmp.id = button_id;
					tmp.type = 'button';
					tmp.value = '修改';
					tmp.name = i;
					tmp.name++;
					tmp.onclick = function(){
									modify_onclick_3(0,this.name);
									};
					document.getElementById(td_id).appendChild(tmp);
					document.getElementById(button_id).style.display = 'none';
					
					//插入菜名
					var span_id = 'td_span_' + row + '_' + col;
					tmp = document.createElement("span");
					tmp.id = span_id;
					tmp.innerHTML = '請修改菜名'
					document.getElementById(td_id).appendChild(tmp);
					
					//加問卷
					//插入問卷
					var sub_id = 'q3_sub_sub_' + i;
					var tmp = document.createElement("div");
					tmp.id = sub_id;
					tmp.className = 'wait_sub'
					document.getElementById('q3_sub_sub').appendChild(tmp);
					
					//插入問卷標題
					var row = Math.floor(i/3);
					var col = i%3;
					var span_id = 'td_span_' + row + '_' + col;
					var sub_title = '請修改菜名';
					var sub_span = 'q3_sub_sub_span_' + i;
					tmp = document.createElement("div");
					tmp.id = sub_span;
					tmp.innerHTML = sub_title;
					tmp.className = 'sub_title';
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入烹飪法標題
					tmp = document.createElement("span");
					tmp.innerHTML = '一、請問他的烹飪法是?<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入問卷內容--烹飪法
					var cook_select = 'cook_select_' + i;
					tmp = document.createElement("select");
					tmp.id = cook_select;
					tmp.name = cook_select;
					for(var j = 0; j < 9; j++){
						var new_option = new Option();
						tmp.options.add(new_option);
						tmp.options[j].value = j;
						tmp.options[j].innerHTML = cook_name[j];
					}
					var new_option = new Option();
					tmp.options.add(new_option);
					tmp.options[9].value = -1;
					tmp.options[9].innerHTML = '拉開選擇';
					tmp.options[9].selected = 'selected';
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入調味標題
					tmp = document.createElement("span");
					tmp.innerHTML = '<br><br>二、請問他的調味偏向是?<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入問卷內容--調味
					var tast_select = 'tast_select_' + i;
					tmp = document.createElement("select");
					tmp.id = tast_select;
					tmp.name = tast_select;
					for(var j = 0; j < 5; j++){
						var new_option = new Option();
						tmp.options.add(new_option);
						tmp.options[j].value = j;
						tmp.options[j].innerHTML = tast_name[j];
					}
					var new_option = new Option();
					tmp.options.add(new_option);
					tmp.options[5].value = -1;
					tmp.options[5].innerHTML = '拉開選擇';
					tmp.options[5].selected = 'selected';
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入烹飪法標題
					tmp = document.createElement("span");
					tmp.innerHTML = '<br><br>三、請問他的主要食材是?<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					
					//插入問卷內容--食材
					//insert radio1
					var check_radio_name = 'material_control_' + i;
					var check_radio = 'material_radio1_' + i;
					var tmp = document.createElement("input");
					tmp.id = check_radio;
					tmp.name = check_radio_name;
					tmp.type = 'radio';
					tmp.value = i;
					tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入標題文字
					tmp = document.createElement("span");
					tmp.innerHTML = '陸味<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert div1
					var div_id = 'q3_sub_sub_material_1_' + i;
					var tmp = document.createElement("div");
					tmp.id = div_id;
					tmp.name = div_id;
					tmp.className = 'close_material'
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert material1
					for(var j = 0; j < 9; j++){
						var material_id = 'material_' + j + '_' + i;
						var tmp = document.createElement("input");
						tmp.id = material_id;
						tmp.name = material_id;
						tmp.type = 'radio';
						tmp.value = j;
						document.getElementById(div_id).appendChild(tmp);
						
						//插入標題文字
						tmp = document.createElement("span");
						if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
						else	tmp.innerHTML = material_name[j];
						document.getElementById(div_id).appendChild(tmp);
					}
					
					//insert radio2
					check_radio = 'material_radio2_' + i;
					var tmp = document.createElement("input");
					tmp.id = check_radio;
					tmp.name = check_radio_name;
					tmp.type = 'radio';
					tmp.value = i;
					tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入標題文字
					tmp = document.createElement("span");
					tmp.innerHTML = '海鮮<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert div2
					var div_id = 'q3_sub_sub_material_2_' + i;
					var tmp = document.createElement("div");
					tmp.id = div_id;
					tmp.name = div_id;
					tmp.className = 'close_material'
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert material2
					for(var j = 9; j < 14; j++){
						var material_id = 'material_' + j + '_' + i;
						var tmp = document.createElement("input");
						tmp.id = material_id;
						tmp.name = material_id;
						tmp.type = 'radio';
						tmp.value = j;
						document.getElementById(div_id).appendChild(tmp);
						
						//插入標題文字
						tmp = document.createElement("span");
						if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
						else	tmp.innerHTML = material_name[j];
						document.getElementById(div_id).appendChild(tmp);
					}
					
					//insert radio3
					check_radio = 'material_radio3_' + i;
					var tmp = document.createElement("input");
					tmp.id = check_radio;
					tmp.name = check_radio_name;
					tmp.type = 'radio';
					tmp.value = i;
					tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入標題文字
					tmp = document.createElement("span");
					tmp.innerHTML = '主食<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert div3
					var div_id = 'q3_sub_sub_material_3_' + i;
					var tmp = document.createElement("div");
					tmp.id = div_id;
					tmp.name = div_id;
					tmp.className = 'close_material'
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert material3
					for(var j = 14; j < 24; j++){
						var material_id = 'material_' + j + '_' + i;
						var tmp = document.createElement("input");
						tmp.id = material_id;
						tmp.name = material_id;
						tmp.type = 'radio';
						tmp.value = j;
						document.getElementById(div_id).appendChild(tmp);
						
						//插入標題文字
						tmp = document.createElement("span");
						if(j%3 == 1)	tmp.innerHTML = material_name[j] + '<br>';
						else	tmp.innerHTML = material_name[j];
						document.getElementById(div_id).appendChild(tmp);
					}
					
					//insert radio4
					check_radio = 'material_radio4_' + i;
					var tmp = document.createElement("input");
					tmp.id = check_radio;
					tmp.name = check_radio_name;
					tmp.type = 'radio';
					tmp.value = i;
					tmp.onclick = function(){q3_sub_checkdata_1(this.value)};
					document.getElementById(sub_id).appendChild(tmp);
					
					//插入標題文字
					tmp = document.createElement("span");
					tmp.innerHTML = '蔬菜<br>';
					document.getElementById(sub_id).appendChild(tmp);
					
					//insert div4
					var div_id = 'q3_sub_sub_material_4_' + i;
					var tmp = document.createElement("div");
					tmp.id = div_id;
					tmp.name = div_id;
					tmp.className = 'close_material'
					document.getElementById(sub_id).appendChild(tmp);	
				
					//insert material4
					for(var j = 24; j < 32; j++){
						var material_id = 'material_' + j + '_' + i;
						var tmp = document.createElement("input");
						tmp.id = material_id;
						tmp.name = material_id;
						tmp.type = 'radio';
						tmp.value = j;
						document.getElementById(div_id).appendChild(tmp);
						
						//插入標題文字
						tmp = document.createElement("span");
						if(j%3 == 2)	tmp.innerHTML = material_name[j] + '<br>';
						else	tmp.innerHTML = material_name[j];
						document.getElementById(div_id).appendChild(tmp);
					}
					
					//插入按鈕div
					var button_div = 'sub_button_3_' + i;
					var tmp = document.createElement("div");
					tmp.id = button_div;
					tmp.name = button_div;
					tmp.className = 'sub_button';
					document.getElementById(sub_id).appendChild(tmp);	
					
					//插入next按鈕
					var next_button = 'next_button_3_' + i;
					var tmp = document.createElement("input");
					tmp.id = next_button;
					tmp.name = i;
					tmp.type = 'button';
					tmp.value = '下一題';
					tmp.className = 'next_button';
					document.getElementById(button_div).appendChild(tmp);	
					document.getElementById(tmp.id).onclick = function(){next_onclick_3_sub(this.name);};	
					
					//插入done按鈕
					var done_button = 'done_button_3_' + i;
					var tmp = document.createElement("input");
					tmp.id = done_button;
					tmp.name = i;
					tmp.name++;
					tmp.type = 'button';
					tmp.value = '完成';
					tmp.className = 'done_button';
					tmp.style.display = 'none';
					tmp.onclick = function(){done_onclick_3_sub((this.name-1),0,this.name);};
					document.getElementById(button_div).appendChild(tmp);	
		
					//加共同菜色
					var share_ID = 'share_' + i;
					var tmp = document.createElement("input");
					tmp.id = share_ID;
					tmp.name = 'share_list[]';
					tmp.type = 'checkbox';
					tmp.value = i;
					document.getElementById('share_div').appendChild(tmp);
					
					//插入菜名
					tmp = document.createElement("span");
					tmp.id = 'share_span_id_' + i;
					if(i%5 == 4)	tmp.innerHTML = '請修改菜名<br>';
					else	tmp.innerHTML = '請修改菜名';
					document.getElementById('share_div').appendChild(tmp);
					
					//加指定菜色
					for(var j = 1; j <= member_num; j++){
						for(var t = 1; t <= old_assign_num; t++){
							var assign_select = 'assign_select_' + j + '_' + t;
							var tmp = document.getElementById(assign_select);
							var new_option = new Option();
							tmp.options.add(new_option);
							tmp.options[i].value = 0;		
							tmp.options[i].innerHTML = '請插入菜名';
						}
					}
				}
			}
			flag = 1;
		}
		//assign變化且q4表格已產生
		if(now2 > 0){
			//assign_num 變少
			if(assign_num < old_assign_num){
				//砍指定菜
				for(var i = old_assign_num; i > assign_num; i--){
					for(var j = 0; j <= member_num; j++){
						var tr_id = 'assign_' + j;
						var td_id = 'assign_' + j + '_' + i;
						var fo = document.getElementById(tr_id);
						var so = document.getElementById(td_id);
						fo.removeChild(so);
					}
				}
				flag = 1;
			}
			//assign_num 變多
			if(assign_num > old_assign_num){
				//加指定菜
				for(var i = old_assign_num; i < assign_num; i++){
					for(var j = 0; j <= member_num; j++){
						//插入表格
						var ii = i;
						ii++;
						var assign_tr = 'assign_' + j;
						var assign_td = 'assign_' + j + '_' + ii;
						var tmp = document.createElement("td");
						tmp.id = assign_td;
						//第0行非第0格
						if(j == 0 && ii != 0)	tmp.innerHTML = '第' + ii + '道指定料理';
						document.getElementById(assign_tr).appendChild(tmp);
						//插入選單
						if(ii != 0 && j != 0){
							var assign_select = 'assign_select_' + j + '_' + ii;
							var tmp = document.createElement("select");
							var std = document.getElementById('assign_select_1_1');
							tmp.id = assign_select;
							tmp.name = assign_select;
							for(var t = 0; t < n_num; t++){
								var new_option = new Option();
								tmp.options.add(new_option);
								tmp.options[t].value = std.options[t].value;		
								tmp.options[t].innerHTML = std.options[t].innerHTML;
							}
							document.getElementById(assign_td).appendChild(tmp);
						}
					}
				}
				flag = 1;
			}
		}
		if(flag == 1){
			document.getElementById('now1').value = 3;
			if(document.getElementById('now2').value != 0)	document.getElementById('now2').value = 1;
			
			document.getElementById('q1_main').className = 'done_main';
			document.getElementById('q2_main').className = 'done_main';
			document.getElementById('q3_main').className = 'now_main';
			document.getElementById('q4_main').className = 'wait_main';
			document.getElementById('q5_main').className = 'wait_main';
			
			document.getElementById('q1_sub').className = 'done_sub';
			document.getElementById('q2_sub').className = 'done_sub';
			document.getElementById('q3_sub').className = 'now_sub';
			document.getElementById('q4_sub').className = 'wait_sub';
			document.getElementById('q5_sub').className = 'wait_sub';
			
			document.getElementById('q1_modify').style.display = '';
			document.getElementById('q2_modify').style.display = '';
			document.getElementById('q3_modify').style.display = 'none';
			document.getElementById('q4_modify').style.display = 'none';
			document.getElementById('q5_modify').style.display = 'none';
			
			document.getElementById('next_button_1').style.display = 'none';
			document.getElementById('next_button_2').style.display = 'none';
			if(document.getElementById('now2').value != 0)	document.getElementById('next_button_3').style.display = 'none';
			document.getElementById('next_button_4').style.display = '';
			document.getElementById('next_button_5').style.display = '';
			
			document.getElementById('done_button_1').style.display = '';
			document.getElementById('done_button_2').style.display = '';
			if(document.getElementById('now2').value != 0)	document.getElementById('done_button_3').style.display = '';
			document.getElementById('done_button_4').style.display = 'none';
			document.getElementById('done_button_5').style.display = 'none';
			
			document.getElementById('q3_main_sub').className = 'unuse_table';
			
			if(document.getElementById('now2').value != 0){
				for(var i = 0; i < n_num; i++){
					var next = 'next_button_3_' + i;
					var done = 'done_button_3_' + i;
					var modify = 'modify_dish_' + i;
					document.getElementById(next).style.display = '';
					document.getElementById(done).style.display = 'none';
					document.getElementById(modify).style.display = 'none';
				}
			}
			return;
		}
		document.getElementById("assign_num").value = assign_num;
	}
	
	//如果是第三題,重填菜名
	if(mod1 == 3){
		for(var i = 0; i < document.getElementById('dish_num').value; i++){
			var check_radio_1 = 'dish_radio1_' + i;
			var check_radio_2 = 'dish_radio2_' + i;
			var dish_select = 'dish_select_' + i;
			var sub_title = 'q3_sub_sub_span_' + i;
			var share_id = 'share_span_id_' + i;
			var old_assign_num = document.getElementById("assign_num").value;
			var row = Math.floor(i/3);
			var col = i%3;
			var td_span = 'td_span_' + row + '_' + col;
			if(document.getElementById(check_radio_1).checked){
				for(var j = 0; j < dish_num; j++){
					var dish_select = 'dish_select_' + i;
					if(dish_ID[j] == document.getElementById(dish_select).value){
						document.getElementById(td_span).innerHTML = dish_name[j];
						document.getElementById(sub_title).innerHTML = dish_name[j];					
						if(i%5 == 4)	document.getElementById(share_id).innerHTML = dish_name[j] + '<br>';
						else	document.getElementById(share_id).innerHTML = dish_name[j];
						for(var k = 1; k <= member_num; k++){
							for(var t = 1; t <= old_assign_num; t++){
								var assign_select = 'assign_select_' + k + '_' + t;
								document.getElementById(assign_select).options[i].value = dish_ID[j];
								document.getElementById(assign_select).options[i].innerHTML = dish_name[j];
							}
						}
					}
				}
			}
			else{
				var dish_text = 'dish_text_' + i;
				document.getElementById(td_span).innerHTML = document.getElementById(dish_text).value;
				document.getElementById(sub_title).innerHTML = document.getElementById(dish_text).value;
				if(i%5 == 4)	document.getElementById(share_id).innerHTML = document.getElementById(dish_text).value + '<br>';
				else	document.getElementById(share_id).innerHTML = document.getElementById(dish_text).value;
				for(var k = 1; k <= member_num; k++){
					for(var t = 1; t <= old_assign_num; t++){
						var assign_select = 'assign_select_' + k + '_' + t;
						document.getElementById(assign_select).options[i].innerHTML = document.getElementById(dish_text).value;
					}
				}		
			}
		}
	}
	
	//關掉完成問題
	//小問題
	if(mod1 == 0){
		var now_sub = 'q3_sub_sub_' + (mod2-1);
		var row = Math.floor((mod2-1)/3);
		var col = (mod2-1)%3;
		var now_dish = 'q3_table_' + row + '_' + col;
		document.getElementById(now_dish).className = 'done_dish';
		document.getElementById(now_sub).className = 'done_sub';
		document.getElementById('q3_main_sub').className = 'unuse_table';
		document.getElementById('q3_main').className = 'done_main';
	}
	//大問題
	else{
		var qmain = 'q'+ mod1 + '_main';
		var qsub = 'q'+ mod1 + '_sub';
		document.getElementById(qmain).className = 'done_main';
		document.getElementById(qsub).className = 'done_sub';
		if(mod1 == 3)	document.getElementById('q3_main_sub').className = 'unuse_table';
	}
	//打開原來問題
	//大問題
	if(now2 == 0 || (now2 - document.getElementById('dish_num').value) > 0){
		if(now1 <= 5){
			var qmain = 'q'+ now1 + '_main';
			var qsub = 'q'+ now1 + '_sub';
			var style = 'main_block_' + now1;
			document.getElementById(qmain).className = 'now_main';
			document.getElementById(qsub).className = 'now_sub';
			document.getElementById('main').className = style;
		}
		else	document.getElementById('main').className = 'main_block_5';
			
	}
	//小問題
	else{
		var now_sub = 'q3_sub_sub_' + (now2-1);
		var row = Math.floor((now2-1)/3);
		var col = (now2-1)%3;
		var now_dish = 'q3_table_' + row + '_' + col;
		document.getElementById(now_dish).className = 'now_dish';
		document.getElementById(now_sub).className = 'now_sub';
		document.getElementById('q3_main_sub').className = 'use_table';
		document.getElementById('q3_main').className = 'now_main';
		document.getElementById('main').className = 'main_block_3';
	}
	//打開修改鍵
	for(var i = 1; i < now1; i++){
		var modify_button = 'q' + i + '_modify';
		document.getElementById(modify_button).style.display = '';
	}
	for(i = 0; i < now2-1; i++){
		document.getElementById('q3_modify').style.display = '';
		if(i < n_num){
			var modify_button = 'modify_dish_' +　i;
			document.getElementById(modify_button).style.display = '';
		}
	}
	
}

function open_sub(mother){
	for(i = 0; i <71; i++)	questionnaire_captain_beta.class3[i].checked = false;
	document.getElementById('q1_sub_1').style.display = 'none';
	document.getElementById('q1_sub_2').style.display = 'none';
	document.getElementById('q1_sub_2_1').style.display = 'none';
	document.getElementById('q1_sub_2_2').style.display = 'none';
	document.getElementById('q1_sub_3').style.display = 'none';
	document.getElementById('q1_sub_4').style.display = 'none';
	document.getElementById('q1_sub_4_1').style.display = 'none';
	document.getElementById('q1_sub_4_2').style.display = 'none';
	document.getElementById('q1_sub_5').style.display = 'none';
	document.getElementById('q1_sub_6').style.display = 'none';
	document.getElementById('q1_sub_7').style.display = 'none';
	document.getElementById('q1_sub_7_1').style.display = 'none';
	if(mother == 1){
		document.getElementById('q1_sub_1').style.display = '';
		questionnaire_captain_beta.class3[0].checked = true;
	}
	else if(mother == 2){
		document.getElementById('q1_sub_2').style.display = '';
		questionnaire_captain_beta.class3[14].checked = true;
	}
	else if(mother == 3){
		document.getElementById('q1_sub_2').style.display = '';
		document.getElementById('q1_sub_2_1').style.display = '';
		questionnaire_captain_beta.class3[14].checked = true;
		questionnaire_captain_beta.class3[15].checked = true;
	}
	else if(mother == 4){
		document.getElementById('q1_sub_2').style.display = '';
		document.getElementById('q1_sub_2_2').style.display = '';
		questionnaire_captain_beta.class3[14].checked = true;
		questionnaire_captain_beta.class3[22].checked = true;
	}
	else if(mother == 5){
		document.getElementById('q1_sub_3').style.display = '';
		questionnaire_captain_beta.class3[28].checked = true;
	}
	else if(mother == 6){
		document.getElementById('q1_sub_4').style.display = '';
		questionnaire_captain_beta.class3[35].checked = true;
	}
	else if(mother == 7){
		document.getElementById('q1_sub_4').style.display = '';
		document.getElementById('q1_sub_4_1').style.display = '';
		questionnaire_captain_beta.class3[35].checked = true;
		questionnaire_captain_beta.class3[36].checked = true;
	}
	else if(mother == 8){
		document.getElementById('q1_sub_4').style.display = '';
		document.getElementById('q1_sub_4_2').style.display = '';
		questionnaire_captain_beta.class3[35].checked = true;
		questionnaire_captain_beta.class3[42].checked = true;
	}
	else if(mother == 9){
		document.getElementById('q1_sub_5').style.display = '';
		questionnaire_captain_beta.class3[47].checked = true;
	}
	else if(mother == 10){
		document.getElementById('q1_sub_6').style.display = '';
		questionnaire_captain_beta.class3[57].checked = true;
	}
	else if(mother == 11){
		document.getElementById('q1_sub_7').style.display = '';
		questionnaire_captain_beta.class3[62].checked = true;
	}
	else if(mother == 12){
		document.getElementById('q1_sub_7').style.display = '';
		document.getElementById('q1_sub_7_1').style.display = '';
		questionnaire_captain_beta.class3[62].checked = true;
		questionnaire_captain_beta.class3[63].checked = true;
	}
	else if(mother == 13){
		document.getElementById('q1_sub_7').style.display = '';
		questionnaire_captain_beta.class3[62].checked = true;
		questionnaire_captain_beta.class3[68].checked = true;
	}
	else if(mother == 14){
		document.getElementById('q1_sub_7').style.display = '';
		questionnaire_captain_beta.class3[62].checked = true;
		questionnaire_captain_beta.class3[69].checked = true;
	}
	else if(mother == 15){
		document.getElementById('q1_sub_7').style.display = '';
		questionnaire_captain_beta.class3[62].checked = true;
		questionnaire_captain_beta.class3[70].checked = true;
	}
}

function q1_checkdata_1(){
	if(document.getElementById('class1_3').checked){
		document.getElementById('class1_1').checked = false;
		document.getElementById('class1_2').checked = false;
		document.getElementById('class1_1').disabled = true;
		document.getElementById('class1_2').disabled = true;
	}
	else{
		document.getElementById('class1_1').disabled = false;
		document.getElementById('class1_2').disabled = false;
	}	
}

function q1_checkdata_2(){
	for(var i = 0; i < 71; i++){
		if(i != 0 && i != 14 && i != 15 && i != 22 && i != 28 && i != 35 && i != 36 && i != 42 && i != 47 && i != 57 && i != 62 && i != 63){
			if(questionnaire_captain_beta.class3[i].checked == true){
				return true;
			}
		}
	}
	alert('地區分類未完成,請檢查!(請勾選至資料表末端)');
	return false;
}

function q2_checkdata_1(){
	var now2 = document.getElementById('now2').value;
	var absent = new Array();
	var assign_table = new Array();
	for(var i = 1; i <= member_num; i++){
		absent[i] = 'absent_' + i;
		assign_table[i] = 'assign_' + i;
	}
	if(document.getElementById('absent').checked){
		for(var j = 1; j <= member_num; j++){
			document.getElementById(absent[j]).checked = false;
			document.getElementById(absent[j]).disabled = true;
			if(now2 > 0)	document.getElementById(assign_table[j]).style.display = '';
		}
	}
	else{
		for(var j = 1; j <= member_num; j++){
			document.getElementById(absent[j]).disabled = false;
			if(now2 > 0){
				if(document.getElementById(absent[j]).checked){
					document.getElementById(assign_table[j]).style.display = 'none';
				}
				else{
					document.getElementById(assign_table[j]).style.display = '';
				}
			}
		}
	}	
}

function q2_checkdata_2(){
	if(document.getElementById('price').value == ''){
		alert('價格不可為空白!');
		return false;
	}
	if(document.getElementById('dish_num').value == ''){
		alert('菜數不可為空白!');
		return false;
	}
	if(isNaN(parseInt(document.getElementById('price').value))){
		alert('價格請填入阿拉伯數字!');
		return false;
	}
	if(isNaN(parseInt(document.getElementById('dish_num').value))){
		alert('菜數請填入阿拉伯數字!');
		return false;
	}
	return true;
}

function q3_checkdata_1(){
	var num = document.getElementById('dish_num').value;
	for(var i = 0; i < num; i++){
		var radio1 = 'dish_radio1_' + i;
		var radio2 = 'dish_radio2_' + i;
		var dish_select = 'dish_select_' + i;
		var dish_text = 'dish_text_' + i;
		
		if(document.getElementById(radio1).checked){
			document.getElementById(dish_text).disabled = true;
			document.getElementById(dish_text).value = '';
		}
		else if(document.getElementById(radio2).checked){
			document.getElementById(dish_text).disabled = false;
		}
	}
}


function q3_checkdata_2(){
	var num = document.getElementById('dish_num').value;
	for(var i = 0; i < num; i++){
		var price = 'dish_price_' + i;
		var check = 'dish_price_check_' + i;
		
		if(document.getElementById(check).checked){
			document.getElementById(price).disabled = true;
			document.getElementById(price).value = '';
		}
		else{
			document.getElementById(price).disabled = false;
		}
	}
}

function q3_checkdata_3(){
	var num = document.getElementById('dish_num').value;
	for(var i = 0; i < num; i++){
		var radio1 = 'dish_radio1_' + i;
		var radio2 = 'dish_radio2_' + i;
		var dish_select = 'dish_select_' + i;
		var dish_text = 'dish_text_' + i;
		var price = 'dish_price_' + i;
		var check = 'dish_price_check_' + i;
		var role = 'role_select_' + i;
		var ii = i;
		ii++;
		
		if(document.getElementById(radio2).checked){
			if(document.getElementById(dish_text).value == ''){
				alert('(第' + ii + '道菜)' + '菜名不得空白或拉開選單選擇網友吃過的菜');
				return false;
			}
		}
		if(document.getElementById(check).checked == false){
			if(document.getElementById(price).value == ''){
				alert('(第' + ii + '道菜)' + '價格欄位不能空白');
				return false;
			}
			if(isNaN(parseInt(document.getElementById(price).value))){
				alert('(第' + ii + '道菜)' + '價格必須為阿拉伯數字');
				return false;
			}
		}
		if(document.getElementById(role).value == 0){
				alert('(第' + ii + '道菜)' + '請選擇角色');
				return false;
		}
	}
	return true;
}

function q3_sub_checkdata_1(dish){
	var control1 = 'material_radio1_' + dish;
	var control2 = 'material_radio2_' + dish;
	var control3 = 'material_radio3_' + dish;
	var control4 = 'material_radio4_' + dish;
	var block1 = 'q3_sub_sub_material_1_' + dish;
	var block2 = 'q3_sub_sub_material_2_' + dish;
	var block3 = 'q3_sub_sub_material_3_' + dish;
	var block4 = 'q3_sub_sub_material_4_' + dish;
	if(document.getElementById(control1).checked){
		document.getElementById(block1).className = 'open_material';
		document.getElementById(block2).className = 'close_material';
		document.getElementById(block3).className = 'close_material';
		document.getElementById(block4).className = 'close_material';
		for(var i = 9; i < 32; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
	}
	else if(document.getElementById(control2).checked){
		document.getElementById(block1).className = 'close_material';
		document.getElementById(block2).className = 'open_material';
		document.getElementById(block3).className = 'close_material';
		document.getElementById(block4).className = 'close_material';
		for(var i = 0; i < 9; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
		for(var i = 14; i < 24; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
	}
	else if(document.getElementById(control3).checked){
		document.getElementById(block1).className = 'close_material';
		document.getElementById(block2).className = 'close_material';
		document.getElementById(block3).className = 'open_material';
		document.getElementById(block4).className = 'close_material';
		for(var i = 0; i < 14; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
		for(var i = 24; i < 32; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
	}
	else if(document.getElementById(control4).checked){
		document.getElementById(block1).className = 'close_material';
		document.getElementById(block2).className = 'close_material';
		document.getElementById(block3).className = 'close_material';
		document.getElementById(block4).className = 'open_material';
		for(var i = 0; i < 24; i++){
			var material = 'material_' + i + '_' + dish;
			document.getElementById(material).checked = false;
		}
	}
}

function q3_sub_checkdata_2(dish){
	var cook_select = 'cook_select_' + dish;
	var tast_select = 'tast_select_' + dish;
	if(document.getElementById(cook_select).value == -1){
		alert('請選擇烹飪方式');
		return false;
	}
	if(document.getElementById(tast_select).value == -1){
		alert('請選擇調味方式');
		return false;
	}
	for(var i = 0; i < 32; i++){
		var material = 'material_' + i + '_' + dish;
		if(document.getElementById(material).checked){
			return true;
		}
	}
	alert('請選擇食材');
	return false;
}

function q5_checkdata_1(){
	if(document.getElementById('note_check_1').checked){
		document.getElementById('note_title_2').disabled = false;
		document.getElementById('note_2').disabled = false;
	}
	else{
		document.getElementById('note_title_2').disabled = true;
		document.getElementById('note_2').disabled = true;
	}
	if(document.getElementById('note_check_2').checked){
		document.getElementById('note_title_3').disabled = false;
		document.getElementById('note_3').disabled = false;
	}
	else{
		document.getElementById('note_title_3').disabled = true;
		document.getElementById('note_3').disabled = true;
	}
}

function q5_checkdata_2(){
	if(document.getElementById('photo_1').checked){
		document.getElementById('photo_url').disabled = false;
	}
	else if(document.getElementById('photo_2').checked){
		document.getElementById('photo_url').disabled = true;
	}
}

function q5_checkdata_3(){
	var CheckData = document.getElementById('description').value;
	if(CheckData == ''){
		alert('餐廳敘述不可空白');
		return false;
	}
	if(CheckData.length < 200){
		alert('餐廳敘述不可低於200字');
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

function next_onclick_1(){
	if(q1_checkdata_2()){
		next_question();
	}
}

function next_onclick_2(){
	if(q2_checkdata_2()){
		generate_dish_name();
		next_question();
	}
}

function next_onclick_3(){
	if(q3_checkdata_3()){
		generate_q3_table();
		generate_q3_sub_sub(); 
		generate_q4(); 
		next_question();
	}
}

function next_onclick_3_sub(dish){
	if(q3_sub_checkdata_2(dish)){
		next_question();
	}
}

function next_onclick_4(){
	next_question();
}

function next_onclick_5(){
	if(q5_checkdata_3()){
		next_question();
	}
}

function done_onclick_1(mod1,mod2){
	if(q1_checkdata_2()){
		done_question(mod1,mod2);
	}
}

function done_onclick_2(mod1,mod2){
	if(q2_checkdata_2()){
		done_question(mod1,mod2);
	}
}

function done_onclick_3(mod1,mod2){
	if(q3_checkdata_3()){
		done_question(mod1,mod2);
	}
}

function done_onclick_3_sub(dish,mod1,mod2){
	if(q3_sub_checkdata_2(dish)){
		done_question(mod1,mod2);
	}
}

function done_onclick_4(mod1,mod2){
	done_question(mod1,mod2);
}

function done_onclick_5(mod1,mod2){
	if(q5_checkdata_3()){
		done_question(mod1,mod2);
	}
}

function modify_onclick_3(mod1,mod2){
	if(q3_checkdata_3()){
		done_question(3,0);
		modify_question(mod1,mod2);
	}
}