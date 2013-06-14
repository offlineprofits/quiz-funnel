<?php

require 'includes.php';

if(!IsLoggedIn()){
	Leave('signin.php');
}

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
}else{
	$id = null;
}

$csv = '';
$csv_array = array();

$survey = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "survey WHERE id = $id ORDER BY id DESC LIMIT 0,1");
if(!$survey){
	Leave('index.php');
}

$results = $db->get_results("SELECT * FROM " . TABLES_PREFIX . "results WHERE survey_id = $id ORDER BY id ASC");

$questions = $db->get_results("SELECT * FROM " . TABLES_PREFIX . "question WHERE survey_id = $id ORDER BY id ASC");

$csv_array_count = 0;
$csv_array[$csv_array_count][] = str_replace(array(',','"'), "",$tmpl_strings->Get('date_taken'));
if($questions){
	foreach($questions as $question){
		$csv_array[$csv_array_count][] = str_replace(array(',','"'), "",$question->question);
	}
}

if($results){
	foreach($results as $a){
		$answers = unserialize($a->answers);
		if(count($answers) > 0){
			$csv_array_count++;
			$csv_array[$csv_array_count][] = date('j M Y H:i',strtotime($a->date_taken));
		
			if($questions){
				foreach($questions as $q){
					$answer = '';
					if(isset($answers[$q->id]) AND $answers[$q->id] != ''){
						if($q->question_type == 'ma'){
							$answer = implode(" & ", $answers[$q->id]);
						}elseif($q->question_type == 'tf'){
							if($answers[$q->id] == 'f'){
								$answer = $tmpl_strings->Get('false');
							}else{
								$answer = $tmpl_strings->Get('true');
							}
						}else{
							$answer = $answers[$q->id];	
						}
					}
					$csv_array[$csv_array_count][] = str_replace(array(',','"'), "",$answer);
				}
			}
		}
	}
}

$filename = Slug($survey->title).'_' . time() . '.csv';

if(count($csv_array) > 0){
	foreach($csv_array as $c){
		$csv .= array_to_CSV($c);
	}
}

header("Content-type: application/ofx");
header("Content-Disposition: attachment; filename=$filename");
echo $csv;
exit;
