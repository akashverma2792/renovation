<?php include 'header.php';?>
<div class="login-form">
    <form action="../controller/customer.php" method="post" id="registration">
	<input type="hidden" name="flag" value="renovation-customer">
	<input type="hidden" name="requestFor" value="registration">
		<div class="avatar">
			<img src="../assets/img/renovation-expert-logo.png" alt="renovation experts"/>
		</div>
        <h2 class="text-center">Register Your Self</h2>
        <div class="form-group">
			<input type="text" class="form-control" placeholder="Your Name" name="name" id="name" >
		</div>
		
		<div class="form-group">
			<input type="number" class="form-control" placeholder="Enter Mobile" name="mobile" id="mobile" >
		</div>
				  
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" >
		</div>
		
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Password" name="password" id="password" >
		</div>
				      
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-lg btn-block login-btn">Register Now !</button>
        </div>
	<p>If you are already registered please, <a href="login.php" style="color: #df4930;font-weight: 600;"> Login Here. </a></p>
    </form>
   
</div>
<?php include 'footer.php';?>

<script>
	$(document).ready(function() {

		$('#registration').submit(function(e) {
			
			var name = $('#name').val();
			var mobile = $('#mobile').val();
			var email = $('#email').val();
			var password = $('#password').val();

			$(".error-msg").remove();
			
			if (name.length < 1) {
				e.preventDefault();
			    $('#name').after('<span class="error-msg">This field is required</span>');
			}
			if (mobile.length < 1) {
				e.preventDefault();
			    $('#mobile').after('<span class="error-msg">This field is required</span>');
			}
			if (email.length < 1) {
				e.preventDefault();
			    $('#email').after('<span class="error-msg">This field is required</span>');
			} else {
			  var regEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
			  var validEmail = regEx.test(email);
			  if (!validEmail) {
				  e.preventDefault();
				  $('#email').after('<span class="error-msg">Enter a valid email</span>');
			  }
			}
			if (password.length < 8) {
				e.preventDefault();
			  $('#password').after('<span class="error-msg">Password must be at least 8 characters long</span>');
			}
		});
	});
</script>

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
		padding: 5px;
		color: #f72626;
	}
</style>