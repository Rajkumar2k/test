<?php
require_once('userClass.php'); 

$userObj = new USER(); 
session_start();
$type = $_GET['type'];
 
if(empty($type) || !isset($type)) {
	header("location:index.php");
	
	//ajax
	
	
    $.ajax({
        url: "userClass.php",
        method: "POST",        
        data: jsondata,
        dataType: 'json',
        success: function(data){
			alert(JSON.stringify(data));
		},
        error: function(errMsg) {
            alert(JSON.stringify(errMsg));
        }
    });
 
} else if($type == 'signup') {
   $data =  $userObj::addNewUser($_REQUEST);
   $_SESSION = $data;
   if($data['status'] == 'error') {
     header("location:register.php");
   } else {
     header("location:index.php");
   }
} else if($type == 'login') {
   $email = addslashes($_REQUEST['email']);
   $password = addslashes($_REQUEST['password']);
   $_SESSION =  $userObj::login($email, $password);
   if($_SESSION['status'] == 'error') {
     header("location:index.php");
   } else {
     header("location:profile.php");
   }
 
} else if($type == 'logout') {
   unset($_SESSION);
   session_destroy();
   header("location:index.php");
}

?>
