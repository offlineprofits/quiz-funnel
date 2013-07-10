<?php
require 'includes.php';

switch($_REQUEST['action']) {
	case 'quesperpage' : quesperPage($_REQUEST['sid'],$_REQUEST['ques']); break;
	case 'swap' : swapRow($_REQUEST['myid'],$_REQUEST['pid']);break;
}

function quesperPage($id,$question) {
	global $db;
	$db->query("UPDATE ".TABLES_PREFIX."survey SET quesperpage=$question WHERE id=$id");
	echo 'success';
}

function swapRow($myid,$pid) {
	global $db;
	
	$temp = "0".$pid."0100";
	$db->query("UPDATE ".TABLES_PREFIX."question SET id=$temp WHERE id=$myid");
	$db->query("UPDATE ".TABLES_PREFIX."question SET id=$myid WHERE id=$pid");
	$db->query("UPDATE ".TABLES_PREFIX."question SET id=$pid WHERE id=$temp");
	/*$db->query("UPDATE ".TABLES_PREFIX."question SET id = CASE WHEN id = $pid THEN $myid ELSE $pid END
				WHERE id IN ($myid, $pid)");*/
	echo 'success';
}

?>