<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once 'php/config.php';
require_once 'php/db.php';
require_once 'php/string.php';
require_once 'php/layout.php';
require_once 'php/class.phpmailer.php';
require_once 'php/functions.php';
require_once 'php/analyticstracking.php';
$db = new Db;
$tmpl_strings = new StringResource('str/');
