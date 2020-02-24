
<?php 
	require 'database.php';


$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])){
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn -> prepare($sql);
	$stmt -> bindParam(':email', $_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt -> bindParam(':password', $password);

		if ($stmt ->execute ()) {
			$message = 'Successfully created new user';

		} else {
			$message = 'Sorry there must have been an issue creating your account';
		}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SignUp</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="assets/css/style.css">
</head> 
<body>
	<?php require 'partials/header.php'?>

		<?php if(!empty($message)): ?>
			<p> <?= $message ?></p>
		<?php endif; ?>
			

	<h1>SignUp</h1>
	<span>or <a href="login.php ">Login</a></span>

	<form action="SignUp.php" method="POST">
		<input type="text" name="email" placeholder="Enter your email">
		<input type="password" name="password" placeholder="Enter your Password">
		<input type="password" name="confirm_password" placeholder="Confirm your Password">
		<input type="submit" value="Send">
	</form>
		
</body>
</html>