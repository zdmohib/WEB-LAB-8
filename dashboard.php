<?php
  session_start();

	$username=$_SESSION["username"];
	
	
	
  
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <head>
  <meta charset="UTF-8">
  <title>XCOMPANY</title>
    <link rel="stylesheet" type="text/css" href="style2.css">

</head>
</head>
<body>
  <div class="header_area">
    <div class="logoarea">
      <h1><span class="x">X</span>Company</h1>
    </div>
    <div class="menu_area">
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="home.php">Logout</a></li>
      </ul>
    </div>
  </div>


	<div class="content_area">
		<div class="content_left">
			
			<h3>Account</h3>
			<ul>

				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changepicture.php">Change Profile Picture</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
			</ul>
		</div>
		<div class="content_right">
			<h2>Welcome <?php echo $username; ?></h2>
			

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
	 			<th>action</th>
	 		</tr>
	 	<?php
	 	while($row=mysqli_fetch_array($result))
	 	{
	 		echo "<tr>";
	 		echo "<td>".$row['pid']."</td>";
	 		echo "<td>".$row['name']."</td>";
	 		echo "<td>".$row['description']."</td>";
	 		echo "<td>".$row['quantity']."</td>";
	 		echo '<td><a href="pupdate.php?pid=' .$row['pid'].'&name='.$row['name'].'&description='.$row['description'].'&quantity='.$row['quantity'].'">Edit</a> || <a href="delete.php?pid=' .$row['pid'].'">Delete</a> || <a href="pinput.php">add</a></td>';
	 		

	 		echo "</tr>";
           
	 	
	 	}
	 	echo "</table>";

	 }
	 else
	 {
	 	echo "No data found.<br/>";
	 }
mysqli_close($con);	 


    ?>





		</div>
	</div>
	<div class="footer_area">
		<h3>ziad</h3>
	</div>
</body>
</html>