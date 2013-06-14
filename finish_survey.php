<?php

require 'includes.php';

$layout = new Layout('html/','str/');
$layout->SetContentView('finish-survey');



$layout->AddContentById('current_year', date('Y'));
$layout->AddContentById('site_url', SITE_URL);




$layout->RenderViewAndExit();

