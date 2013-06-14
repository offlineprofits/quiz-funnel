<?php
require 'includes.php';
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])){
	$values = array("first_name" => $_POST['firstname'], 
					"last_name" => $_POST['lastname'],
					"email" => $_POST['email'],
					"category" => "beginner",
					"survey_id" => $_SESSION["survey_id"]
					);
 
	$db->insert(TABLES_PREFIX . "takers", $values);
	
}


?>