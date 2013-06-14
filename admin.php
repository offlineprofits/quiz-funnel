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



$layout = PrivatePage('admin', '{{ST:administrators}}');

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
}else{
	Leave('admins.php');
}

if($id == intval($_SESSION['surveyengine_admin_user_id'])){
	echo $tmpl_strings->Get('cant_edit_yourself') . ' <a href="admins.php">'.$tmpl_strings->Get('back').'</a>';
	exit();
}

$admin = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE id = $id ORDER BY id DESC LIMIT 0,1");

if(isset($_POST['delete'])){
	$db->query("DELETE FROM " . TABLES_PREFIX . "admin WHERE id = " . $id);
	Leave('admins.php');
}

$layout->AddContentById('id', $admin->id);

if(isset($_POST['submit'])){
	
	$errors = false;
	$values = array();
	$format = array();
	$error_msg = '';
	
	if(isset($_POST['email']) AND $_POST['email'] != ''){
		$layout->AddContentById('email', $_POST['email']);
		$check_email = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE email = '" . Clean($_POST['email']) . "' ORDER BY id DESC LIMIT 0,1");
		if($check_email AND intval($check_email->id) != $id){
			$errors = true;
			$error_msg .=  '{{ST:email_already_in_use}} ';
		}elseif(!ValidateEmail($_POST['email'])){
			$errors = true;
			$error_msg .=  '{{ST:email_is_invalid}} ';
		}else{
			$values['email'] = Clean($_POST['email']);
			$format[] = "%s";
		}
	}else{
		$errors = true;
		$error_msg .= '{{ST:email_required}} ';
	}
	
	if(isset($_POST['name']) AND $_POST['name'] != ''){
		$layout->AddContentById('name', $_POST['name']);
		$values['name'] = Clean($_POST['name']);
		$format[] = "%s";
	}else{
		$values['name'] ='';
		$format[] = "%s";
	}
	
	$new_perms = array('can_manage_surveys'=>'n', 'can_manage_admins'=>'n');
	if(!isset($_POST['can_manage_survey']) AND !isset($_POST['can_manage_admins'])){
		$errors = true;
		$error_msg .= '{{ST:atleast_one_permission_required}} ';
	}else{
		if(isset($_POST['can_manage_survey'])){
			$new_perms['can_manage_surveys'] = 'y';
			$layout->AddContentById('can_manage_survey_state', 'checked="checked"');
		}
		if(isset($_POST['can_manage_admins'])){
			$new_perms['can_manage_admins'] = 'y';
			$layout->AddContentById('can_manage_admins_state', 'checked="checked"');
		}
	
	}
	$values['permissions'] = serialize($new_perms);
	$format[] = "%s";
	
	if(isset($_POST['deny_access'])){
		$values['status'] = 'banned';
		$format[] = "%s";
		$layout->AddContentById('deny_access_state', 'checked="checked"');
	}else{
		$values['status'] = 'active';
		$format[] = "%s";
	}
	
	if(!$errors){
		$db->update(TABLES_PREFIX . "admin", $values, array('id'=>$id), $format);
		$layout->AddContentById('alert', $layout->GetContent('alert'));
		$layout->AddContentById('alert_nature', ' alert-success');
		$layout->AddContentById('alert_heading', '{{ST:success}}!');
		$layout->AddContentById('alert_message', '{{ST:the_item_has_been_saved}}');
	}else{
		$layout->AddContentById('alert', $layout->GetContent('alert'));
		$layout->AddContentById('alert_nature', ' alert-error');
		$layout->AddContentById('alert_heading', '{{ST:error}}!');
		$layout->AddContentById('alert_message', $error_msg);
	}
}else{
	
	$layout->AddContentById('name', $admin->name);
	$layout->AddContentById('email', $admin->email);
	
	if($admin->status == 'banned'){
		$layout->AddContentById('deny_access_state', 'checked="checked"');
	}
	
	$permissions = unserialize($admin->permissions);
	if(is_array($permissions)){
		if($permissions['can_manage_surveys'] == 'y'){
			$layout->AddContentById('can_manage_survey_state', 'checked="checked"');
		}
		if($permissions['can_manage_admins'] == 'y'){
			$layout->AddContentById('can_manage_admins_state', 'checked="checked"');
		}
	}
}

$layout->RenderViewAndExit();
