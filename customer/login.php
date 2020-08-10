<?php include 'header.php';?>
<div class="login-form">
    <form action="../controller/customer.php" method="post">
	<input type="hidden" name="flag" value="renovation-customer">
	<input type="hidden" name="requestFor" value="login">
		<div class="avatar">
			<img src="../assets/img/renovation-expert-logo.png" alt="renovation experts"/>
		</div>
        <h2 class="text-center">Customer Login</h2>
		<p class="error-msg"><?php if(isset($_SESSION['registmsg']) && $_SESSION['registmsg'] != ""){ echo $_SESSION['registmsg']; } $_SESSION['registmsg'] = ""; ?></p>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Enter Username" required="required">		
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="required">	
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign in</button>
        </div>
		<p>If you are not registered please, <a href="register.php" style="color: #df4930;font-weight: 600;"> Signup Here. </a></p>
    </form>
</div>
<?php include 'footer.php';?>



<style>
 .form-control {
		min-height: 41px;
		background: #fff;
        border-color: #e3e3e3;
		box-shadow: none !important;
		border-radius: 4px;
	}   
	.form-control:focus {
		border-color: #99c432;
	}
	.login-form {
		width: 310px;
		margin: 0 auto;
		padding: 100px 0 30px;		
	}
    .login-form form {
		color: #999;
		border-radius: 10px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;	
		position: relative;	
    }
	.login-form h2 {		
		font-size: 24px;
		color: #454959;
        margin: 45px 0 25px;
		font-family: 'Francois One', sans-serif;
    }
	.login-form .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -50px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #ffffff;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.login-form .avatar img {
		width: 100%;
	}
    .login-form .btn {
        color: #fff;
        border-radius: 4px;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .login-btn {        
        font-size: 16px;
        font-weight: bold;
		background: #df4930;		
		margin-bottom: 20px;
    }
	.login-btn:hover, .login-btn:active {
		background: #86ac2d !important;
	}
	.social-btn {
		padding-bottom: 15px;
	}
	.social-btn .btn {		
        margin-bottom: 10px;
		font-size: 14px;
		text-align: left;
    }	
	.social-btn .btn:hover {
		opacity: 0.8;
		text-decoration: none;
	}	
    .social-btn .btn-primary {
        background: #507cc0;
    }
	.social-btn .btn-info {
		background: #64ccf1;
	}
	.social-btn .btn-danger {
		background: #df4930;
	}
	.social-btn .btn i {
		float: left;
		margin: 1px 10px 0 5px;
		min-width: 20px;
		font-size: 18px;
	}
    .or-seperator {
		height: 0;
        margin: 0 auto 20px;
        text-align: center;
        border-top: 1px solid #e0e0e0;
		width: 30%;
    }
    .or-seperator i {
        padding: 0 10px;
		font-size: 15px;
		text-align: center;
		background: #fff;
		display: inline-block;
		position: relative;
		top: -13px;
		z-index: 1;
    }
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form form a {
		color: #999;
		text-decoration: none;
	}	
	.login-form a:hover, .login-form form a:hover {
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
	.error-msg{
		text-align: center;
		color: #ed1818;
		font-weight: 600;
		margin-bottom: 20px;
	}
</style>