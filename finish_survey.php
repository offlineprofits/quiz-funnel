<?php

require 'includes.php';

$layout = new Layout('html/','str/');
$layout->SetContentView('finish-survey');



$layout->AddContentById('current_year', date('Y'));
$layout->AddContentById('site_url', SITE_URL);

$answer = unserialize($_SESSION["answers"]);

$j = 0;
foreach ($answer as $k=>$ans) {
	unset ($answer[$k]);
	$k = $j;
	$answer[$k] = $ans;
	$j++;
	
}

$result = $db->get_results("SELECT correct_ans FROM " . TABLES_PREFIX . "question WHERE survey_id = '$_SESSION[survey_id]' ");

for($i=0;$i<sizeof($result);$i++) {
	
	
	if($result[$i]->correct_ans == "true") {
		$val[] = "t";
	}
	else if($result[$i]->correct_ans == "false") { 
		$val[] = "f";
	}
	else if(is_array($result[$i]->correct_ans)) { 
		$val[] = $result[$i]->correct_ans;
	}
	else if(preg_match("/;;/", $result[$i]->correct_ans)) {
		$arr = explode(";;",$result[$i]->correct_ans);
		$val[] = $arr;
	}
	else {
		$val[] = $result[$i]->correct_ans;
	}
	
	
}

for($j=0;$j<sizeof($answer);$j++){
	if($val[$j] != "") {
		if($val[$j] == $answer[$j]) {
			$_SESSION["category"] = "trader";
		}
		else { 
			$_SESSION["category"] = "beginner";
		}
	}
}


	



$layout->RenderViewAndExit();

