<!DOCTYPE html>
<html lang="en">
<head>
<title>Forgot Password</title>
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
		      	<h3 class="text-center mb-4" style="color:#0d0d0d;">Back to<a href="Login.php" style="margin-left:6px;color:#00bfff;">Sign in</a></h3>

              
            <form name="myForm"action="actions/forgotFunction.php" method="post" class="login-form"  onsubmit="return validateForm()">

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
		      			<input type="text" id="name" name="name" class="form-control rounded-left" placeholder="Name">
                <span id="nameErr" class="error-msg"></span>
		      		</div>

              <div class="form-group">
		      			<input type="text" style="margin-top:30px;" id="email" name="email" class="form-control rounded-left" placeholder="Email">
                <span id="emailErr" class="error-msg"></span>
		      		</div>
	            
              <strong><p style="margin-top:20px;">Security Question:<p></strong>
	              <select  name="security_question" id="security_question" class="form-control" placeholder="security question" >
                <option>What is your favorite book?</option>
                <option>What was the name of your first pet?</option>
                <option>What is the city of your birth?</option>
                </select>

              <div class="form-group">
	              <input type="password" id="security"name="security_answer" class="form-control rounded-left" placeholder="answer">
                <span id="securityErr" class="error-msg"></span>
	            </div>


	            <div class="form-group">
	            	<button type="submit" style="margin-top:10px;" class="btn btn-primary rounded submit p-3 px-5" value="Verify Account" >Verify Account</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>


       

  </body>

  <script src="./js/forgotpassvalidation.js"></script>

</html>

