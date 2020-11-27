<?php
include_once("config.php");
include_once("../includes/uniques.php");
if(isset($_POST)){

	if(isset($_POST['action'])){
		if($_POST['action']=="register"){

			$userid = "ST".get_rand_numbers(3)."-".get_rand_numbers(3)."-".get_rand_numbers(3);
			$csrf_token = clean_text($_POST['token']);

			//============= check csrf token validity =========
			if(!check_csrf_token($csrf_token)){
				echo show_msg("Token Mismatch!! Please try again.");
				exit;
			}

			//============ check dataset is empty or not ============
			if(empty($_POST['email']) || empty($_POST['mobile']) || empty($_POST['firstname'])|| empty($_POST['lastname']) || empty($_POST['password'])){
				echo show_msg("All Fields are required");
				exit;
			}

			//=============== email validation ===============
			$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo show_msg("Invalid Email Address");
				exit;
			}

			// ============== mobile number validation ============
			if(strlen($_POST['mobile'])<10){
				echo show_msg("Invalid Mobile Number");
				exit;
			}

			//============= user data ================
			$email 	= convert_string('encrypt',clean_text($_POST['email']));
			$mobile = convert_string('encrypt', clean_text($_POST['mobile']));
			$firstname = convert_string('encrypt', clean_text($_POST['firstname']));
			$lastname = convert_string('encrypt', clean_text($_POST['lastname']));
			$password = password_hash(clean_text($_POST['password']),PASSWORD_BCRYPT,["cost"=>8]);
			$active = 1;

			//================ password matching ================= 
			if($_POST['password'] !== $_POST['cnfpassword']){
				echo show_msg("Password Not Matched!!");
				exit;
			}

			//================= check user already exist or not =============
			if(check_user_exist($userid) || check_user_exist($email) || check_user_exist($mobile)){
				echo show_msg("User Already Exist!!");
				exit;
			}

			//============= insert data query ===================
			$query = $conn->prepare("INSERT INTO tbl_users (userid, first_name, last_name, email, mobile, password, active) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$query->bind_param("ssssssi",$userid,$firstname,$lastname,$email,$mobile,$password,$active);
			if($query->execute()){
				echo show_msg("Successfully Registered!!", true);
			}
			else{
				echo show_msg("Something went wrong!!");
			}
			$query->close();
		}
	}
}



?>