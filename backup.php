<!-- Process the form -->
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

        $retreive_faculty = "SELECT * FROM faculty_profile";
        $faculty_ret_success = mysqli_query($connection, $retreive_faculty);

        if ($faculty_ret_success) {

            echo "<table width='100%'>";
            echo "<tr><th>Faculty Name</th><th>Qualification</th><th>Highest Qualification</th><th>Designation</th>";
            echo "<th>specialization</th><th>Nativity</th><th>industrial Experience</th>";
            echo "<th>Teaching Experience</th><th>Experience in VIT</th><th>Total Number of PhD students</th><th>Number of PhD students in the last 5 yrs.</th>";

              $row = mysqli_fetch_array($faculty_ret_success, MYSQLI_ASSOC);

            echo '<tr><td align="center">' . $row['fac_name'] . '</td><td align="left">' . $row['qualification'] . '</td>';
            echo '<td align="center">' . $row['highest_qual'] . '</td><td align="left">' . $row['designation'] . '</td>';
            echo '<td align="center">' . $row['specialization'] . '</td><td align="left">' . $row['nativity'] . '</td>';
            echo '<td align="center">' . $row['ind_exp'] . '</td><td align="left">' . $row['teach_exp'] . '</td>';
            echo '<td align="center">' . $row['vit_exp'] . '</td><td align="left">' . $row['number_phds'] . '</td>';
            echo '<td align="center">' . $row['five_phds'] . '</td>';
            echo "<link href=\"https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i\" rel=\"stylesheet\">";
            echo "<style type=\"text/css\">";
            echo "th, td { border-style: solid; border-color: black; font-family: Josefin Sans; }";
            echo "td { text-align: center; }";
            echo "</style>";
            echo "</table>";

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
</html>
