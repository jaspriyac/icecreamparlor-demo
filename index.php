<html>
  <head>
    <link rel ='stylesheet' href = 'style.css'>
  </head>
 <body onload="getValue()" class="landing">
 <center>
 <p id="output"></p>
 <script>
  function getValue(){
    alert("Welcome!!");
    name = prompt("Please enter your name:");
    if (name == null || name == "") {
     document.getElementById("output").innerHTML="Welcome!!</br></br>";
     } else {
      document.getElementById("output").innerHTML="Hello " + name + "! How are you today?</br></br>";
     }

  }
  </script>
  <table>
       <th colspan = 4><center><h2>"You can't buy happiness, but you can buy ice cream, and that is pretty much the same thing."</h2></center></th><tr>
       </tr><td><center><img src="landing2.jpg" alt="Ice Cream Image" width="450" height="350"></center></td>
       <td><img src="landing3.jpg" alt="Ice Cream Image" width="450" height="350">
       </td>
       <td><center><img src="landing.png" alt="Ice Cream Image" width="450" height="350"></center></td>
       <tr><td colspan=3><h1>Write in all your reviews for your favourite ice- cream parlors!</h1> </td></tr>
       </table>
       

       <font size= 6 color = #39739d>Are you new here?</font>&nbsp;&nbsp;&nbsp;&nbsp;
       <button class="button-8"><a href = "http://localhost/register.php" target="blank">Yes</a></button>
       &nbsp;&nbsp;&nbsp;&nbsp;<button class="button-8"><a href = "http://localhost/login.php" target="blank">No</a></button>
       </center>
       

</body>
</html>




