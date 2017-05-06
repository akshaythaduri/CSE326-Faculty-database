<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Admin Panel</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" media="all" href="css/admin_panel.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
	<h1 style="position: relative; left: 30%; font-weight: bold; font-size: 40px; margin-top: 10px;">Please click one of the links from the navbar below!</h1>
	<p style="position: relative; left: 50%; font-size: 30px;">Admin Panel</p>
  <div id="w">
    <!-- <img id="head_logo" src="images/company-logo.png" alt="company-logo" /> -->
    <nav id="navigation">
      <ul>
        <li><a class="droplink" href="faculty_profile.php">Faculty Form </a></li>
        <li><div class="dropdown"><a class="droplink">Projects </a>
		<div class="dropdown-content">
		  	<a href="ongoing_projects.php">List of On Going Projects </a>
			<a href="collab_projects.php">Collaborative Projects</a>
		</div></div></li>
        <li><div class="dropdown"><a class="droplink">Display </a>
		<div class="dropdown-content">
		  	<a href="display_faculty.php">Faculty Information</a>
		</div></div></li>
		<li><a href="logout.php?logout">Sign Out</a></li>
      </ul>
    </nav>

    <!-- <div id="content">
	<br>
    <h1>Brief Documentation.</h1>
    </div></div>
	<br><br><br><br><br><br> -->
	</body>
</html>
