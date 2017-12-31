<?php
session_start();

if(isset($_SESSION['usr_id'])=="") {
    header("Location: creation.php");
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
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/logout.php">Logout</a>
		  <?php
			if($_SESSION['usertype']==2){
		  ?>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/postjob.php">Post Job</a>
		  <a class="navbar-brand" href="http://lamp.cse.fau.edu/~rwoo1/p4/editjob.php">Edit Job</a>
			<?php } ?>
		<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
		<div class="container">
		<?php
			if($_SESSION['usertype']==1){
		?>
		<h2>Must be logged in as a contractor to post or edit jobs</h2>
		<?php }
		if(isset($_SESSION['usr_id'])) {
			$result = mysqli_query($con,"SELECT * FROM jobs");

			echo "<table border='1'>
			<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Language(s)</th>
			<th>Description</th>
			<th>Contact</th>
			<th>Email</th>
			</tr>";

			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['title'] . "</td>";
				echo "<td>" . $row['language'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "<td>" . $row['contact'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} ?>
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
	<script src="scripts.js"></script>
    <script src="./Jumbotron Template for Bootstrap_files/jquery.min.js.download"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Jumbotron Template for Bootstrap_files/bootstrap.min.js.download"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js.download"></script>
  

</body></html>