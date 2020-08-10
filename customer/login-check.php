<?php
	if(isset($_SESSION['customerSession']) && (!empty($_SESSION['customerSession'])) && $_SESSION['customerSession']['id'] != ""){
		if(isset($_GET['ses']) && $_GET['ses'] == "rmv"){
			$_SESSION['customerSession']['askfordashboard'] = "";
			header("location:index.php");
		}
	}else{
		header("location:login.php");
	}
?>