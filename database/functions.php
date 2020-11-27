<?php
function clean_text($string)
{
	 global $conn;
	 $string = trim($string);
	 $string = stripslashes($string);
	 $string = htmlspecialchars($string);
	 $string = mysqli_real_escape_string($conn, $string);
	 return $string;
}

function convert_string($action,$string){
	$output = '';
	$encrypted_method = 'AES-256-CBC';
	$secret_value = base64_encode(md5("testpro"));
	$secret_key = $secret_value;
	$secret_iv = substr($secret_value, 0, 16);
	$key = hash('sha256',$secret_key);
	$ini_vector = substr(hash('sha256',$secret_iv),0,16);
	if($string !=''){
		if($action == 'encrypt'){
			$output = openssl_encrypt($string, $encrypted_method, $key, 0, $ini_vector);
			$output = base64_encode($output);
		}
		if($action == 'decrypt'){
			$output = base64_decode($string);
			$output = openssl_decrypt($output, $encrypted_method, $key, 0, $ini_vector);
		}
	}
	return $output;
}

function show_msg($msg, $status=false){
	if($status==false){
		$msg = "<div class='alert alert-dismissable bg-white text-danger' style='border:1px solid red;font-size:13px; border-left:10px solid red;'>
			<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			".$msg."
			</div>";
	}else{
		$msg = "<div class='alert alert-dismissable bg-white text-success' style='border:1px solid green;font-size:13px; border-left:10px solid green;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			".$msg."
			</div>";
	}
	return json_encode(array("msg"=>$msg, "status"=>$status));
}


function check_user_exist($data){
	global $conn;
	$query = "SELECT * FROM tbl_users WHERE userid=? OR email=? OR mobile=?";
	$RESULT = mysqli_prepare($conn,$query);
	mysqli_stmt_bind_param($RESULT,"sss",$data,$data,$data);
	mysqli_stmt_execute($RESULT);
	mysqli_stmt_store_result($RESULT);
	return mysqli_stmt_num_rows($RESULT)>0;
}

	// CHECK CSRF TOKEN
	function check_csrf_token($token)
	{
		return $token == $_SESSION['csrf_token'];
	}
	
	// csrf token
	function csrf_token(){
		$token = bin2hex(random_bytes(32));
		$_SESSION['csrf_token'] = $token;
		return $token;
	}









?>