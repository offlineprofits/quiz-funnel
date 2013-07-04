<?php

require 'includes.php';

if(!IsLoggedIn()){
	Leave('signin.php');
}

if(!AdminCanManageSurvey()){
	if(AdminCanManageAdmins()){
		Leave('admins.php');
	}else{
		Leave('signin.php');
	}
}

/*if(isset($_GET['name'])){
	$id = intval($_GET['name']);
}else{
	Leave('index.php');
}*/
$layout = PrivatePage('category', "$_GET[name]-Manage Categories");
if($_POST['submit']) {
	
	
		$result = $db->query("DELETE FROM ".TABLES_PREFIX."taker_categories WHERE cname='$_POST[cname_old]'");
		$data["cname"] = Clean($_POST['cname']);
		$val = '';
		
		foreach($_POST['optioncat'] as $opt) {
			$data['survey_id'] = $opt;
			$db->insert(TABLES_PREFIX . "taker_categories", $data);
			//$db->query("UPDATE ".TABLES_PREFIX."taker_categories SET cname=Clean($_POST[cname]");//(TABLES_PREFIX . "taker_categories", $data);
			
		}
	
}
$pname = isset($_POST['cname']) ? $_POST['cname'] : $_GET['name'];
$layout->AddContentById("name",$pname );
$category = $db->get_results("SELECT title,id FROM ".TABLES_PREFIX."survey");
$category_selected = $db->get_results("SELECT ".TABLES_PREFIX."taker_categories.cname,".TABLES_PREFIX."survey.id,
                                ".TABLES_PREFIX."survey.title FROM ".TABLES_PREFIX."taker_categories 
                                 INNER JOIN ".TABLES_PREFIX.
                             "survey ON ".TABLES_PREFIX."survey.id=".TABLES_PREFIX."taker_categories.survey_id
                            WHERE ".TABLES_PREFIX."taker_categories.cname='$pname'");
//print_r($category_selected);die();
$val = array();
foreach($category_selected as $cs) {
	$val[] = $cs->title;
}
//$category_selected = explode(",",$_GET['s']);
$options_html = '';


	foreach($category as $cat) {
		
		$opt_layout = new Layout('html/','str/');
		$opt_layout->SetContentView('category-options');
		
		if(in_array($cat->title, $val)){
			$opt_layout->AddContentById('optionid', $cat->id." selected=selected");
		}		
		$opt_layout->AddContentById('optionid', $cat->id);	
		$opt_layout->AddContentById('optionname', $cat->title);
		 
			
		
		
		//$opt_layout->AddContentById('permissions', $perm_html);
		
		
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




//$layout->AddContentById("sur", $category[0]->cate);

$layout->AddContentById('options', $options_html);
$layout->RenderViewAndExit();
