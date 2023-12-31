<?php 

include 'config.php';

session_start();



error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: seller/index.php");
}


if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM seller WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
		
		header("Location: seller/index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HomeKart</title>
    <link rel = "stylesheet" href = "style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="container">
      <header>Login</header>
      <div class="form-outer">
      <form action="" method="POST" class="login-email">
          <div class="page slide-page">
           
            <div class="field">
              <div class="label">Email</div>
              <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="field">
              <div class="label">Password</div>
              <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
  
            </div>
            <div class="field btns">
              
              <button name="submit" class="submit">Submit</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="seller_register.php">Register Here</a>.</p>
</div>

</form>
         
</div>
        </body>
        </html>