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

$layout = PrivatePage('admins', '{{ST:administrators}}');


if(isset($_GET['page'])){
	$page = intval($_GET['page']);
}else{
	$page = 1;
}
$rows = ROWS_PER_PAGE;


if(isset($_POST['submit'])){
	
	$errors = false;
	$values = array();
	$format = array();
	$error_msg = '';
	
	if(isset($_POST['email']) AND $_POST['email'] != ''){
		$layout->AddContentById('email', $_POST['email']);
		$check_email = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE email = '" . Clean($_POST['email']) . "' ORDER BY id DESC LIMIT 0,1");
		if($check_email){
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
	}
	
	if(isset($_POST['email_password'])){
		$layout->AddContentById('email_password_state', 'checked="checked"');
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
	
	
	if(isset($_POST['password']) AND $_POST['password'] != ''){
		if($_POST['password'] != $_POST['cpassword']){
			$errors = true;
			$error_msg .= '{{ST:password_not_confirmed}} ';
		}else{
			$values['password'] = encode_password($_POST['password']);
			$format[] = "%s";
		}
	}else{
		$errors = true;
		$error_msg .= '{{ST:password_required}} ';
	}
	
	if(!$errors){
		$values['added_on'] = date('Y-m-d H:i:s');
		$format[] = "%s";
		$values['last_seen'] = date('Y-m-d H:i:s');
		$format[] = "%s";
		$values['status'] = 'active';
		$format[] = "%s";
		
		if($db->insert(TABLES_PREFIX . "admin", $values, $format)){
			if(isset($_POST['email_password'])){
				$mail = new PHPMailerLite();
				$mail->IsMail();
				$mail->SetFrom(WEBMASTER_EMAIL, WEBMASTER_EMAIL);
			
				$email_body = new Layout('html/','str/');
				$email_body->SetContentView('new-user-email');
				$email_body->AddContentById('password', Clean($_POST['password']));
				$email_body->AddContentById('email', Clean($_POST['email']));
				$body = $email_body-> ReturnView();
			
				$name = '';
				if(isset($_POST['name']))
					$name = $_POST['name'];
				$mail->AddAddress($_POST['email'], $name);
				$mail->Subject ="[" . $_SERVER['SERVER_NAME'] . "]".$tmpl_strings->Get('app_name')." - ".$tmpl_strings->Get('sign_in_details');
				$mail->AltBody = $tmpl_strings->Get('your_email_is').': ' . Clean($_POST['email']) . ' '.$tmpl_strings->Get('your_password_is').' :' . Clean($_POST['password']);
				$mail->MsgHTML($body);
				$mail->Send();
			}
			
			
			$layout->AddContentById('alert', $layout->GetContent('alert'));
			$layout->AddContentById('alert_nature', ' alert-success');
			$layout->AddContentById('alert_heading', '{{ST:success}}!');
			$layout->AddContentById('alert_message', '{{ST:the_admin_has_been_saved}}');
		}else{
			$layout->AddContentById('alert', $layout->GetContent('alert'));
			$layout->AddContentById('alert_nature', ' alert-error');
			$layout->AddContentById('alert_heading', '{{ST:error}}!');
			$layout->AddContentById('alert_message', '{{ST:unknow_error_try_again}}');
		}
	}else{
		$layout->AddContentById('alert', $layout->GetContent('alert'));
		$layout->AddContentById('alert_nature', ' alert-error');
		$layout->AddContentById('alert_heading', '{{ST:error}}!');
		$layout->AddContentById('alert_message', $error_msg);
	}
}


$offset = ($page - 1) * $rows;
$admins = $db->get_results("SELECT * FROM " . TABLES_PREFIX . "admin ORDER BY id DESC LIMIT $offset, $rows");
$number_of_records = count($db->get_results("SELECT * FROM " . TABLES_PREFIX . "admin" ));
$number_of_pages = ceil( $number_of_records / $rows );

$rows_html = '';
if($admins){
	foreach($admins as $admin){
		$row_layout = new Layout('html/','str/');
		$row_layout->SetContentView('admins-rows');
		$row_layout->AddContentById('id', $admin->id);
		$row_layout->AddContentById('name', $admin->name);
		$row_layout->AddContentById('email', $admin->email);
		
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
		$row_layout->AddContentById('permissions', $perm_html);
		
		$rows_html .= $row_layout-> ReturnView();
	}
	
	if(count($admins)>$rows){
		$pagination = Paginate('admins.php', $page, $number_of_pages, false, 3);
		$layout->AddContentById('pagination', $pagination);
	}
	
}else{
	$rows_html = '<tr><td colspan="3">{{ST:no_items}}</td></tr>';
}



$layout->AddContentById('rows', $rows_html);



$layout->RenderViewAndExit();
