<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<input type="submit" name="submit" value="Login">
	</form>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = $_POST["email"];
			$password = $_POST["password"];

			// Check if both fields are filled
			if (empty($email) || empty($password)) {
				echo "<p style='color:red;'>Both fields are required and must not be empty.</p>";
			} else {
				// Check if email and password match
				$users = array(
					array("email" => "john@example.com", "password" => "password123", "firstname" => "John"),
					array("email" => "jane@example.com", "password" => "password456", "firstname" => "Jane")
				);

				$found = false;
				foreach ($users as $user) {
					if ($email == $user["email"] && $password == $user["password"]) {
						$found = true;
						header("Location: welcome.php?firstname=" . $user["firstname"]);
						exit;
					}
				}

				if (!$found) {
					echo "<p style='color:red;'>Invalid login credentials.</p>";
				}
			}
		}
	?>
</body>
</html>
