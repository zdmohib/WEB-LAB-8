<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Company X</h2><br>
	<label><a href="home.php">Home</a> <a href="login.php">Login</a> <a href="input.php">Registration</a></label>
  </div>
	
  <form method="post" action="reg.html">
  
  	<div class="input-group">
  <h1>Welcome to company X</h1>
  	</div>
  	
  </form>
</body>
</html>



<?php

  $con=mysqli_connect("localhost","root","","testdb");
  if(!$con)
  {
    die("Connection Error: ".mysqli_connect_error()."<br/>");
  }

  $sql="SELECT * FROM product";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
   {
    ?>
    <table border="1">
           
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Product Quantity</th>
      </tr>
    <?php
    while($row=mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['pid']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['description']."</td>";
      echo "<td>".$row['quantity']."</td>";
      echo "</tr>";

    
    }
    echo "</table>";
   }
   else
   {
    echo "No data found.<br/>";
   }
mysqli_close($con); 