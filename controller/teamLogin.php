<?php 
	include("../model/model.php"); 
	$ob = new Model;
	
	if(isset($_POST) && $_POST['flag'] == "teamLogin"){
		$loginas = $_POST['loginas'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		switch ($loginas) {
		  case "Admin":
		    $table = "sub_admin";
		    $redir = "../admin/index.php";
		    $sess = "subAdminLoginSess";
		    break;	
		  case "Design":
		    $table = "design_engg";
		    $redir = "../design-engineer/index.php";
		    $sess = "designLoginSess";
		    break;
		  case "Quick":
		    $table = "quick_est_engg";
		    $redir = "../quick-engineer/index.php";
		    $sess = "quickEstLoginSess";
		    break;
		  case "Vendors":
		    $table = "vendors";
		    $redir = "../vendors/index.php";
		    $sess = "vendorsLoginSess";
		    break;
		  default:
		    $table = "design_engg";
		    $redir = "../design-engineer/index.php";
		    $sess = "designLoginSess";
		}
		
		$record = $ob->commonSelectWhere($table,"`email` = '".$username."' AND `status` = '1'","id DESC","1");
		if($record->rowCount() > 0){ 
			foreach($record as $row){
				$dbpass = $row['password'];
				$dbuser = $row['email'];
				$dbname = $row['name'];
				$dbid = $row['id'];
				$dbmobile = $row['mobile'];
			}
			if($password == $dbpass && $username == $dbuser){
				$_SESSION[$sess] = array('id'=>$dbid,'name'=>$dbname,'mobile'=>$dbmobile,'email'=>$dbuser);
				header("location:$redir");
			}else{
				$_SESSION['adminLoginFail'] = "Invalide";
				header("location:../team-login.php");
			}
		}else{
			$_SESSION['adminLoginFail'] = "Invalide";
			header("location:../team-login.php");
		}
	}else{
		$_SESSION['adminLoginFail'] = "Invalide";
		header("location:../team-login.php");
	}
?>