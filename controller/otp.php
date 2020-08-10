<?php 
	include("../model/model.php"); 
	$ob = new Model;

	if(isset($_POST) && $_POST['flag'] == "otp-customer"){
		if(isset($_POST) && $_POST['requestFor'] == "otpVerify"){
			$id = $_POST['id'];
			$otp = $_POST['otp'];

			$record = $ob->commonSelectWhere("client","`id` = '".$id."'","id DESC","1");

			foreach($record as $row){
				$dbopt = $row['otp'];
				$dbpass = $row['password'];
				$dbuser = $row['email'];
				$dbname = $row['name'];
				$dbid = $row['id'];
				$dbmobile = $row['mobile'];
			}

			if($dbopt == $otp){
				$where = "`id` = '".$id."'";
				$data = "`verify_otp` = '1'";
			
				$record = $ob->commonUpdate("client",$data,$where);
				$_SESSION["customerSession"] = array('id'=>$dbid,'name'=>$dbname,'mobile'=>$dbmobile,'email'=>$dbuser,'askfordashboard'=>'yes');
				header("location:../customer/index.php");
			}else{
				$_SESSION['registmsg'] = "Invalide OTP. Please Enter Valide OTP !";
				header("location:../customer/otp-verify.php");
			}

		}else{
			$_SESSION['registmsg'] = "Invalide Request. Please Try Again !";
			header("location:../customer/otp-verify.php");
		}
	}elseif(isset($_GET) && $_GET['flag'] == "otp-customer"){
		
		if(isset($_GET) && $_GET['requestFor'] == "otpResend"){
			$id = $_GET['id'];

			$record = $ob->commonSelectWhere("client","`id` = '".$id."'","id DESC","1");
			if($record->rowCount() > 0){

				$newOtp = rand(100000,999999);
				$where = "`id` = '".$id."'";
				$data = "`otp` = '".$newOtp."'";
			
				$record = $ob->commonUpdate("client",$data,$where);
				/* Message Api For OTP*/
				$_SESSION['registmsg'] = "OTP Send Successfully. Wait For Receive !";
				$_SESSION['registopt'] = $newOtp;
				header("location:../customer/otp-verify.php");
			}else{
				$_SESSION['customerSign'] = "Invalide";
				header("location:../customer/register.php");
			}
		}else{
			$_SESSION['registmsg'] = "Invalide Request. Please Try Again !";
			header("location:../customer/otp-verify.php");
		}
		
	}else{
		$_SESSION['customerSign'] = "Invalide";
		header("location:../customer/register.php");
	}
?>