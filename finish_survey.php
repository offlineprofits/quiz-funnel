<?php

require 'includes.php';

$layout = new Layout('html/','str/');
$layout->SetContentView('finish-survey');



$layout->AddContentById('current_year', date('Y'));
$layout->AddContentById('site_url', SITE_URL);

$answer = unserialize($_SESSION["answers"]);
/*$j = 0;
foreach ($answer as $k=>$ans) {
	unset ($answer[$k]);
	$k = $j;
	$answer[$k] = $ans;
	$j++;
	
}*/

//print_r($answer);die();

$scores = $db->get_results("SELECT id,question_type,scores,correct_ans,choices FROM ". TABLES_PREFIX . "question WHERE survey_id = '$_SESSION[survey_id]' ");

$total_score = 0;
//print_r($answer);
//echo "<pre>";
//print_r($scores);echo "</pre>";die();

foreach($scores as $score) {
	if(!$answer[$score->id]) {
		continue;
	}
	//print_r($score);die();
	if($score->scores) {
	 	if($score->question_type == "tf") {
			$data = unserialize($score->scores);
			if($answer[$score->id] == "t")
				$total_score += $data[0];
			if($answer[$score->id] == "f")
				$total_score += $data[1];
			 
		}
		else if($score->question_type == 'ma' || $score->question_type == 'mp') { 
			$choice = unserialize($score->choices);
			$k = array_search($answer[$score->id], $choice);
			$data = unserialize($score->scores);
			$total_score += $data[$k];
			
		}
		else {
			
			if($score->correct_ans == $answer[$score->id]) {
				$total_score += $score->scores;
			}
		}
	}
	
}

$_SESSION['total_score'] = $total_score; 


/*$j = 0;
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


*/



$layout->RenderViewAndExit();

