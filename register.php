<?php

// database credentials
$host = "localhost";
$dbuser = "usr_sswt"; 
$password = "jasdeep18";
$dbname = "JC";

// create a database connection
$conn = mysqli_connect($host, $dbuser, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "INSERT INTO customer (Name, Email_ID, Phone_Num, Password)

VALUES ('" . $_POST['name'] . "','"
. $_POST['emailid'] . "','"
. $_POST['phoneno'] . "','"
. $_POST['password'] . "')";
$results = mysqli_query($conn, $sql);


//check if results are fetched
if ($results !== true) {

echo mysqli_error($conn);

} else {

$id = mysqli_insert_id($conn);
header("Location: login.php");
}
}
?>


<html>
  <head>
    <link rel ='stylesheet' href = 'style.css'>
  </head>
<body>

  <table align ="center" cellpadding = 2, cellspacing = 4>
   <td><button class="button-8" role="button"><a href = "http://localhost/login.php" target="blank">Sign in</a></button>&nbsp;&nbsp;&nbsp;</td>
   <td><button class="button-8" role="button"><a href = "http://localhost/index.php" >Go Back</a></button></td>
   </table>
   </br></br>
   <form method="post">
    <table align = "center" width = 50%>
    <th colspan = 3><h2>Please Register</h2></th><tr>
    <td><input type="text" id = "name" name = "name" placeholder="name"/></input></td><tr>
    <td><input type="email" id="emailid" name = "emailid" placeholder="email"/></input></td><tr>
    <td><input type="text" id="phoneno" name = "phoneno" placeholder="phone no."/></input></td><tr>
    <td><input type="password" id="password" name = "password" placeholder="password"/></input></br></td><tr>
    <td><center><button class="button-8" role="button">Register</button></center></td>
    </table>


</form>

</body>
</html>
