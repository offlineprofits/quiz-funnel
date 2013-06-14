<?php

function getNormalizedFILES(){
	$newfiles = array();
	if(isset($_FILES)){
		foreach($_FILES as $fieldname => $fieldvalue){
			foreach($fieldvalue as $paramname => $paramvalue){
				foreach((array)$paramvalue as $index => $value){
					$newfiles[$fieldname][$index][$paramname] = $value;
				}
			}
		}
	}
	return $newfiles;
} 

function array_to_CSV($data){
	$outstream = fopen("php://temp", 'r+');
	fputcsv($outstream, $data, ',', '"');
	rewind($outstream);
	$csv = fgets($outstream);
	fclose($outstream);
	return $csv;
}

function Percenter($value, $total){
	if($total == 0){
		return 0;
	}else{
		return round(($value/$total) * 100);
	}
}

function Clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

function CleanToSerialize($str) {
	$str = str_replace('"', '&#34;',$str);
	$str = str_replace("'", "&#39;", $str);
	return Clean($str);
}

function Slug($str){
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
	return $str;
}

function PrivatePage($content_html_file = '', $title = ''){
	$layout = new Layout('html/','str/');
	$layout->SetContentView('private-base');
	$layout->AddContentById('content', $layout->GetContent($content_html_file));
	$layout->AddContentById('title', $title);
	$layout->AddContentById('current_year', date('Y'));
	if(isset($_SESSION['surveyengine_admin_logged_in']) AND $_SESSION['surveyengine_admin_logged_in'] == true){
		$layout->AddContentById('right_menu', '<li {{ID:menu_profile_active}}><a href="profile.php">{{ST:change_your_details}}</a></li><li><a href="signout.php">{{ST:signout}}</a></li>');
	}else{
		$layout->AddContentById('right_menu', '<li><a href="signin.php">{{ST:signin}}</a></li><li><a href="forgot.php">{{ST:forgot_password}}</a></li>');
	}
	
	if($content_html_file == 'view' OR $content_html_file == 'home' OR $content_html_file == 'survey-edit-main' OR $content_html_file == 'questions'  OR $content_html_file == 'question'){
		$layout->AddContentById('menu_home_active', 'class="active"');
	}elseif($content_html_file == 'admin' OR $content_html_file == 'admins'){
		$layout->AddContentById('menu_admins_active', 'class="active"');
	}elseif($content_html_file == 'profile'){
		$layout->AddContentById('menu_profile_active', 'class="active"');
	}
	
	return $layout;
}

function PublicPage($content_html_file = '', $title = ''){
	$layout = new Layout('html/','str/');
	$layout->SetContentView('public-base');
	$layout->AddContentById('content', $layout->GetContent($content_html_file));
	$layout->AddContentById('title', $title);
	$layout->AddContentById('current_year', date('Y'));
	
	if($content_html_file == 'signin'){
		$layout->AddContentById('signin_menu_active', 'class="active"');
	}elseif($content_html_file == 'forgot'){
		$layout->AddContentById('forgot_menu_active', 'class="active"');
	}
	
	
	return $layout;
}

