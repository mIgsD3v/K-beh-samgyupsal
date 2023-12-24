
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Log In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="./img/bglogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style3.css">

	<style>
  .error-msg {
    color: rgb(235, 16, 16);
    font-size: 14px;
    margin-top: 5px;
	position: absolute;
  }
</style>


</head>
<body>

<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center" style="background-color:#0d0d0d;">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4" style="color:#0d0d0d;">Don't have an account?<a href="signup.php" style="margin-left:6px;color: #00bfff;">Sign up</a></h3>

              
						<form name="myForm" action="actions/loginFunction.php" method="post" class="login-form" onsubmit="return validateForm()">

		      		<div class="form-group" style="text-align:center;color:#ff3333;">
              <?php
              
              if(isset($_GET["message"]))
              {
                echo $_GET["message"];
              }
              ?>
              </div>

              <div class="form-group">
		      	  <input type="text" id="name" name="username" class="form-control rounded-left" placeholder="Firstname" >
					<span id="nameErr" class="error-msg"></span>
		      		</div>

					  <div class="form-group">
	              <input style="margin-top:30px;" type="text"  id="Lname" name="Lname" class="form-control rounded-left" placeholder="Lastname" >
				  <span id="LnameErr" class="error-msg"></span>
	            </div>

	            <div class="form-group">
	              <input type="password" style="margin-top:30px;" id="pass" name="userpass" class="form-control rounded-left" placeholder="Password">
				  <span id="passErr" class="error-msg"></span>
	            </div>
	            <div class="form-group d-md-flex" style="margin-top:30px;">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary" style="color:#0d0d0d;" >Remember Me
									  <input type="checkbox" checked>
									  <span style="color:#0d0d0d;" class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="forgotpassword.php" style="color:#0d0d0d;">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5" >Login</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>


       

  </body>




  <script src="./js/loginvalidation.js"></script>
</html>

