<?php

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	
	function get_input(){
		global $connection;
	 
	    $query = "select SIFile ";
	    $query .= "from assignment ";
	    $query .= "where id=1;";
	    $link = mysqli_query($connection,$query);
	    confirm_query($link);
	    return $link;
	}
	function get_output(){
		global $connection;
	 
	    $query = "select SOFile ";
	    $query .= "from assignment ";
	    $query .= "where id=1;";
	    $link = mysqli_query($connection,$query);
	    confirm_query($link);
	    return $link;
	}

	
	function find_user_by_email($email) {
		global $connection;
		
		$email = mysqli_real_escape_string($connection, $email);

		$query  = "SELECT * ";
		$query .= "FROM signup ";
		$query .= "WHERE email = '{$email}' ";
		$query .= "LIMIT 1";
		$check_user = mysqli_query($connection, $query);
		confirm_query($check_user);
		if($result = mysqli_fetch_assoc($check_user)) {
			return false;
		} else {
			return true;
		}
	}

	function find_user_by_username($username) {
		global $connection;
		
		$username = mysqli_real_escape_string($connection, $username);

		$query  = "SELECT * ";
		$query .= "FROM signup ";
		$query .= "WHERE username = '{$username}' ";
		$query .= "LIMIT 1";
		$check_user = mysqli_query($connection, $query);
		confirm_query($check_user);
		if($result = mysqli_fetch_assoc($check_user)) {
			return false;  // this username is already exist 
		} else {
			return true;  //this username deos not exist
		}
	}

	function find_userdata_by_username($username) {
		global $connection;
		
		$username = mysqli_real_escape_string($connection, $username);

		$query  = "SELECT * ";
		$query .= "FROM signup ";
		$query .= "WHERE username = '{$username}' ";
		$query .= "LIMIT 1";
		$check_user = mysqli_query($connection, $query);
		confirm_query($check_user);
		
		$result = mysqli_fetch_assoc($check_user);
		return $result;
	}

	function find_password_by_email($email){
		global $connection;
		$correct_email = mysqli_real_escape_string($connection, $email);

		$query  = "SELECT * ";
		$query .= "FROM signup ";
		$query .= "WHERE email = '{$correct_email}' ";
		$query .= "LIMIT 1";
		$info_set = mysqli_query($connection, $query);
		confirm_query($info_set);
		if($result = mysqli_fetch_assoc($info_set)) {
			return $result;
		} else {
			return null;
		}

	}

	function getcourse_data_by_courseid($courseid){
        global $connection;
		$query  = "SELECT * ";
		$query .= "FROM courseinfo ";
		$query .= "WHERE courseId = '{$courseid}' ";
		$query .= "LIMIT 1";
		$check_query = mysqli_query($connection, $query);
		confirm_query($check_query);
                      
		$course_data = mysqli_fetch_assoc($check_query);
		return $course_data;
    }

    function getproject_data_by_projectid($projectid){
        global $connection;
		$query  = "SELECT * ";
		$query .= "FROM projectinfo ";
		$query .= "WHERE projectId = '{$projectid}' ";
		$query .= "LIMIT 1";
		$check_query = mysqli_query($connection, $query);
		confirm_query($check_query);
                      
		$project_data = mysqli_fetch_assoc($check_query);
		return $project_data;
    }

    function getquizdata_by_name($quiz_name,$courseid){
    	global $connection;
		$query  = "SELECT * ";
		$query .= "FROM quiz_mcq ";
		$query .= "WHERE (quiz_name = '{$quiz_name}' AND courseId='{$courseid}') ";
		$query .= "LIMIT 1";
		$check_query = mysqli_query($connection, $query);
		confirm_query($check_query);
                      
		$quiz_data = mysqli_fetch_assoc($check_query);
		return $quiz_data;

    }

    function getquizdata_fill_by_name($quiz_name,$courseid){
    	global $connection;
		$query  = "SELECT * ";
		$query .= "FROM quiz_fill ";
		$query .= "WHERE (quiz_name = '{$quiz_name}' AND courseId='{$courseid}') ";
		$query .= "LIMIT 1";
		$check_query = mysqli_query($connection, $query);
		confirm_query($check_query);
                      
		$quiz_data = mysqli_fetch_assoc($check_query);
		return $quiz_data;

    }


    // function find_coursedata_by_courseid($courseid){
    //               global $connection;
    //               $query  = "SELECT * ";
    //                   $query .= "FROM courseinfo ";
    //                   $query .= "WHERE courseId = '{$courseid}' ";
    //                   $query .= "LIMIT 1";
    //                   $check_query = mysqli_query($connection, $query);
    //                   confirm_query($check_query);
                      
    //                   $coursedata = mysqli_fetch_assoc($check_query);
    //                   return $coursedata;
    // }




	function find_password_by_username($username){
		global $connection;
		$correct_username = mysqli_real_escape_string($connection, $username);

		$query  = "SELECT * ";
		$query .= "FROM signup ";
		$query .= "WHERE username = '{$correct_username}' ";
		$query .= "LIMIT 1";
		$info_set = mysqli_query($connection, $query);
		confirm_query($info_set);
		if($result = mysqli_fetch_assoc($info_set)) {
			return $result;
		} else {
			return null;
		}

	}

	function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

?>
