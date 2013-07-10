<?php

require 'includes.php';

if(!IsLoggedIn()){
	Leave('signin.php');
}

$layout = PrivatePage('profile', '{{ST:profile}}');

if(isset($_SESSION['surveyengine_admin_user_id'])){
	$id = intval($_SESSION['surveyengine_admin_user_id']);
}else{
	Leave('index.php');
}

$admin = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE id = $id ORDER BY id DESC LIMIT 0,1");

$layout->AddContentById('id', $admin->id);

if(isset($_POST['submit'])){
	
	$errors = false;
	$values = array();
	$format = array();
	$error_msg = '';
	
	if(isset($_POST['opassword']) AND $_POST['opassword'] != ''){
		$check_pass = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE id = " . $id . " ORDER BY id DESC LIMIT 0,1");
		if(!$check_pass OR $check_pass->password != encode_password($_POST['opassword'])){
			$errors = true;
			$error_msg .=  '{{ST:current_password_not_correct}} ';
		}
	}else{
		$errors = true;
		$error_msg .= '{{ST:current_password_required}} ';
	}
	
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
			$format = "%s";
		}
	}else{
		$errors = true;
		$error_msg .= '{{ST:email_required}} ';
	}
	
	if(isset($_POST['name']) AND $_POST['name'] != ''){
		$layout->AddContentById('name', $_POST['name']);
		$values['name'] = Clean($_POST['name']);
		$format = "%s";
	}else{
		$values['name'] ='';
		$format = "%s";
	}

	if(isset($_POST['password']) AND $_POST['password'] != ''){
		if($_POST['password'] != $_POST['cpassword']){
			$errors = true;
			$error_msg .= '{{ST:password_not_confirmed}} ';
		}else{
			$values['password'] = encode_password($_POST['password']);
			$format = "%s";
		}
	}
	if(isset($_POST['sitename']) AND $_POST['sitename'] != ''){
		/*$xml = simplexml_load_file('str/strings.xml');
		foreach ($xml as $x ) {// print_r($x -> @attributes);
			//if($x[@attributes]->name == 'site_name') die();
			print_r($x);echo "<br />";
		};die();
		$xml->addChild('strings')->addChild('site_name', $_POST[sitename]);
		file_put_contents('foo.xml', $xml->asXML());*/
		$doc = new DOMDocument();
        $doc->load('str/strings.xml');
        $stringsgroup = $doc->getElementsByTagName("strings");
        foreach($stringsgroup as $group){
        	       
        	$pname = $group->getElementsByTagName("string");
			
			foreach($pname as $p) { 
	            $pcode = $p->getAttribute('name'); 
				
		            if($pcode=="site_name"){
		            	
		               // $pname->removeChild($pcode);
						//$pname->addChild($pcode);
						$p->nodeValue = $_POST['sitename'];
		            }
		   	}	
        }
    
        $doc->save('str/strings.xml');
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
}

$layout->RenderViewAndExit();
