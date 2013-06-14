<?php

require 'db_install.php';
require_once 'php/functions.php';

$db = new Db;

if(count($db->get_results("SELECT * FROM " . TABLES_PREFIX . "admin" )) == 0){

	$values = array();
	$format = array();

	$values['email'] = WEBMASTER_EMAIL;
	$format[] = "%s";
	$values['name'] = 'Super Admin';
	$format[] = "%s";
	$values['permissions'] = serialize(array('can_manage_surveys'=>'y', 'can_manage_admins'=>'y'));
	$format[] = "%s";
	$values['password'] = encode_password('admin');
	$format[] = "%s";
	$values['added_on'] = date('Y-m-d H:i:s');
	$format[] = "%s";
	$values['last_seen'] = date('Y-m-d H:i:s');
	$format[] = "%s";
	$values['status'] = 'active';
	$format[] = "%s";

	$db->insert(TABLES_PREFIX . "admin", $values, $format);

}

echo 'Done';
