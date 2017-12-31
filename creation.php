<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: loggedin.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$country = mysqli_real_escape_string($con, $_POST['country']);
	$usertype = mysqli_real_escape_string($con, $_POST['usertype']);
    
    //name can contain only alpha characters and space
	
	if (!$usertype)  {
		$error = true;
		$usertype_error = "Please select a user type";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
		$error = true;
		$email_error = "Email is invalid";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$city)) {
        $error = true;
        $city_error = "City must contain only alphabets and space";
    }
	if (strlen ($state) != 2) {
		$error = true;
		$state_error = "State must be 2 characters";
	}
	if (strlen ($country) != 2) {
		$error = true;
		$country_error = "Country must be 2 characters";
	}
	if (!preg_match("/^[a-zA-Z ]/",$state)) {
        $error = true;
        $state_error = "State must be only letters";
    }
	if (!preg_match("/^[a-zA-Z ]/",$country)) {
        $error = true;
        $country_error = "Country must be only letters";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO users(email,password,city,state,country,usertype) VALUES('" . $email . "', '" . /*md5($password) hashpw*/ $password . "', '" . $city . "', '" . $state . "', '" . $country . "', '" . $usertype . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<!-- saved from url=(0054)https://getbootstrap.com/docs/3.3/examples/jumbotron/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>IndyAutomata</title>

    <!-- Bootstrap core CSS -->
    <link href="./Jumbotron Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Jumbotron Template for Bootstrap_files/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js.download"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/index.html">IndyAutomata</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/jobboard.php">Job Board</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/missionstatement.html">About Us</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/forum.html">Forum</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/creation.php">Create profile</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/login.php">Login</a>
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Enter Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>
					
                    <div class="form-group">
                        <label for="name">City</label>
                        <input type="text" name="city" placeholder="Enter City" required value="<?php if($error) echo $city; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($city_error)) echo $city_error; ?></span>
                    </div>
					
					<div class="form-group">
                        <label for="name">State</label>
                        <input type="text" name="state" placeholder="Enter State" required value="<?php if($error) echo $state; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($state_error)) echo $state_error; ?></span>
                    </div>
					
                    <div class="form-group">
                        <label for="name">Country</label>
                        <input type="text" name="country" placeholder="Enter Country" required value="<?php if($error) echo $country; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($country_error)) echo $country_error; ?></span>
                    </div>
					
					<div class="form-group">
						<label for="name">User Type</label> <br>
						<input type="radio" name="usertype" value="1" required value="<?php if($error) echo $usertype; ?>" class="form-control"> Programmer<br>
						<input type="radio" name="usertype" value="2" required value="<?php if($error) echo $usertype; ?>" class="form-control"> Contractor<br>
						<span class="text-danger"><?php if (isset($usertype_error)) echo $usertype_error; ?></span>
					</div>
					
                    <div class="form-group">
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>
  </div>
</form>
		
		</div>
    </div>

    <div class="container">

      <footer>
        <p>© 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
	<script src="scripts.js"></script>
    <script src="./Jumbotron Template for Bootstrap_files/jquery.min.js.download"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Jumbotron Template for Bootstrap_files/bootstrap.min.js.download"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js.download"></script>
  

</body></html>