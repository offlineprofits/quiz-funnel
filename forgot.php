<?php

require 'includes.php';

if(IsLoggedIn()){
	Leave('index.php');
}

$layout = PublicPage('forgot', '{{ST:forgot_password}}');

if(isset($_POST['submit'])){
	if(isset($_POST['email'])){
		
		$user = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE email = '" . Clean($_POST['email']) . "' ORDER BY id DESC LIMIT 0,1");
		if($user){
			if($user->status == 'active'){
				$new_password = generate_password();
				$db->update(TABLES_PREFIX . "admin", array('password'=>encode_password($new_password)), array('id'=>intval($user->id)), array("%s"));
			
				$mail = new PHPMailerLite();
				$mail->IsMail();
				$mail->SetFrom(WEBMASTER_EMAIL, WEBMASTER_EMAIL);
			
				$email_body = new Layout('html/','str/');
				$email_body->SetContentView('forgot-email');
				$email_body->AddContentById('password', $new_password);
				$body = $email_body-> ReturnView();
			
				$user_name = '';
				if(isset($user->name))
					$user_name = $user->name;
				$mail->AddAddress($user->email, $user_name);
				$mail->Subject ="[" . $_SERVER['SERVER_NAME'] . "]".$tmpl_strings->Get('app_name')." - ".$tmpl_strings->Get('get_new_password');
				$mail->AltBody = $tmpl_strings->Get('your_new_password_is').':' . $new_password;
				$mail->MsgHTML($body);
				$mail->Send();
				
				$layout->AddContentById('alert', $layout->GetContent('alert'));
				$layout->AddContentById('alert_nature', ' alert-success');
				$layout->AddContentById('alert_heading', '{{ST:success}}!');
				$layout->AddContentById('alert_message', '{{ST:forgot_password_success_msg}}');
			
			
			}else{
				$layout->AddContentById('alert', $layout->GetContent('alert'));
				$layout->AddContentById('alert_nature', ' alert-error');
				$layout->AddContentById('alert_heading', '{{ST:error}}!');
				$layout->AddContentById('alert_message', '{{ST:access_denied_contact_admin}}');
			}
		}else{
			$layout->AddContentById('alert', $layout->GetContent('alert'));
			$layout->AddContentById('alert_nature', ' alert-error');
			$layout->AddContentById('alert_heading', '{{ST:error}}!');
			$layout->AddContentById('alert_message', '{{ST:the_info_is_not_correct}}');
		}
	}else{
		$layout->AddContentById('alert', $layout->GetContent('alert'));
		$layout->AddContentById('alert_nature', ' alert-error');
		$layout->AddContentById('alert_heading', '{{ST:error}}!');
		$layout->AddContentById('alert_message', '{{ST:the_info_is_not_correct}}');
	}
}else{
	$layout->AddContentById('alert', $layout->GetContent('alert'));
	$layout->AddContentById('alert_nature', ' alert-info');
	$layout->AddContentById('alert_heading', '{{ST:info}}:');
	$layout->AddContentById('alert_message', '{{ST:forgot_password_info}}');
}

$layout->RenderViewAndExit();
