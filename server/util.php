<?php

define(SECOND, 1);
define(MINUTE, 60 * SECOND);
define(HOUR, 60 * MINUTE);
define(DAY, 24 * HOUR);
define(WEEK, 7 * DAY);

function hr_interval($secs) {
	$result = array();
	if($secs >= WEEK) {
		$result["weeks"] = floor($secs/WEEK);
		$secs %= WEEK;
	}
	if($secs >= DAY) {
		$result["days"] = floor($secs/DAY);
		$secs %= DAY;
	}
	if($secs >= HOUR) {
		$result["hour"] = floor($secs/HOUR);
		$secs %= HOUR;
	}
	if($secs >= MINUTE) {
		$result["minute"] = floor($secs/MINUTE);
		$secs %= MINUTE;
		$result["second"] = $secs;
	}
	$s = array();
	foreach($result as $key => $val) {
		if($val > 0)
			$s[] = "$val $key". (($val > 1)? "s":""); 
	}
	
	if(count($s) < 1) // 0 seconds
		$s[] = "0 seconds";
	
	$interval_string = implode(", ", $s);
	
	return $interval_string;
}

function nonempty_alphanumeric($s) {
	$allowed = "abcdefghijklmnopqrstuvwxyz_123456789.0";
	if(($l = strlen($s)) < 1)
		return false;
	for($n=0; $n<$l; $n++)
		if(!stristr($allowed, $s[$n])) return false;
	return true;
}

function error_msg($msg) {
	global $error_msgs;
	$error_msgs[] = $msg;
}

function die_errors() {
	global $error_msgs;
	
	if(count($error_msgs) > 0) {
		echo "<div>There " .((count($error_msgs)>1)?
											"were problems":	//plural
											"was a problem").	//singular
			" processing your request:<div>";
		
		foreach($error_msgs as $msg) {
			echo <<< END
<div class="error" style="color: red; font-weight: bold">$msg</div>
END;
		}
		
		echo <<< END
<div>Please <a href="#" onclick="history.back(-1)">go back to the previous page</a>, correct these problems, and try again.</div>
END;
		die();
	}
}

function app_table(&$dao) {
	$apps = $dao->list_all_apps();
	$tmp = array();
	foreach($apps as $app)
		$tmp[$app["id"]] = $app;
	return $tmp;
}

?>