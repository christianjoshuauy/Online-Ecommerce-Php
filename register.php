<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbf2uy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sfname = $_POST['sfname'];
	$smname = $_POST['smname'];
	$slname = $_POST['slname'];
	$sphonenumber = $_POST['sphonenumber'];
	$semail = $_POST['semail'];
	

	$sql = "INSERT INTO tblseller (firstName, middleName, lastName, phoneNumber, emailAddress)
			VALUES ('$sfname', '$smname', '$slname', '$sphonenumber', '$semail')";

	if (mysqli_query($conn, $sql)) {
		echo "New seller record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Ecommerce System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Online Ecommerce System</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="display.php">View Sellers</a></li>
				<li><a href="payment.php">Add Payment Method</a></li>
				<li><a href="displayPayment.php">View Payment Methods</a></li>
			</ul>
		</nav>
		<form method="post">
			<label for="sfname">First Name:</label>
			<input type="text" name="sfname" required>

			<label for="sfname">Middle Name:</label>
			<input type="text" name="smname" required>

			<label for="slname">Last Name:</label>
			<input type="text" name="slname" required>

			<label for="sphonenumber">Phone Number:</label>
			<input type="tel" name="sphonenumber" required>

			<label for="slname">Email Address:</label>
			<input type="text" name="semail" required>

			<button type="submit">Register</button>
		</form>
	</div>
	<footer>Christian Joshua Uy BSCS-2 F2</footer>
</body>
</html>
