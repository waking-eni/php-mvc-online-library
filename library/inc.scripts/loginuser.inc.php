<?php

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

if(isset($_POST['login-submit'])) {
    require_once __DIR__.'/../controller/userController.php';
	
	$mailuid = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['mailuid']);
    $password = str_replace(array(':', '-', '/', '*', '<', '>'), '', $_POST['pwd']);
    
    $userController = new UserController();
	
	if(empty($mailuid) || empty($password))  {
		header("Location: ../view/loginUser.php?error=emptyfields&mailuid=".$mailuid."&mail=".$email);
		exit();
	}
	else {
		$values = array(&$mailuid, &$mailuid);
		$result = $userController->checkLogin($values);
			if(!empty($result)) {
                foreach($result as $key => $value) {
                    $pwdCheck = password_verify($password, $value['password']);
                    if($pwdCheck == false) {
                        header("Location: ../view/loginUser.php?error=wrongpwd");
                        exit();
                    }
                    else if($pwdCheck == true) {
                        $_SESSION['userId'] = $value['id'];
                        $_SESSION['userUsername'] = $value['username'];
                        
                        header("Location: ../view/index.php?login=succes");
                        exit();
                    }
                }
			} else {
				header("Location: ../view/loginUser.php?error=nouser");
				exit();
			}
		}
	}

else {
	header("Location: ../view/loginUser.php");
	exit();
}
