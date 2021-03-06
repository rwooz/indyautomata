<?php
session_start();

if(isset($_SESSION['usr_id'])=="") {
    header("Location: index.php");
}

include_once 'dbconnect.php';
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
	  <img src="http://lamp.cse.fau.edu/~rwoo1/p4/images/Logo.jpg">
        <h1>Welcome!</h1>
        <p>Are you looking to expand your programming experience?</p>
		<p>Are you looking to hire someone for a quick programming solution?</p>
		<p>Then this could be the virtual hub you've been looking for</p>
        <p><a class="btn btn-primary btn-lg" href="http://lamp.cse.fau.edu/~rwoo1/p4/missionstatement.html" role="button">Learn more »</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>We offer a way to get your foot in the door!</h2>
          <p>By taking small contracting jobs, you are able to build up a solid resume and portfolio of projects to show future employers</p>
          <p><a class="btn btn-default" href="http://lamp.cse.fau.edu/~rwoo1/p4/missionstatement.html#asaprogrammer" role="button">View details »</a></p>
        </div>
        <div class="col-md-4">
          <h2>We offer a straightforward way to meet your programming needs!</h2>
          <p>Just post your requirements and pick from your list of applicants</p>
          <p><a class="btn btn-default" href="http://lamp.cse.fau.edu/~rwoo1/p4/missionstatement.html#asaemployer" role="button">View details »</a></p>
       </div>
        <div class="col-md-4">
          <h2>Want to discuss some programming issues with professionals?</h2>
          <p>Feel free to check out our support forum</p>
          <p><a class="btn btn-default" href="http://lamp.cse.fau.edu/~rwoo1/p4/forum.html" role="button">View details »</a></p>
        </div>
      </div>

      <hr>

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