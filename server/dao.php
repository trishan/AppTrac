<?php

class dao {
	function dao() {

	}

	function connect() {
		$hostname = "localhost";
		$username = "litlab";
		$password = "Bn3mAStaxK3YeQpu";
		$dbname = "litlab_stage";
		try {
			$this->db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
		} catch(PDOException $e) {
			die("There was an error connecting to the database.");
		}
	}
	
	function check_signin($username, $password) {
		$stmt = $this->db->prepare("
			select username, password
			from reporting_user
			where username = :username
			and password = unhex(sha1(:password))
		");
		$stmt->bindValue(":username", $username);
		$stmt->bindValue(":password", $password);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	function get_students() {
		$stmt = $this->db->prepare("
			select *
			from student
			order by Last_Name asc
		");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function get_student_by_id($student_id) {
		$stmt = $this->db->prepare("
			select *
			from student
			where Student_ID = :student_id
		");
		$stmt->bindValue(":student_id", $student_id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	function lexia_get_session_ids_by_student_id($student_id) {
		$stmt = $this->db->prepare("
			select Session_ID
			from student_session
			where Student_ID = :student_id
			group by Session_ID
		");
		$stmt->bindValue(":student_id", $student_id);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
	
	function lexia_get_session_by_id($session_id) {
		// session scores seem to be stored using the following labels:
		// Accuracy
		// a (alias for accuracy?)
		// i
		// b (b, d, p exercise)
		// d
		// p
		// each session seems to end with a practiceData label
		
		$score_labels = array("Accuracy", "A", "i", "b", "d", "p");
		$non_score_labels = array("complete", "practiceLevel", "practiceData");
	
		$stmt = $this->db->prepare("
			select *
			from student_session_tmp1
			where Session_ID = :session_id
		");
		$stmt->bindValue(":session_id", $session_id);
		$stmt->execute();
		
		$n = 0;
		$session = array();
		while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
			extract($row);
			
			if(strlen(trim($row["extra2"])) > 0) {
				
				$row["extra2"] = trim($row["extra2"]);
				//if(in_array(trim($row["extra2"]), $score_labels)) {
				if(!in_array($row["extra2"], $non_score_labels) && strlen($row["extra2"]) > 0) {
					if(!isset($session[$n]["scores"]))
						$session[$n]["scores"] = array();
					$session[$n]["scores"][trim($row["extra2"])] = $extra3;
				}
			
				if(!$session[$n]) $session[$n] = array();
				if(strlen(trim($row["extra2"]))>0)
					$session[$n] = array_merge($session[$n], $row);
			
		    		if(strstr($extra2, "Accuracy"))
		    			$session[$n]["Accuracy"] = $extra3;
		    		if($extra2 == "a")
		    			$session[$n]["Accuracy"] = $extra3;
		    		if($extra2 == "b")
		    			$session[$n]["Accuracy"] = $extra3;
		    		if(strstr($extra2, "complete"))
		    			$session[$n]["complete"] = $extra3;
		    		if(strstr($extra2, "practiceLevel"))
		    			$session[$n]["practiceLevel"] = $extra3;
		    		if(strstr($extra2, "practiceData"))
		    			$session[$n]["practiceData"] = $extra3;
					if($extra2 == "practiceData")
		    			$n++;
			}
		}
		return $session;
	}
	
	function lexia_get_sessions_by_student_id($student_id) {
		$session_ids = $this->lexia_get_session_ids_by_student_id($student_id);
		$sessions = array();
		foreach($session_ids as $sid) {
			//echo "getting session ". $sid["Session_ID"];
			$session = $this->lexia_get_session_by_id($sid["Session_ID"]);
			$sessions[$session[0]["Session_ID"]] = $session;
		}
		return $sessions;
	}
	
	function get_kiosk_activity($date = null) {
		if($date == null) {
			$where = "";
		} else {
			if(is_int($date)) {
				$timestamp = strtotime($date);
			} else {
				$timestamp = $date;
			}
			
			$where = "WHERE time >= FROM_UNIXTIME(':start_time')";
		}
		$stmt = $this->db->prepare("
			select
				kiosk_activity.time time,
				kiosk_activity.user_id,
				kiosk_activity.action,
				kiosk_activity.extra,
				student_user.name
			from student_user
			join kiosk_activity
			on (student_user.id = kiosk_activity.student_id)
			order by time desc
		 ". $where);
		$stmt->bindValue(":student_id", $student_id);
		if($date != null) {
			$stmt->bindValue(":start_time", $timestamp);
		}
		$stmt->execute();
		
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function get_kiosk_activity_by_user_id() {
		$stmt = $this->db->prepare("
			select
				kiosk_activity.time,
				kiosk_activity.user_id,
				kiosk_activity.action,
				kiosk_activity.extra,
				student_user.name
				
			from student_user
			join kiosk_activity
			on (student_user.id = kiosk_activity.user_id)
			where kiosk_activity.user_id = :user_id
			order by time desc
		");
		$stmt->bindValue(":user_id", $user_id);
		$stmt->execute();
		
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	function get_session_times_by_student_id($student_id) {
		$stmt = $this->db->prepare("
			select distinct Session_ID, Student_ID, begin_datetime, end_datetime
			from student_session_tmp1
			where Student_ID = :student_id
			order by begin_datetime desc
		");
		$stmt->bindValue(":student_id", $student_id);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function add_intake_user($user) {
		list($username, $fname, $lname, $password, $apps) = $user;
		if(!$stmt = $this->db->prepare("
			insert into student_user
			(username, fname, lname, password, assigned_apps)
			values
			(:username, :fname, :lname, :password, :apps)
		")) return false;
		
		$apps = join(",", $apps);
		
		$stmt->bindValue(":username", $username);
		$stmt->bindValue(":fname", $fname);
		$stmt->bindValue(":lname", $lname);
		$stmt->bindValue(":password", $password);
		$stmt->bindValue(":apps", $apps);
		
		return $stmt->execute();
	}
	
	function update_user($user) {
		list($username, $fname, $lname, $password, $apps) = $user;
		if(!$stmt = $this->db->prepare("
			update student_user
			set fname = :fname,
			lname = :lname, 
			password = :password,
			assigned_apps = :assigned_apps
			where username = :username
		")) return false;
		
		$apps = join(",", $apps);
		
		$stmt->bindValue(":username", $username);
		$stmt->bindValue(":fname", $fname);
		$stmt->bindValue(":lname", $lname);
		$stmt->bindValue(":password", $password);
		$stmt->bindValue(":assigned_apps", $apps);
		
		return $stmt->execute();
	}
	
	function delete_user($username) {
		$stmt = $this->db->prepare("
			delete from student_user
			where username = :username
		");
		$stmt->bindValue(":username", $username);
		return $stmt->execute();
	}
	
	function get_student_user_by_username($username) {
		$stmt = $this->db->prepare("
			select username, fname, lname, password, assigned_apps
			from student_user
			where username = :username
		");
		$stmt->bindValue(":username", $username);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		$user["apps"] = explode(",", $user["assigned_apps"]);
		
		return $user;
	}
	
	function list_all_apps() {
		$stmt = $this->db->prepare("
			select id, name, intake_checked_default
			from app
		");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>
