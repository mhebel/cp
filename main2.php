<?php
require_once("./includes/config.php");

$debug = TRUE;


function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}

$cp_main = new design();
$cp_main->toolbar = 1;
$cp_main->site_header();
$cp_main->site_left();
$cp_main->site_left_end();
$cp_main->site_middle("Main Menu");
$cp_main->site_footer();
$cp_main->site_end();
?>