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
	$userId = $_POST['userid'];
	$paymentType = $_POST['paymenttype'];
	

	$sql = "INSERT INTO tblpaymentmethod (userID, paymentType)
			VALUES ('$userId', '$paymentType')";

	if (mysqli_query($conn, $sql)) {
		echo "New payment method record created successfully";
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
		<h1>Add New Payment Method</h1>
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
			<label for="userid">User ID:</label>
			<input type="text" name="userid" required>

			<label for="paymenttype">Payment Type:</label>
			<input type="text" name="paymenttype" required>

			<button type="submit">Add Payment Method</button>
		</form>
	</div>
</body>
</html>
