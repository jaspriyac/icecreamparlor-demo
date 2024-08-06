<!DOCTYPE html>
<html>
    <head>
     <link rel ='stylesheet' href = 'style.css'>
   </head>
<body>
<table align="center" cellpadding = 2, cellspacing = 4>

<td><button class="button-8" role="button"><a href = "http://localhost/welcome.php" target="blank">Home</a></button>&nbsp;&nbsp;&nbsp;</td>
<td><button class="button-8" role="button"><a href = "http://localhost/review.php" >Review</a></button></td>
</table>
</br></br>
<form method="post">
    <table border = 5, align = "center",color = "grey">
    <th colspan = 3>Looking to list your Ice-Cream Parlor?</th>
    <tr>
    <td><label for="name"> Name of the parlor: </label></td>
    <td><input type="text" name="name" id="name" placeholder="Eg: Baskin Robbins"></td>
    </tr> 
    <tr>
    <td><label for="address"> Address of the parlor: </label></td> 
    <td><input type="text" name="address" id = "address" placeholder="Eg: Block B, 34, Kanti Nagar, Andheri West, Mumbai"></td>
    </tr> 
    <tr>
    <td><label for="time">Timing: </label></td>
    <td><input type="text" name="time" id="time" placeholder= "Eg: 3:00pm - 10:00pm "></td>
    </tr>
    <tr>
    <td><label for="phone_num"> Contact Number: </label></td>
    <td><input name="phone" type="text" id="phone" placeholder= "Eg: 2226022800"></td>
    </tr>
    <tr>
    <td colspan="3"></br><center><button class="button-8" role="button" >Submit</button></center></td>
    </tr>
    </table>
</form>



<?php

session_start();
setcookie('customer_info', 'customer', time() + 3600 , "/");

$id = session_id();
echo "</br></br></br></br></br>";
echo "<p align = right><font color= #39739d>Session started. ";


if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.</font></p>";
    } else {
    echo "Cookies are disabled.";
    }

$conn = mysqli_connect("localhost", "usr_sswt", "jasdeep18", "JC");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO parlors(Name, Address, Timing, Phone_Num)
    
    VALUES ('" . $_POST['name'] . "','"
    . $_POST['address'] . "','"
    . $_POST['time'] . "','"
    . $_POST['phone'] . "')";
    
    $results = mysqli_query($conn, $sql);

if ($results === false) {

echo mysqli_error($conn);

} else {

$id = mysqli_insert_id($conn);
echo "<p><font color= #39739d>Thank you! Your response has been recorded!</font></p>";
}
}

mysqli_query($conn, "CREATE TABLE parlors(ID INT, Name VARCHAR(50), Address VARCHAR(400), Timing VARCHAR(50), Phone_Num VARCHAR(15))");


?>

</body>
</html>
