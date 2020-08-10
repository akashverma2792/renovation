<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "adminLogin"){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$datetime = date("Y-m-d H:i:s");
		
		$record = $ob->commonSelectWhere("`admin`","`email` = '".$username."'","id DESC","1");
		if($record->rowCount() > 0){ 
			foreach($record as $row){
				$dbpass = $row['password'];
				$dbuser = $row['email'];
				$dbfname = $row['fname'];
				$dblname = $row['lname'];
				$dbid = $row['id'];
				$dbmobile = $row['mobile'];
			}
			if($password == $dbpass && $username == $dbuser){
				$_SESSION['adminLoginSess'] = array('id'=>$dbid,'fname'=>$dbfname,'lname'=>$dblname,'mobile'=>$dbmobile,'email'=>$dbuser);
				header("location:../index.php");
			}else{
				$_SESSION['adminLoginFail'] = "Invalide";
				header("location:../login.php");
			}
		}else{
			$_SESSION['adminLoginFail'] = "Invalide";
			header("location:../login.php");
		}
	}else{
		$_SESSION['adminLoginFail'] = "Invalide";
		header("location:../login.php");
	}
?>