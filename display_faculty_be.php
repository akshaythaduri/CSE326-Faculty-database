<!DOCTYPE html>
<html>
<head>
    <!-- <link href="css/tables.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script> -->


    <!-- JavaScript to check reload the page -->
    <!-- <script type="text/javascript">
        function refresh() {
            window.location("display_faculty_be");
        }
    </script> -->

    <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i");
        table {
            margin-top: 40px;;
        }

        a#refresh {
            position: relative;
            left: 47%;
        }
        </style>
</head>

<?php
    $q = $_GET['q'];

    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "faculty_details");

    // Create a database connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
        mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }

    $query = "SELECT * FROM faculty_profile WHERE fac_name LIKE " . "'$q'";
    $result = mysqli_query($connection, $query);

    echo "<h1>Faculty Details</h1>";
    echo "<table class=\"striped\">
    <tr>
    <th><span>Faculty Name</span></th>
    <th><span>Qualification</span></th>
    <th><span>highest Qualification</span></th>
    <th><span>Designation</span></th>
    <th><span>Specialization</span></th>
    <th><span>Nativity</span></th>
    <th><span>Industrial Experience</span></th>
    <th><span>Teaching Experience</span></th>
    <th><span>Experience in VIT</span></th>
    <th><span>Total Number of PhDs</span></th>
    <th><span>Number of PhDs in last 5 yrs.</span></th>
    </tr>";

    // Enable for debugging
    // print_r($query);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["fac_name"] . "</td>";
        echo "<td>" . $row["qualification"] . "</td>";
        echo "<td>" . $row["highest_qual"] . "</td>";
        echo "<td>" . $row["designation"] . "</td>";
        echo "<td>" . $row["specialization"] . "</td>";
        echo "<td>" . $row["nativity"] . "</td>";
        echo "<td>" . $row["ind_exp"] . "</td>";
        echo "<td>" . $row["teach_exp"] . "</td>";
        echo "<td>" . $row["vit_exp"] . "</td>";
        echo "<td>" . $row["number_phds"] . "</td>";
        echo "<td>" . $row["five_phds"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br />";

    echo "<script>function refresh() { window.location(\"display_faculty_be.php\"); }</script>";

    $curr_uri = $_SERVER['HTTP_REFERER'];

    echo "<a id=\"refresh\" href=" . $curr_uri . ">Go back to List</a>";

    if (isset($connection)) { mysqli_close($connection); }
?>
</body>
</html>
