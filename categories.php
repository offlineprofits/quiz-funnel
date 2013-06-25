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

if(isset($_POST['catsubmit'])) {
	$data["cname"] = $_POST['cname'];
	$val = '';
	foreach($_POST['optioncat'] as $opt) {
		$val .= $opt.",";
	}
	$data['survey_id'] = substr($val,0,strlen($val)-1);
	
	$db->insert(TABLES_PREFIX . "taker_categories", $data);
	
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
$categories = $db->get_results("SELECT cname,survey_id FROM " . TABLES_PREFIX . "taker_categories");

$cat_html = "";
if($categories) {
	foreach($categories as $cat) {
		
		$suid = explode(",",$cat->survey_id);
		$sur = '' ;
		foreach($suid as $s) {
			$ss = $db->get_results("SELECT title FROM ". TABLES_PREFIX ."survey WHERE id='$s'");
			
			$sur .= $ss[0]->title.",";
		}
		$sur = substr($sur, 0, strlen($sur)-1);
		
		$cat_layout = new Layout('html/','str/');
		$cat_layout->SetContentView('categories-rows');
		$cat_layout->AddContentById('sur', $sur);
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