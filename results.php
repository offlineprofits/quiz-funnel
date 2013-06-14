<?php

require 'includes.php';

$output = array();
$output['status'] = 1;


if(isset($_POST['id']) AND $_POST['id'] != ''){
	$id = intval($_POST['id']);
}else{
	$output['status'] = 0;
	$output['error'] = $tmpl_strings->Get('error');
	echo json_encode($output);
	exit();
}

$result = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "results WHERE id = $id ORDER BY id DESC LIMIT 0,1");
if(!$result){
	$output['status'] = 0;
	$output['error'] = $tmpl_strings->Get('error');
	echo json_encode($output);
	exit();
}

$answers = unserialize($result->answers);

$questions = $db->get_results("SELECT * FROM " . TABLES_PREFIX . "question WHERE survey_id = ".intval($_POST['survey_id'])." ORDER BY id ASC");
if(!$questions){
	$output['status'] = 0;
	$output['error'] = $tmpl_strings->Get('error');
	echo json_encode($output);
	exit();
}



$output['answers'] = '<table class="table table-bordered">
<thead>
<tr>
<th>'.$tmpl_strings->Get('question').'</th>
<th>'.$tmpl_strings->Get('answer').'</th>
</tr>
</thead>
<tbody';
foreach($questions as $q){
	$answer = '';
	if(isset($answers[$q->id]) AND $answers[$q->id] != ''){
		if($q->question_type == 'ma'){
			$answer = implode(", ", $answers[$q->id]);
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
	$output['answers'] .= '<tr><td>'.$q->question.'</td><td>'.$answer.'</td></tr>';
}

$output['answers'] .= '</tbody>
</table>';

echo json_encode($output);
exit();