function Paginate($url, $page, $total_pages, $already_has_query_str = false, $adjacents = 3) {
	
	$prevlabel = "&larr;";
	$nextlabel = "&rarr;";
	
	if($already_has_query_str == true){
		$start_with = '&';
	}else{
		$start_with = '?';
	}
	
	$out = '<div class="pagination"><ul>';
	
	// previous
	if($page == 1){
		$out.= '<li class="disabled"><a href="#">&larr;</a></li>';
	}else {
		$out.= '<li><a href="' . $url . $start_with . 'page=' . ($page-1) . '">&larr;</a></li>';
	}
	
	// first
	if($page > ($adjacents + 1)) {
		$out.= '<li><a href="' . $url . $start_with . 'page=' . 1 . '">1</a></li>';
	}
	
	// interval
	if($page > ($adjacents + 2)) {
		$out.= '<li class="disabled"><a href="#">...</a></li>';
	}
	
	// pages
	$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
	$pmax = ($page < ($total_pages - $adjacents)) ? ($page + $adjacents) : $total_pages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= '<li class="disabled"><a href="#">' . $i . '</a></li>';
			
		}else{
			$out.= '<li><a href="' . $url . $start_with . 'page=' . $i . '">' . $i . '</a></li>';
		}
	}
	
	// interval
	if($page<($total_pages-$adjacents-1)) {
		$out.= '<li class="disabled"><a href="#">...</a></li>';
	}
	
	// last
	if($page<($total_pages-$adjacents)) {
		$out.= '<li><a href="' . $url . $start_with . 'page=' . $total_pages . '">' . $total_pages . '</a></li>';
	}
	
	// next
	if($page<$total_pages) {
		$out.= '<li><a href="' . $url . $start_with . 'page=' . ($page+1) . '">&rarr;</a></li>';
	}
	else {
		$out.= '<li class="disabled"><a href="#">&rarr;</a></li>';
	}
	
	$out.= '</ul></div>';
	
	return $out;
}

function ValidateEmail($email){
   	if (preg_match("/[\\000-\\037]/",$email)) {
      		return false;
   	}
   	$pattern = "/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD";
   	if(!preg_match($pattern, $email)){
      		return false;
   	}
   	return true;
}

function encode_password($password){
	$salt = 'hl09523K0H@NA+PHP_7hE-SW!FtFZl8pdwwa84';
	$_pass = str_split($password);
	foreach ($_pass as $_hashpass){
		$salt .= md5($_hashpass);
	}
	return md5($salt);
}

function generate_password($len = 12){
	$pool = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#.-_,$%&+=@^*!';
	$str = '';
	for ($i = 0; $i < $len; $i++){
		$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
	}
	return $str;
}

function TrimText($input, $length) {
    $input = strip_tags($input);
    if (strlen($input) <= $length) {
        return $input;
    }
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    $trimmed_text .= '&hellip;';
  
    return $trimmed_text;
}

function Leave($url){
	header("Location: $url");
	exit;
}

function is_image_file($name){
	$img_extensions = 'gif|png|jpg|jpeg|jpe';
	return valid_file_extension($name, $img_extensions);
}

function valid_file_extension($name, $allowed_extensions){
	$allowed_extensions = explode('|', $allowed_extensions);
	$extension = strtolower(get_extension($name));
	if(in_array($extension, $allowed_extensions, TRUE)){
		return true;
	}else{
		return false;
	}	
	return true;
}
	
function get_extension($filename){
	$x = explode('.', $filename);
	return end($x);
}
	
function clean_file_name($filename){
	$invalid = array("<!--","-->","'","<",">",'"','&','$','=',';','?','/',"%20","%22","%3c","%253c","%3e","%0e","%28","%29","%2528","%26","%24","%3f","%3b", "%3d");		
	$filename = str_replace($invalid, '', $filename);
	$filename = preg_replace("/\s+/", "_", $filename);
	return stripslashes($filename);
}
	
function set_filename($path, $filename){
	$file_ext = get_extension($filename);
	if ( ! file_exists($path.$filename)){
		return $filename;
	}
	$new_filename = str_replace('.'.$file_ext, '', $filename);
	for ($i = 1; $i < 300; $i++){			
		if ( ! file_exists($path.$new_filename.'_'.$i.'.'.$file_ext)){
			$new_filename .= '_'.$i.'.'.$file_ext;
			break;
		}
	}
	return $new_filename;
}

function UploadError($code){
	$response = '';	
	switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $response = '{{ST:UPLOAD_ERR_INI_SIZE}}';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $response = '{{ST:UPLOAD_ERR_FORM_SIZE}}';
            break;
        case UPLOAD_ERR_PARTIAL:
            $response = '{{ST:UPLOAD_ERR_PARTIAL}}';
            break;
        case UPLOAD_ERR_NO_FILE:
            $response = '{{ST:UPLOAD_ERR_NO_FILE}}';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $response = '{{ST:UPLOAD_ERR_NO_TMP_DIR}}';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $response = '{{ST:UPLOAD_ERR_CANT_WRITE}}';
            break;
        case UPLOAD_ERR_EXTENSION:
            $response = '{{ST:UPLOAD_ERR_EXTENSION}}';
            break;
        default:
            $response = '{{ST:Unknown_error_file_error}}';
            break;
    }
 
    return $response;
}

