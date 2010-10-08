<?php

require_once("Smarty-2.6.26/libs/Smarty.class.php");
$smarty = new Smarty();

$wwwroot = "/home/aalcorn/www/litlab";

$smarty->template_dir = "$wwwroot/templates";
$smarty->compile_dir  = "$wwwroot/cache/compile";
$smarty->cache_dir    = "$wwwroot/cache";

$smarty->assign("request", $_REQUEST);

?>
