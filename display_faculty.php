<html>
<head>
    <title>Display Faculty Information</title>
    <!-- <link href="css/tables.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };

                    xmlhttp.open("GET","display_faculty_be.php?q="+str, true);
                    xmlhttp.send();
            }
        }
        </script>
        <style type="text/css">
            @import url("https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,700,700i");
            h1, select {
                font-family: Josefin Sans;
                margin-top: 20px;
            }
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
</head>
<body>
    <div class="common_header">
        <ul>
            <li><a id="admin_panel" href="admin_panel.php">Admin Panel</a></li>
        </ul>
    </div>
</body>
</html>
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

    // 2. Write the query to fetch the data
    $query = "SELECT fac_name FROM faculty_profile";

    $result = mysqli_query($connection, $query);

    // Use this for debugging
    // print_r($result);
    // echo "<br />";
    if ($result) {

        echo "<h1>Select any Faculty from the dropdown below!</h1>";
        echo "<select name=\"users\" onchange=\"showUser(this.value)\">";
        echo "<option value=\"\">Select a person:</option>";

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<option value=" . $row["fac_name"] . ">" . $row["fac_name"] . "</option>";
        };

        echo "</select>";
    }

    // 3. Close connection to the database
	if (isset($connection)) { mysqli_close($connection); }
?>
<body>


<div id="txtHint"><b>Faculty Information will be listed here.</b></div>

</body>
</html>
