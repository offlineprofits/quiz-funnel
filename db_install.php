<?php

require_once 'php/config.php';
require_once 'php/db.php';
require_once 'php/delta.php';

$sql = "CREATE TABLE " . TABLES_PREFIX . "survey (
id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
title text,
description longtext,
date_created timestamp NULL DEFAULT NULL,
status varchar(20) DEFAULT NULL,
email text NULL,
redirect_url text NULL,
daily_limit int NULL,
total_limit int NULL,
PRIMARY KEY  (id)
);";
delta($sql);

$sql = "CREATE TABLE " . TABLES_PREFIX . "question (
id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
survey_id bigint(20) unsigned NOT NULL,
question_type varchar(20) DEFAULT NULL,
question text,
choices longtext,
statistics longtext,
attachment text NULL,
is_required varchar(1) DEFAULT 'n',
PRIMARY KEY  (id)
);";
delta($sql);

$sql = "CREATE TABLE " . TABLES_PREFIX . "results (
id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
survey_id bigint(20) unsigned NOT NULL,
answers longtext,
date_taken timestamp NULL DEFAULT NULL,
ip_address text NULL,
PRIMARY KEY  (id)
);";
delta($sql);

$sql = "CREATE TABLE " . TABLES_PREFIX . "admin (
id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
name text,
email text,
password text,
added_on timestamp NULL DEFAULT NULL,
last_seen timestamp NULL DEFAULT NULL,
permissions text,
status varchar(20) DEFAULT NULL,
PRIMARY KEY  (id)
);";
delta($sql);

$sql = "CREATE TABLE ". TABLES_PREFIX ."survey_takers (
id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
first_name VARCHAR( 25 ) NOT NULL ,
last_name VARCHAR( 25 ) NOT NULL ,
email TEXT NOT NULL ,
category INT( 11 ) NOT NULL ,
survey_id INT( 11 ) NOT NULL
);";
delta($sql);
