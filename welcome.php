<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header('Location: login.php'); // Redirect to the login page if not logged in
  exit();
}

// If the user is logged in, display the welcome page
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link rel ='stylesheet' href = 'style.css'>
</head>
<body onload="getValue()">
<script>
  function getValue(){
    alert("Login Successful!");
  }
</script>
  <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
  <p>You have successfully logged in.</p>
  <table>
  <td><button class="button-8" role="button"><a href="review.php">Write a review</a></button></td>
  <td><button class="button-8" role="button"><a href="icecreamparlor.php">List your Ice Cream Parlor</a></button></td>
  </table>  
</body>
</html>
<?php
       // database credentials
       $host = "localhost";
       $dbuser = "usr_sswt"; 
       $password = "jasdeep18";
       $dbname = "JC";

       // create a database connection
       $conn = mysqli_connect($host, $dbuser, $password, $dbname);
 
       // check for connection
       if(mysqli_connect_error()) {
        
        echo mysqli_connect_error();
       exit;
       }

       // SQL query to select all records from the table
       $sql = "SELECT * FROM Cafe_Review ORDER BY Parlor_name";

       // execute the query
       $result = mysqli_query($conn, $sql);

       // check if there are any records
       if (mysqli_num_rows($result) > 0) {

          // output data of each row in a table format
          echo "<details>";
          echo"<summary>Here are all the reviews!!</summary>";
          echo"<p>";
          echo "<table border = 2>";
          echo "<tr><th>ID</th><th>Cafe_Name</th><th>Rating(out of 5)</th><th>Review</th></tr>";
          while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Parlor_Name"] . "</td><td align = center>" . $row["Rating"] . "</td><td>". $row["Review"] . "</td></tr>";
          echo "</p>";
          echo "</details>";
          }
          echo "</table></br>";
        } else {
          echo "0 results";
        }
       // close the database connection
       mysqli_close($conn);
      ?>