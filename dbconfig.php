<?php

class Dbconfig {

     protected static $host = 'localhost'; // database hostname
     protected static $username = 'root';  // database username
     protected static $password = 'novalnet';  //database password
     protected static $dbname = 'php_auth'; // database name
     
      static $con;

	  function __construct() { 
		self::$con = self::connect();
	  }

	  // open connection

	  protected static function connect() {
		try{
			$link = mysqli_connect(self::$host, self::$username, self::$password, self::$dbname);
			 if(!$link) {
				throw new exception(mysqli_error($link));
			 }
			 return $link;
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	  }

	   // close connection

	   public static function close() {
		mysqli_close(self::$con);
	   }
	

	   // run query

	   public static function run($query) {
		try {
			if(empty($query) && !isset($query)) {
				throw new exception ("Query String is not set");
			}
			$result = mysqli_query(self::$con,$query);

			// self :: close();
			return $result;
		} catch (Exception $e) {
			echo"Error: ".$e->getMessage();
		}
	   }
	}
?>
