<?php

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

if(isset($_POST['signup-submit'])) {
    require_once __DIR__.'/../controller/userController.php';
    
    $fullname = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['ufull']);
	$username = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['uid']);
    $email = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['mail']);
    $phone = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['uphone']);
	$password = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['pwd']);
    $passwordRepeat = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['pwdrepeat']);
    
    $userController = new UserController();
    $registerDate = date('Y-m-d H:i:s');
	
	/*error handlers */

	if(empty($fullname) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($passwordRepeat) ) {
		header("Location: ../view/signUp.php?error=emptyfields&fullname=".$fullname."&uid=".$username."&mail=".$email."&phone=".$phone);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../view/signUp.php?error=invalidmailuid");
		exit();
	}
	//check for invalid email
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../view/signUp.php?error=invalidmail&uid=".$username);
		exit();
	}
	//check for invalid username
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../view/signUp.php?error=invaliduid&mail=".$email);
		exit();
	}
	//are the two password fields matching
	else if($password !== $passwordRepeat) {
		header("Location: ../view/signUp.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else {
		//does the chosen username already exist
		$resultCheck = $userController->checkUsername($username);
		if(!empty($resultCheck)) {
			header("Location: ../view/signUp.php?error=usertaken&mail=".$email);
			exit();
		} else {
            //insert
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            //send values by reference because call_user_func_array expects it
            $values = array(&$fullname, &$username, &$hashedPwd, &$email, &$phone, &$registerDate);
            $userController->insertUser($values);
            header("Location: ../public/loginUser.php?signup=success");
            exit();
		}
	}
		
} else {
	header("Location: ../view/signUp.php");
	exit();
}
