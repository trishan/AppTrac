<?php
$conf = parse_ini_file("config.ini.php");

require_once("Smarty-2.6.26/libs/Smarty.class.php");
$smarty = new Smarty();

$wwwroot = $conf["wwwroot"];

$smarty->template_dir = "$wwwroot/templates";
$smarty->compile_dir  = "$wwwroot/cache/compile";
$smarty->cache_dir    = "$wwwroot/cache";

$smarty->assign("base", $base);
$smarty->assign("request", $_REQUEST);

?>
