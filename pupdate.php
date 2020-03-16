<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:login.php");
}
?>

<html>
	<head>
		<title>Update</title>
	</head>
	<body>
		<fieldset align="center">
			<legend>Update Product</legend>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="<?php echo $_GET['name'] ?>"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><input type="text" name="description" value="<?php echo $_GET['description'] ?>"></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="number" name="quantity" value="<?php echo $_GET['quantity'] ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="addProduct" value="ADD"/></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</body>
	</html>

<?php
if (isset($_POST['addProduct']))
{
	$con=mysqli_connect("localhost","root","","testdb");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	if (isset($_GET['pid']) && is_numeric($_GET['pid']))
	{
		$pid=$_GET['pid'];
		$pname=$_POST['name'];
		$description=$_POST['description'];
		$pquantity=$_POST['quantity'];
		$sql="UPDATE product SET name='$pname',description='$description',quantity='$pquantity' WHERE pid='$pid'";
		if(mysqli_query($con,$sql))
		{
			header("Location:dashboard.php");
		}
		else
		{
			echo "Error in updating: ".mysqli_error($con);
		}	
		mysqli_close($con);		
	}
}
?>