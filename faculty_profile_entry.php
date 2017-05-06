<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<head>
	<title>Faculty Details Entry Confirmation</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i");
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
	#admin_panel {
		color: white;
		text-decoration: none;
		color: #ffe6ff;
	}
</style>

<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "faculty_details");

    // 1. Create a database connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
        mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }

    if (isset($_POST['submit'])) {
	    // Process the form

        // Data coming from basic information
		$fac_name = $_POST["fac_name"];
		$qualification = $_POST["qualification"];
		$highest_qual = $_POST["highest_qual"];
		$designation = $_POST["designation"];
		$specialization = $_POST["specialization"];
		$nativity = $_POST["nativity"];

		// Data coming from Experience
		$ind_exp = $_POST["ind_exp"];
		$teach_exp = $_POST["teach_exp"];
		$vit_exp = $_POST["vit_exp"];

		// Data coming from PhD details
		$number_phds = $_POST["number_phds"];
		$five_phds = $_POST["five_phds"];

        // Query to insert records into the database
        $query  = "INSERT INTO faculty_profile (";
        $query .= "fac_name, qualification, highest_qual, designation, specialization, nativity, ";
        $query .= "ind_exp, teach_exp, vit_exp, number_phds, five_phds";
        $query .= ") VALUES (";
        $query .= "'$fac_name', '$qualification', '$highest_qual', '$designation', '$specialization', '$nativity', ";
        $query .= "'$ind_exp', '$teach_exp', '$vit_exp', '$number_phds', '$five_phds'";
        $query .= ")";

        // 2. Query to the database
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Success

            $retreive_faculty = "SELECT * FROM faculty_profile WHERE fac_name LIKE '$fac_name'";
            $faculty_ret_success = mysqli_query($connection, $retreive_faculty);

            if ($faculty_ret_success) {

				$row = mysqli_fetch_array($faculty_ret_success, MYSQLI_ASSOC);

				echo "<div class=\"container\">";
					echo "<div class=\"avatar-flip\">";
					echo "<img src=\"images/vit_logo.png\" height=\"150\" width=\"150\">";
					echo "<img src=\"images/sbst.jpg\" height=\"150\" width=\"150\">";
			  	echo "</div>";


                echo "<h2>Faculty Name: " . $row['fac_name'] . "</h2><br /><br />";
				echo "<h3>QUALIFICATION: </h3>" . $row['qualification'] . "<br /><br />";
				echo "<h3>HIGHEST QUALIFICATION: </h3>" . $row['highest_qual'] . "<br /><br />";
				echo "<h3>DESIGNATION: </h3>" . $row['designation'] . "<br /><br />";
                echo "<h3>SPECIALIZATION: </h3>" . $row['specialization'] . "<br /><br />";
				echo "<h3>NATIVITY: </h3>" . $row['nativity'] . "<br /><br />";
				echo "<h3>INDUSTRIAL EXPERIENCE: </h3>" . $row['ind_exp'] . "<br /><br />";
            	echo "<h3>TEACHING EXPERIENCE: </h3>" . $row['teach_exp'] . "<br /><br />";
				echo "<h3>EXPERIENCE IN VIT: </h3>" . $row['vit_exp'] . "<br /><br />";
				echo "<h3>TOTAL NUMBER OF PhD STUDENTS: </h3>" .$row['number_phds'] . "<br /><br />";
				echo "<h3>NUMBER OF PhD STUDENTS IN THE LAST 5 YRS.: </h3>" . $row['five_phds'] . "<br /><br />";
				echo "<a href=\"javascript:history.go(-1)\"><< GO BACK</a>";

			echo "</div>";	// End of the large container
			echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";

            mysqli_free_result($faculty_ret_success);
            } else {
        		// Failure
        		echo "Your query has failed.";
    			printf("Errors: %s\n", mysqli_error($connection));
    		}
        }
	}
    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
