<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname"><br>

		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname"><br>

		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>

		<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$confirm_password = $_POST["confirm_password"];

			if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
				echo "<p style='color:red;'>All fields are required and must not be empty.</p>";
			} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<p style='color:red;'>The email address must be in a valid format.</p>";
			} else if ($password != $confirm_password) {
				echo "<p style='color:red;'>The password and confirm password fields must match.</p>";
			} else {
				echo "<p style='color:green;'>Registration successful!</p>";
			}
		}
	?>
</body>
</html>