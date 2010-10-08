<?php

/**
* Controller
*/

// The base URL of the web app, relative to the hostname.
// This is used in redirects and links.
$base = "/~aalcorn/litlab";
$path = trim(str_replace($base, "", $_SERVER["REDIRECT_URL"]), "/");

// For convenience, we import the request variables into the global scope.
// This means we have to be careful about using uninitialized variables.
extract($_REQUEST);

require("constants.php");
require("util.php"	);
require("dao.php"	);
require("smarty.php");
require("auth.php"	);

$dao = new dao();
$s = $_SESSION;

// This switch statement chooses between the various actions the user can select. Any page request is considered an action.

switch($path) {
	case "": 
		require_signin();
		
		$dao->connect();
		$students = $dao->get_students();
		
		$smarty->assign("students", $students);
		$smarty->display("home.tpl");
		break;
	
	case "signin":
		$smarty->display("signin.tpl");
		break;
	
	case "signup": 
		$smarty->display("signup.tpl");
		break;
	
	// This action displays a list of reports available for a specific student (hours, Lexia progress, etc.)
	case "student-reports-lander":
		require_signin();
		$dao->connect();
		
		$student = $dao->get_student_by_id($student_id);
		$smarty->assign("student", $student);
		$smarty->display("student-reports-lander.tpl");
		
		break;
	
	case "activity":
		require_signin();
		$dao->connect();
		$activities = $dao->get_kiosk_activity();
		
		$smarty->assign("activities", $activities);
		$smarty->display("activity.tpl");
		
		break;
	
	// Reports hourly attendance for a student. Sessions less than an hour apart are grouped together into one.
	case "student-hours-report":
		require_signin();
		$dao->connect();
		$student = $dao->get_student_by_id($student_id);
		$session_times = $dao->get_session_times_by_student_id($student_id);
		$kiosk_times = $dao->get_kiosk_activity_by_user_id($student_id);
		
		
		$session_min_delta = SESSION_GROUPING_DURATION;
		
		$merged_sessions = array();
		
		foreach($session_times as $slot) {
			$begin_ts	= strtotime($slot["begin_datetime"]);
			$end_ts		= strtotime($slot["end_datetime"]);
			$total_secs = $end_ts - $begin_ts;
			$duration = hr_interval($total_secs);
			
			$slot["begin_ts"]	= $begin_ts;
			$slot["end_ts"]		= $end_ts;
			$slot["total_secs"]	= $total_secs;
			$slot["duration"]   = $duration;
			
			if(count($merged_sessions) > 0) {
				$last = end($merged_sessions);
				$last_end_ts = strtotime($last["end_datetime"]);
				
				$delta = abs($begin_ts - $last_end_ts);
				if($delta > $session_min_delta) {
					$merged_sessions[] = $slot;
				} else {
					$merged_sessions[count($merged_sessions) - 1]["end_datetime"] = $slot["end_datetime"];
				}
			} else {
				$merged_sessions[] = $slot;
			}
		}
		
		$total_time = 0;
		foreach($merged_sessions as $sess) {
			$total_time += $sess["total_secs"];
		}
		
		$avg_time = $total_time / count($merged_sessions);
		$avg_duration = hr_interval($avg_time);
		
		$smarty->assign("student", $student);
		$smarty->assign("session_times", $merged_sessions);
		$smarty->assign("avg_duration", $avg_duration);
		$smarty->display("student-times.tpl");
		
		break;
	
	case "lab-reports":
		$smarty->display("lab-reports.tpl");
		break;
		
	// Lexia progress report.
	case "student-lexia-report":
		require_signin();
		
		$dao->connect();
		$student = $dao->get_student_by_id($student_id);
		
		if(!$student) {
			die("No such student.");
		}
		
		$sessions = $dao->lexia_get_sessions_by_student_id($student_id);
		
		// Each student session is broken down into small pieces in the database. Here we put them together and extract information such as scoring.
		// The format of the data is somewhat inconsistent.
		foreach($sessions as $k1 => $s1) {
			$scores =
			$datapts = array();
			foreach($s1 as $k2 => $s2) {
				if(isset($s2["Accuracy"])) {
					$sessions[$k1][$k2]["Accuracy"] = round($s2["Accuracy"], 1);
					$datapts[] = round($s2["Accuracy"]);
				}
				
				if(isset($s2["a"])) {
					$sessions[$k1][$k2]["Accuracy"] = round($s2["a"], 1);
					$datapts[] = round($s2["a"]);	
				}
				
				$scores = array_merge($scores, $s2["scores"]);
				
				if(isset($s2["complete"]))
					$sessions[$k1][$k2]["complete"] = round($s2["complete"], 0);
				if(isset($s2["practiceLevel"]))
					$sessions[$k1][$k2]["practiceLevel"] = round($s2["practiceLevel"], 0);
				if(isset($s2["practiceData"]))
					$sessions[$k1][$k2]["practiceData"] = round($s2["practiceData"], 0);
				$sessions[$k1]["session_start_time"] = strtotime($s2["begin_datetime"]);
				$sessions[$k1]["session_end_time"] = strtotime($s2["end_datetime"]);
				
				if(!isset($s2["Accuracy"]) && !isset($s2["a"])) {
					$sessions[$k1][$k2]["Accuracy"] = $s2["Performance_Score"];
				}
			}
			
			$datapts_str = implode(",", $scores);
			$sessions[$k1]["datapts"] = $datapts_str;
			$charts_image_url = "http://chart.apis.google.com/chart?chs=320x200&chco=76A4FB&&cht=ls&chd=t:$datapts_str&chxt=y";
			$charts_json_url = "$charts_image_url&chof=json";
			$charts_json = file_get_contents($charts_json_url);
			$charts_map = json_decode($charts_json, true);
		}
		
		$smarty->assign("student", $student);
		$smarty->assign("sessions", $sessions);
		$smarty->display("student-report.tpl");
		break;
	
	case "signin-process":
		$dao->connect();
		if(signin($username, $password)) {
			header("Location: $base/");
		} else {
			$smarty->assign("error_message", "Invalid username or password.");
			$smarty->display("signin.tpl");
		}
		break; 
	
	case "signout":
		session_destroy();
		header("Location: $base/");
		break;
	
	case "intake":
		require_signin();
		
		$smarty->display("intake.tpl");
		
		break;
	
	case "intake-process":
		require_signin();
		$dao->connect();

		if(nonempty_alphanumeric($fname));
		
		break;
		
	// No matching action
	default:
		$smarty->display("404.tpl");
		break;
}

?>

