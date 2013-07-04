<?php
require 'includes.php';

switch($_REQUEST['action']) {
	case 'quesperpage' : quesperPage($_REQUEST['sid'],$_REQUEST['ques']); break;
}

function quesperPage($id,$question) {
	global $db;
	$db->query("UPDATE ".TABLES_PREFIX."survey SET quesperpage=$question WHERE id=$id");
	echo 'success';
}


?>