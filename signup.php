<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
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
		      	<h3 class="text-center mb-4" style="color:#0d0d0d;">Do you have an account?<a href="Login.php" style="margin-left:6px;color: #00bfff;">Sign in</a></h3>

              
						<form name="myForm" action="actions/signupFunction.php" method="post" class="login-form" onsubmit="return validateForm()">

		      		<div class="form-group" style="text-align:center;color:#248f24;">
              <?php
              
              if(isset($_GET["message"]))
              {
                echo $_GET["message"];
              }
              ?>
              </div>

			  
			  <div class="form-group" style="text-align:center;color:#ff3333;">
              <?php
              
              if(isset($_GET["message1"]))
              {
                echo $_GET["message1"];
              }
              ?>
              </div>

              <div class="form-group">
		      			<input type="text" id="email" name="email" class="form-control rounded-left" placeholder="Email" >
						  <span id="emailErr" class="error-msg"></span>
		      		</div>
	            <div class="form-group">
	              <input style="margin-top:30px;" type="text"  id="name" name="username" class="form-control rounded-left" placeholder="Firstname" >
				  <span id="nameErr" class="error-msg"></span>
	            </div>


				<div class="form-group">
	              <input style="margin-top:30px;" type="text"  id="Lname" name="Lname" class="form-control rounded-left" placeholder="Lastname" >
				  <span id="LnameErr" class="error-msg"></span>
	            </div>

              <div class="form-group">
		      			<input style="margin-top:30px;" type="password"  id="pass" name="userpass" class="form-control rounded-left" placeholder="userpass" >
						  <span id="passErr" class="error-msg"></span>
		      		</div>
	            <div class="form-group">
	              <input style="margin-top:30px;" type="password" id="confirm" name="userpassconfirm" class="form-control rounded-left" placeholder="userpassconfirm" >
				  <span id="confirmErr" class="error-msg"></span>
	            </div>

				<strong><p style="margin-top:20px;">Security Question:<p></strong>
	              <select  name="security_question" id="security_question" class="form-control" placeholder="security question" >
                <option>What is your favorite book?</option>
                <option>What was the name of your first pet?</option>
                <option>What is the city of your birth?</option>
                </select>

              <div class="form-group ">
	              <input type="text"  id="security" name="security_answer" class="form-control rounded-left" placeholder="answer" >
				  <span id="securityErr" class="error-msg"></span>
	            </div>


	            <div class="form-group">
	            	<button style="margin-top:15px;" type="submit" class="btn btn-primary rounded submit p-3 px-5" value="Sign up" >Sign up</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>


       

  </body>


<script src="./js/signupvalidation.js"></script>
</html>

  
   


