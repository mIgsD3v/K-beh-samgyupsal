

<!DOCTYPE html>
<html lang="en">
<head>

 <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="./img/bglogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style3.css">

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
		      	<div class="icon d-flex align-items-center justify-content-center" style="background-color:#000000;">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4" style="color:#000000;">Admin</h3>

              
            <form action="actions/adminFunction.php" method="post" class="login-form">

		      		<div class="form-group" style="text-align:center;color:#ff3333;">
              <?php
              
              if(isset($_GET["message"]))
              {
                echo $_GET["message"];
              }
              ?>
              </div>

              <div class="form-group">
		      	  <input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="userpass" class="form-control rounded-left" placeholder="Password" required>
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

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</html>

