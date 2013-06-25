<?php
require 'includes.php';

$layout = new Layout('html/','str/');
$layout->SetContentView('thankyou');


$layout->AddContentById('current_year', date('Y'));
$layout->AddContentById('site_url', SITE_URL);
$layout->AddContentById('catinfo', $_SESSION["category"]);
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

$layout->RenderViewAndExit();
?>