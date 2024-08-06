<?php

// database credentials
$host = "localhost";
$dbuser = "usr_sswt"; 
$password = "jasdeep18";
$dbname = "JC";

// create a database connection
$conn = mysqli_connect($host, $dbuser, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//retrieve login details from form
$email = $_POST['emailid'];
$password = $_POST['password'];

// prepare SQL statement
$sql = "SELECT * FROM customer WHERE Email_ID ='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);

// check if the data has been extracted in $results
if ($result === false) {
    echo mysqli_error($conn);
    } 

// check if user exists
if ($result->num_rows > 0) {
// user found
  echo $email;
  session_start();
  $_SESSION["username"]=$email;
  header("Location: welcome.php");
  echo "Login successful</br>";
  echo "<button><a href = 'http://localhost/review.php'>Click here to review</a></button></br>";
  echo "<button><a href = 'http://localhost/icecreamparlor.php' >Click here to list your parlor</a></button>";
} else {
  // user not found
  echo "Login failed. Please check your credentials.";
}
}

?>

<html>
  <head>
    <link rel ='stylesheet' href = 'style.css'>
  </head>
<body>
   <table align="center" cellpadding = 2, cellspacing = 4>
   <td><button class="button-8" role="button"><a href = "http://localhost/register.php" target="blank">Register</a></button>&nbsp;&nbsp;&nbsp;</td>
   <td><button class="button-8" role="button"><a href = "http://localhost/index.php" >Go Back</a></button></td>
   </table></br>

<form method="post" class="body">
<table align="center" width = 50%>
    <th colpan = 3><h2>Please Sign In</h2></th><tr>
    <td><input type="email" id="emailid"  name="emailid" placeholder='email'></input></td></tr><tr>
    <td><input type="password" id="password" name="password" placeholder='password'></input></br></br></td></tr><tr>
    <td><center><button class="button-8">Sign In</button></center></td></tr>
</table>
</form>

</body>
</html>