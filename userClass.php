<?php

require_once("dbconfig.php");

class USER extends Dbconfig {
 
   public $data;
 
   function __construct() {
     parent::__construct();
   }
 
  // Create new user/signup
   public static function addNewUser($userData) { 
     try {
       $check = self::checkUserExist($userData['username']);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "INSERT INTO users (name, username, email, phonenumber, password) VALUES ('".$userData['name']."', '".$userData['username']."', '".$userData['email']."', '".$userData['phonenumber']."', '".md5($userData['password'])."')";
       $result = dbconfig::run($query);
       if($result) {
         throw new exception("Error to create new user.");
       }       
       $data = array('status'=>'success', 'msg'=>"You have been registered successfully login now...", 'result'=>'');
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
  // Check if user already exist
   public static function checkUserExist($username) {
     try {
       $query = "SELECT username FROM users WHERE username = '".$username."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count>0) {
          throw new exception("Username already exist.");
       }       
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }
 
  // login function
   public static function login($email, $password) {
     try {
        $check = self::checkUser($email, $password);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "SELECT id FROM users WHERE email = '".$email."' AND password = '".md5($password)."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $resultSet = mysqli_fetch_assoc($result);         
       $data = array('status'=>'success', 'msg'=>"User detail fetched successfully.", 'result'=>$resultSet);
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
 
	
 // Check if Email/password is incorrect
   public static function checkUser($email, $password) {
     try {
       $query = "SELECT email FROM users WHERE email = '".$email."' and password = '".md5($password)."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count == 0) {
          throw new exception("Email/Password is incorrect.");
       }        
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }
 
  // Get user information by userid
  public static function getUserById($id) {
     try {
       $query = "SELECT * FROM users WHERE id=".$id;
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query");
       }
       $resultSet = mysqli_fetch_assoc($result); 
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"User detail fetched successfully", 'result'=>$resultSet);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
}
?>
