<?php
require 'includes.php';

$layout = new Layout('html/','str/');
$layout->SetContentView('thankyou');


$layout->AddContentById('current_year', date('Y'));
$layout->AddContentById('site_url', SITE_URL);

$layout->AddContentById('finalscore', $_SESSION["total_score"]);
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])){
	
	
	/*$survey = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "takers WHERE first_name = '$_POST[firstname]' 
	AND last_name = '$_POST[lastname]' AND email = '$_POST[email]' AND survey_id = '$_SESSION[survey_id]' ");
	print_r($survey);
	if($survey) {
		$values = array("category" => "$_SESSION[category]");
		$where = array("first_name" => Clean($_POST['firstname']), 
					"last_name" => Clean($_POST['lastname']),
					"email" => Clean($_POST['email']),
					"survey_id" => Clean($_SESSION["survey_id"])
					);
		$db->update(TABLES_PREFIX . "takers", $values, $where);		
	}
	
	else {*/
		$values = array("first_name" => Clean($_POST['firstname']), 
						"last_name" => Clean($_POST['lastname']),
						"email" => Clean($_POST['email']),
						"category" => $_SESSION[category],
						"survey_id" => Clean($_SESSION["survey_id"]),
						"time" => date("Y-m-d H:i:s")
						);
	 
		$db->insert(TABLES_PREFIX . "takers", $values);
	//}
}


$scores = $db->get_results("SELECT score FROM ". TABLES_PREFIX . "survey WHERE id = '$_SESSION[survey_id]'");
$score = explode(";;", $scores[0]->score);
//print_r($score);die();
//$temp = 0;
foreach($score as $s) {
	//echo $s;
	$pos = strpos($s,":");
	$scr = substr($s,$pos+2,strlen($s));
	$your_cat = substr($s,0,$pos);
	$temp[$your_cat] = $scr;
}
$temp["as"] = 0;
asort($temp);
foreach ($temp as $key=>$t) {
	if($_SESSION['total_score'] > $t){
		continue;
	}
	else {
		$your_category = $key;
	}
}

/*foreach($score as $s) {
$val = explode("::",$s);
	print_r($val);
	if($_SESSION['total_score'] <= $val[1]) {
		$layout->AddContentById('yourcategory', "You are categorized as $val[0]");
		
	}
	else {
		$layout->AddContentById('yourcategory', "You are categorized as $val[1]");
	}
}*/
$layout->AddContentById('yourcategory', "$your_category");
$layout->RenderViewAndExit();
?>