function SaveMeta($id, $meta){
	$db = new Db;
	$meta['quiz_id'] = $id;
	if($meta['meta_value'] == null){
		$db->query("DELETE FROM " . TABLES_PREFIX . "quizmeta WHERE quiz_id = " . $id . " AND meta_key = '" . $meta['meta_key'] . "'");
	}else{
		$search = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "quizmeta WHERE quiz_id = " . $id . " AND meta_key = '" . $meta['meta_key'] . "' ORDER BY id DESC LIMIT 0,1");
		if($search){
			$db->update(TABLES_PREFIX . "quizmeta", $meta, array('id'=>intval($search->id)), array("%s","%s","%d"));
		}else{
			$db->insert(TABLES_PREFIX . "quizmeta", $meta, array("%s","%s","%d"));
		}
	} 
}

function GetMeta($id, $key){
	$db = new Db;
	return $db->get_var("SELECT meta_value FROM " . TABLES_PREFIX . "quizmeta WHERE quiz_id = " . $id . " AND meta_key = '" . $key . "' ORDER BY id DESC LIMIT 0,1");
}

function NiceNumber($n) {
	$n = (0+str_replace(",","",$n));
	if(!is_numeric($n)) return false;
	if($n>1000000000000) return round(($n/1000000000000),1).'Tri';
	else if($n>1000000000) return round(($n/1000000000),1).' Bil';
	else if($n>1000000) return round(($n/1000000),1).'Mil';
	else if($n>1000) return round(($n/1000),1).'K';
	return number_format($n);
}

function IsLoggedIn(){
	if(isset($_SESSION['surveyengine_admin_logged_in']) AND $_SESSION['surveyengine_admin_logged_in'] == true){
		return true;
	}else{
		if(isset($_COOKIE[COOKIE_NAME])) {
			parse_str($_COOKIE[COOKIE_NAME]);
			$db = new Db;
			
			
			$user_details = array('email'=>Clean($email),'hash'=>Clean($hash));

			$user = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE email = '" . $user_details['email'] . "' ORDER BY id DESC LIMIT 0,1");
			if($user AND ($user->password == $user_details['hash'])){
				if($user->status == 'active'){
					$now = time();
			
					$db->update(TABLES_PREFIX . "admin", array('last_seen'=>$now, array('id'=>intval($user->id))), array("%d"));
			
			
					$_SESSION['surveyengine_admin_logged_in'] = true;
					$_SESSION['surveyengine_admin_user_id'] = $user->id;
			
		
					setcookie(COOKIE_NAME, 'email='.$user->username.'&hash='.$user->password, time() + COOKIE_TIME);
		
					return true;
			
				}
			}
		}
		
		return false;
	}
}

function AdminCanManageSurvey(){
	if(!IsLoggedIn()){
		return false;
	}
	
	$db = new Db;
	
	$user = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE id = '" . intval($_SESSION['surveyengine_admin_user_id']) . "' ORDER BY id DESC LIMIT 0,1");
	
	if(!$user){
		return false;
	}
	
	$permissions = unserialize($user->permissions);
	if(is_array($permissions)){
		if($permissions['can_manage_surveys'] == 'y'){
			return true;
		}
	}
	
	return false;
}

function AdminCanManageAdmins(){
	if(!IsLoggedIn()){
		return false;
	}
	
	$db = new Db;
	
	$user = $db->get_row("SELECT * FROM " . TABLES_PREFIX . "admin WHERE id = '" . intval($_SESSION['surveyengine_admin_user_id']) . "' ORDER BY id DESC LIMIT 0,1");
	
	if(!$user){
		return false;
	}
	
	$permissions = unserialize($user->permissions);
	if(is_array($permissions)){
		if($permissions['can_manage_admins'] == 'y'){
			return true;
		}
	}
	
	return false;
}
