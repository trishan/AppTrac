<?php

$r = array(
	"action" => "check_authentication",
	"time" => date("r"),
	"authenticated" => true
);

echo json_encode($r);

?>
