<?php 
	include("../model/model.php"); 
	$ob = new Model;

	if(isset($_POST) && $_POST['flag'] == "renovation-customer"){
		if(isset($_POST) && $_POST['requestFor'] == "login"){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$otp = rand(100000,999999);

			$record = $ob->commonSelectWhere("client","`mobile` = '".$username."' or `email` = '".$username."'","id DESC","1");

			if($record->rowCount() > 0){

				foreach($record as $row){
					$dbpass = $row['password'];
					$dbuser = $row['email'];
					$dbname = $row['name'];
					$dbid = $row['id'];
					$dbmobile = $row['mobile'];
					$dbverifyotp = $row['verify_otp'];
				}
				
				if($dbverifyotp == 1){
					if($password == $dbpass && ($username == $dbuser || $username == $dbmobile)){
						$_SESSION["customerSession"] = array('id'=>$dbid,'name'=>$dbname,'mobile'=>$dbmobile,'email'=>$dbuser);
						header("location:../customer/dashboard.php");
					}else{
						$_SESSION['registmsg'] = "Invalide Request. Please Try Again !";
						header("location:../customer/login.php");
					}
				}else{
					$where = "`id` = '".$dbid."'";
					$data = "`otp` = '".$otp."'";
				
					$record = $ob->commonUpdate("client",$data,$where);
					/* Message Api For OTP*/
					$_SESSION['otpvryid'] = $dbid;
					$_SESSION['registmsg'] = "OTP Not Verify. Please Verify OTP !";
					$_SESSION['registopt'] = $otp;
					header("location:../customer/otp-verify.php");
				}

			}else{
				$_SESSION['registmsg'] = "Profile Not Found. Please Register !";
				header("location:../customer/register.php");
			}

		}else{
			$name = $_POST['name'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$address = "";
			$otp = rand(100000,999999);
			$date = date("Y-m-d");

			$record = $ob->commonSelectWhere("client","`mobile` = '".$mobile."' or `email` = '".$email."'","id DESC","1");
			if($record->rowCount() > 0){

				foreach($record as $row){
					$verify_otp = $row['verify_otp'];
					$id = $row['id'];
				}

				if($verify_otp == 1){
					$_SESSION['registmsg'] = "Already Register. Please Login !";
					header("location:../customer/login.php");
				}else{
					$where = "`id` = '".$id."'";
					$data = "`otp` = '".$otp."',`password` = '".$password."',`name` = '".$name."'";
				
					$record = $ob->commonUpdate("client",$data,$where);
					/* Message Api For OTP*/
					$_SESSION['otpvryid'] = $id;
					$_SESSION['registmsg'] = "Already Register. Please Verify OTP !";
					$_SESSION['registopt'] = $otp;
					header("location:../customer/otp-verify.php");
				}
			}else{
				$coloum = "`name`, `mobile`, `email`, `password`, `address`, `otp`, `verify_otp`, `date`, `status`";
				$data = "'".$name."','".$mobile."','".$email."','".$password."','".$address."','".$otp."','0','".$date."','1'";
			
				$id = $ob->commonInsert("client",$coloum,$data);
				/* Message Api For OTP*/
				$_SESSION['otpvryid'] = $id;
				$_SESSION['registmsg'] = "Register Done. Please Verify OTP !";
				$_SESSION['registopt'] = $otp;
				header("location:../customer/otp-verify.php");
			}
		}
	}else{
		$_SESSION['customerSign'] = "Invalide";
		header("location:../customer/register.php");
	}
?>