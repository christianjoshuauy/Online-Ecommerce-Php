<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbf2uy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tblseller";
$result = mysqli_query($conn, $sql);

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
		<?php
		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>First Name</th>";
			echo "<th>Middle Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Phone Number</th>";
			echo "<th>Email Address</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['sellerId'] . "</td>";
				echo "<td>" . $row['firstName'] . "</td>";
				echo "<td>" . $row['middleName'] . "</td>";
				echo "<td>" . $row['lastName'] . "</td>";
				echo "<td>" . $row['phoneNumber'] . "</td>";
				echo "<td>" . $row['emailAddress'] . "</td>";
				echo "<td>";
				echo "<a href='edit.php?sellerId=" . $row['sellerId'] . "'>Edit</a>";
				echo " | ";
				echo "<a href='delete.php?sellerId=" . $row['sellerId'] . "' onclick='return confirm(\"Are you sure you want to delete this student record?\")'>Delete</a>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		} else {
			echo "No seller records found";
		}
		?>
	</div>
	<footer>Christian Joshua Uy BSCS-2 F2</footer>
</body>
</html>
