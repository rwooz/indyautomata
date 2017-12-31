<?php
session_start();


include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['deletejob'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$sql = "DELETE FROM jobs WHERE id= '" . $id . "' and email = '" . $_SESSION['usr_name'] ."'";
	if(mysqli_query($con,$sql)){
		$successmsg = "Successfully deleted! <a href='jobboard.php'>Click here to go back to Board</a>";
	} else {
		$errormsg = "Error in deleting...Please try again later!";
	}
}
	
if (isset($_POST['searchjob'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$result = mysqli_query($con,"SELECT * FROM jobs WHERE id = '" . $id . "' and email = '" . $_SESSION['usr_name'] ."'");
	
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['id'] = $row['id'];
        $_SESSION['title'] = $row['title'];
        $_SESSION['language'] = $row['language'];
		$_SESSION['description'] = $row['description'];
		$_SESSION['contact'] = $row['contact'];
        header("Location: editjob.php");
	} else {
		$errormsg = "Could not find job, make sure it is yours";
	}
}
if (isset($_POST['postjob'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $language = mysqli_real_escape_string($con, $_POST['language']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
	$contact = mysqli_real_escape_string($con, $_POST['contact']);

    //name can contain only alpha characters and space
	
    if (!$error) {
		$sql = "UPDATE jobs SET title= '$title', language= '$language', description= '$description', contact= '$contact' WHERE id='$id' and email = '" . $_SESSION['usr_name'] ."'";
        if(mysqli_query($con, $sql)) {
            $successmsg = "Successfully Posted! <a href='jobboard.php'>Click here to go back to Board</a>";
        } else {
            $errormsg = "Error in posting...Please try again later!";
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
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/logout.php">Logout</a>
		  <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
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
                    <legend>Search for your job</legend>

                    <div class="form-group">
                        <label for="name">ID #</label>
                        <input type="text" name="id" placeholder="Enter the ID# for your job" required value="<?php if($error) echo $id; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($title_error)) echo $title_error; ?></span>
                    </div>
					
                    <div class="form-group">
                        <input type="submit" name="searchjob" value="Submit" class="btn btn-primary" />
                    </div>
					<div class="form-group">
                        <input type="submit" name="deletejob" value="Delete" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div><br>
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Fill out your job</legend>
					 <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" name="id" value=<?php echo $_SESSION['id']?> required value="<?php if($error) echo $title; ?>" class="form-control" readonly/>
                        <span class="text-danger"><?php if (isset($title_error)) echo $title_error; ?></span>
                    </div> 

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" value=<?php echo $_SESSION['title']?> required value="<?php if($error) echo $title; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($title_error)) echo $title_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Language(s)</label>
                        <input type="text" name="language" value=<?php echo $_SESSION['language']?> required class="form-control" />
                        <span class="text-danger"><?php if (isset($language_error)) echo $language_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="description" rows="10" cols="45"><?php echo $_SESSION['description']?></textarea>
                        <span class="text-danger"><?php if (isset($description_error)) echo $description_error; ?></span>
                    </div>
					
                    <div class="form-group">
                        <label for="name">Contact Info</label>
                        <input type="text" name="contact" value=<?php echo $_SESSION['contact']?> value="<?php if($error) echo $contact; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($contact_error)) echo $contact_error; ?></span>
                    </div>
					
                    <div class="form-group">
                        <input type="submit" name="postjob" value="Submit" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
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