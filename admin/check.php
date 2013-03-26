<?php session_start();
	//a member, go to home
	if ($_SESSION["user_status"]=="admin"){
			header("location:home");
	}
	else{
		include("../static/connect_database.php");
		$username = $_POST["username"];
		
		$password = md5($_POST["password"]);
		//$redirect = urldecode($_POST["redirect"]);
		

		if ($_POST["redirect"]!=null){
			$redirect = $_POST["redirect"];
			$previous_page = $_POST["redirect"];
		}
		else {
			$redirect = "home";
			$previous_page = "index.php";
		}

		$log_in_check = mysql_query("
			SELECT * from tbl_admin
			WHERE username='$username'
		",$con);

		if (mysql_num_rows($log_in_check)==0){
			$log_in_check = mysql_query("
				SELECT * from tbl_admin
				WHERE username='$username'
			",$con);
			
			if (mysql_num_rows($log_in_check)==0){
				header("location:login.php?error=1");
			}
			$brand_flag=1;
			$password = $_POST["password"];
			//echo $password;
		}
		
			$log_in_check_array = mysql_fetch_array($log_in_check);
			if  ($log_in_check_array["password"]!=$password){
				header("location:login.php??error=1");
			}
			
			else{

						if ($brand_flag!=1){
							$_SESSION["user_status"] = "admin";
							$_SESSION["username"] = $username;
							
							ini_set(’session.gc_maxlifetime’, 8*60*60);
							ini_set(‘session.gc_probability’,1);
							ini_set(‘session.gc_divisor’,1);

							header("location:$redirect");
						}
						else{
							$_SESSION["user_status"] = "brand";
							$_SESSION["brand_id"] = $log_in_check_array["brand_id"];
							$_SESSION["username"] = $log_in_check_array["name"];
							
							ini_set(’session.gc_maxlifetime’, 8*60*60);
							ini_set(‘session.gc_probability’,1);
							ini_set(‘session.gc_divisor’,1);
							//echo $_SESSION["brand_id"];
							header("location:brands/edit_brand?brand_id=".$_SESSION["brand_id"]."&brand_name=".$_SESSION["username"]);
						}

						

			}
		



				

	}

	?>
