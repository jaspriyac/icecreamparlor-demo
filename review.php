<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <table align="center" cellpadding="2" cellspacing="4">
        <tr>
            <td><button class="button-8" role="button"><a href="http://localhost/welcome.php" target="_blank">Home</a></button>&nbsp;&nbsp;&nbsp;</td>
            <td><button class="button-8" role="button"><a href="http://localhost/icecreamparlor.php">Listing</a></button></td>
        </tr>
    </table>
    </br></br>
    <form method="post">
        <table border="2" align="center" color="grey">
            <tr>
                <td>
                    <label for="restaurant">Choose an Ice Cream Parlor:</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="cname" id="cname">
                        <?php
                        // Database connection information
                        $servername = "localhost";
                        $username = "usr_sswt";
                        $password = "jasdeep18";
                        $dbname = "JC";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if (mysqli_connect_error()) {
                            echo mysqli_connect_error();
                            exit;
                        }

                        // SQL query to fetch data from parlors table
                        $sql = "SELECT Name, Address FROM parlors";
                        $result = mysqli_query($conn, $sql);

                        // Loop through each row of the result and create an option tag for the dropdown
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["Name"] . "'>" . $row["Name"] . " - " . $row["Address"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No parlors found</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></br><textarea name="review" id="review" rows="3" cols="100" placeholder="What would you like to review?"></textarea></td>
            </tr>
            <tr>
                <td></br><label for="ratings">Rating: </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="excellent" name="rating" value="5"><label for="excellent">Excellent</label>
                    <input type="radio" id="good" name="rating" value="4"><label for="good">Good</label>
                    <input type="radio" id="average" name="rating" value="3"><label for="average">Average</label>
                    <input type="radio" id="fair" name="rating" value="2"><label for="fair">Fair</label>
                    <input type="radio" id="poor" name="rating" value="1"><label for="poor">Poor</label>
                </td>
            </tr>
            <tr>
                <td></br></br><center><button class="button-8" role="button">Submit</button></center></td>
            </tr>
        </table>
    </form>

    <?php
    // Starting session and setting cookie for the page
    session_start();
    setcookie('customer_info', 'customer', time() + 3600, "/");

    $id = session_id();
    echo "</br></br></br></br></br></br></br></br></br>";
    echo "<p align='right'><font color='#39739d'>Session started. ";

    // Check cookie count to display message
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.</font></p>";
    } else {
        echo "Cookies are disabled.";
    }

    // Initialize rating variable
    $rating = null;

    // Establishing connection to database
    $conn = mysqli_connect("localhost", "usr_sswt", "jasdeep18", "JC");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cname = $_POST['cname'];
        $review = $_POST['review'];
        $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

        if ($rating !== null) {
            $sql = "INSERT INTO Cafe_Review (Parlor_Name, Rating, Review) VALUES ('$cname', '$rating', '$review')";
            $results = mysqli_query($conn, $sql);

            // Check if values are fetched
            if ($results !== true) {
                echo mysqli_error($conn);
            } else {
                $id = mysqli_insert_id($conn);
                echo "<p><font color='#39739d'>Thank you! Your response has been recorded!</font></p>";
            }
        } else {
            echo "<p><font color='#39739d'>Please select a rating.</font></p>";
        }
    }

    // Convert the value to rating format
    if (isset($rating)) {
        switch ($rating) {
            case '5':
                $rating_value = 'exc';
                break;
            case '4':
                $rating_value = 'goo';
                break;
            case '3':
                $rating_value = 'avg';
                break;
            case '2':
                $rating_value = 'fai';
                break;
            case '1':
                $rating_value = 'poo';
                break;
            default:
                $rating_value = '';
        }
    }
    ?>
</body>
</html>
