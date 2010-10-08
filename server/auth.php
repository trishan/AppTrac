<?php

/**
* Authentication functions
*/

// Start a session with a unique session name, so we won't share session data with any other PHP apps on the same domain.
session_name("hpl_reporting");
session_start();

$s = $_SESSION;

if($s["signed_in"]) {
	$smarty->assign("signed_in", true);
	$smarty->assign("session", $_SESSION);
} else {
	$smarty->assign("signed_in", false);
}

function signin($username, $password) {
	global $dao;
	if(($result = $dao->check_signin($username, $password))) {
		$_SESSION["signed_in"] = true;
		$_SESSION["user"] = $result;
		return true;
	} else {
		return false;
	}
}

// If this function is called at the start of an action in the controller, it will ensure users can only access that action if they are signed in.
// This applies to most or all of the actions for the LLRS.
function require_signin() {
	global $smarty;
	if(!$_SESSION["signed_in"]) {
		$smarty->assign("error_message", "Please sign in.");
		$smarty->display("signin.tpl");
		exit();
	}
}

?>
