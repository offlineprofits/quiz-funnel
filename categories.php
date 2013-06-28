<?php
require 'includes.php';

if(!IsLoggedIn()){
	Leave('signin.php');
}

if(!AdminCanManageAdmins()){
	if(AdminCanManageSurvey()){
		Leave('index.php');
	}else{
		Leave('signin.php');
	}
}

$layout = PrivatePage('categories', '{{ST:categories}}');

if($_GET['action'] == 'delete') {
	$db->query("DELETE FROM ".TABLES_PREFIX."taker_categories WHERE cname='$_GET[id]'");
}

if(isset($_POST['catsubmit'])) {
	$data["cname"] = $_POST['cname'];
	$val = '';
	foreach($_POST['optioncat'] as $opt) {
		//$val .= $opt.",";
		$result = $db->query("SELECT cname FROM ".TABLES_PREFIX."taker_categories WHERE cname='$_POST[cname]' AND survey_id='$opt'");
		
		if($result) {
			$layout->AddContentById("suberror", "A category with same name and for same survey already exists");
			continue;
		}	
		else {
			
			$data['survey_id'] = $opt;
			$db->insert(TABLES_PREFIX . "taker_categories", $data);
		}
	}
	//$data['survey_id'] = substr($val,0,strlen($val)-1);
	
	//$db->insert(TABLES_PREFIX . "taker_categories", $data);
	
}

$surveys = $db->get_results("SELECT title,id FROM " . TABLES_PREFIX . "survey");
$options_html = '';

if($surveys) {
	foreach($surveys as $survey) {
		
		$opt_layout = new Layout('html/','str/');
		$opt_layout->SetContentView('category-options');
		$opt_layout->AddContentById('optionid', $survey->id);
		$opt_layout->AddContentById('optionname', $survey->title);
	//	$opt_layout->AddContentById('permissions', $perm_html);
		
		
		$permissions = unserialize($admin->permissions);
		
		$perm_html = '';
		if(is_array($permissions)){
			if($permissions['can_manage_surveys'] == 'y' AND $permissions['can_manage_admins'] == 'y'){
				$perm_html .= '{{ST:surveys_and_admins}}';
			}elseif($permissions['can_manage_surveys'] == 'y'){
				$perm_html .= '{{ST:surveys_only}}';
			}elseif($permissions['can_manage_admins'] == 'y'){
				$perm_html .= '{{ST:admins_only}}';
			}
		}
		$opt_layout->AddContentById('permissions', $perm_html);
		
		$options_html .= $opt_layout-> ReturnView();
	}
}
$categories = $db->get_results("SELECT cname,GROUP_CONCAT(survey_survey.title)as cate FROM ".TABLES_PREFIX."taker_categories INNER JOIN ".TABLES_PREFIX."survey ON ".TABLES_PREFIX."taker_categories.survey_id= ".TABLES_PREFIX."survey.id GROUP BY cname");
//print_r($categories);die();
$cat_html = "";
if($categories) {
	foreach($categories as $cat) {
		
		
		//$sur = $db->get_results("SELECT title FROM ". TABLES_PREFIX ."survey WHERE id='$cat->survey_id'");
		$cat_layout = new Layout('html/','str/');
		$cat_layout->SetContentView('categories-rows');
		$cat_layout->AddContentById('sur', $cat->cate);
		//$cat_layout->AddContentById('id', $cat->id);
		$cat_layout->AddContentById('name', $cat->cname);
			
		$permissions = unserialize($admin->permissions);
		
		$perm_html = '';
		if(is_array($permissions)){
			if($permissions['can_manage_surveys'] == 'y' AND $permissions['can_manage_admins'] == 'y'){
				$perm_html .= '{{ST:surveys_and_admins}}';
			}elseif($permissions['can_manage_surveys'] == 'y'){
				$perm_html .= '{{ST:surveys_only}}';
			}elseif($permissions['can_manage_admins'] == 'y'){
				$perm_html .= '{{ST:admins_only}}';
			}
		}
		$cat_layout->AddContentById('permissions', $perm_html);
		
		$cat_html .= $cat_layout-> ReturnView();
	}
}


$layout->AddContentById('rowcategory', $cat_html);
$layout->AddContentById('options', $options_html);
$layout->RenderViewAndExit();