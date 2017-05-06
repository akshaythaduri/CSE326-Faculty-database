<?php
	// Start the session
	session_start();
	ob_start();

	if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
        header("Location: index.php");
    }
	// Include the header file at the beginning of the page
	// include_once '../includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Faculty Details Form</title>
	  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/datepicker.css">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
      </script>
  </head>

	<style type="text/css">
		ul, li {
			display: inline;
			cursor: pointer;
			position: relative;
			top: 8%;
		}
		div.common_header {
			margin-top: 10px;
			margin-bottom: 20px;
			position: relative;
			background-color: #660066;
			color: white;
			width: 9%;
            left: 45%;
            height: 35px;
			border-radius: 25px;
		}
        #admin_panel,
        #logout {
            color: white;
            text-decoration: none;
        }
        #admin_panel,
        #logout {
			color: #ffe6ff;
		}
	</style>

  <body>
	<div class="common_header">
		<ul>
            <li><a id="admin_panel" href="admin_panel.php">Admin Panel</a></li>
		</ul>
	</div>

    <form action="faculty_profile_entry.php" method="post" enctype="multipart/form-data" id="faculty_profile">
      <h1>Faculty Details</h1>
      <fieldset>
        <legend><span class="number">1</span>Enter Basic Information</legend>
        <label for="fac_name">Faculty Name:</label>
        <input type="text" id="fac_name" name="fac_name" required/>

        <label for="qualification">Qualification:</label>
        <input type="text" id="qualification" name="qualification" required />

        <label for="highest_qual">Highest Educational Qualification:</label>
        <input type="text" id="highest_qual" name="highest_qual" required />

        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required />

        <label for="specialization">Specialization:</label>
        <input type="text" id="specialization" name="specialization" required />

        <label for="nativity">Nativity:</label>
        <input type="text" id="nativity" name="nativity" required />
      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Experience</legend>

		<label for="ind_exp">Experience (Outside VIT):</label>
		<br>
        <label for="ind_exp">Industry Experience (Outside VIT):</label>
        <input type="text" id="ind_exp" name="ind_exp" required />

        <label for="teach_exp">Teaching Experience (Outside VIT):</label>
        <input type="text" id="teach_exp" name="teach_exp" required />

        <label for="vit_exp">Experience in VIT:</label>
        <input type="text" id="vit_exp" name="vit_exp" required />
    </fieldset>

    <fieldset>
        <legend><span class="number">3</span>PhD Student Details</legend>
            <label for="number_phds">Number of PhD students under guidance:</label>
            <input type="text" id="number_phds" name="number_phds" required>

            <label for="five_phds">Number of PhD students produced in the last 5 years:</label>
            <input type="text" id="five_phds" name="five_phds" required>
    </fieldset>

      <button type="submit" name="submit" id="submit">Submit</button>
    </form>

  </body>
  <br><br>
