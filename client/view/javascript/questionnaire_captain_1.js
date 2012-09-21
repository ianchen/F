function next_question(now_main_question, now_sub_question, next_main_question, next_sub_question){
	<?php $now++;?>
	now_main_question.className = "normal_main";
	now_sub_question.className = "normal_sub";
	next_main_question.className = "special_sub";
	next_sub_question.className = "special_sub";
}
	