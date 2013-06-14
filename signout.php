<?php
session_start();
//error_reporting(E_ALL ^ E_NOTICE);

require_once 'php/config.php';

unset($_SESSION['surveyengine_admin_logged_in']);
unset($_SESSION['surveyengine_admin_user_id']);

setcookie (COOKIE_NAME, "", time() - 3600);

header('Location: signin.php');
exit();
