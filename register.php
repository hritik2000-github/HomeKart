<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
  $lastname = $_POST['lastname'];
  $email2 = $_POST['email2'];
  $phonenumber = $_POST['phonenumber'];
  $dob = $_POST['dob'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username,lastname,email2,phonenumber,dob, email, password)
            VALUES ('$username','$lastname','$email2',' $phonenumber','$dob' ,'$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed')</script>";
                $username = "";
                $lastname = "";
                $email2 = "";
                $phonenumber = "";
                $dob = "";
				$email = "";
        
				$_POST['password'] = "";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HomeKart</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div  class="container" >
   
    <p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
    
      <header>Signup</header>
      <div class="progress-bar">
    
        <div class="step">
          <p>Name</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Contact</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Birth</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Submit</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
     
        <form action="" method="POST" class="login-email">
          <div class="page slide-page">
            <div class="title">Basic Info:</div>
            <div class="field">
            <div class="label">First Name</div>
              <input type="text" placeholder="First Name" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="field">
              <div class="label">Last Name</div>
              <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>
           
            <div class="field">
              <button class="firstNext next">Next</button>
              
            </div>
            
          </div>
         
       
          <div class="page">
            <div class="title">Contact Info:</div>
            <div class="field">
              <div class="label">Email Address</div>
              <input type="email2" placeholder="Email" name="email2" value="<?php echo $email2; ?>"  required>
            </div>
            <div class="field">
              <div class="label">Phone Number</div>
              <input type="tel" placeholder="Phone Number" name="phonenumber" value="<?php echo $phonenumber; ?>"  required>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Previous</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Date of Birth:</div>
            <div class="field">
              <div class="label">Date</div>
              <input type="date" placeholder="DOB" name="dob" value="<?php echo $dob; ?>"  required>
            </div>
            <div class="field">
              <div class="label">Gender</div>
              <select>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Login Details:</div>
            <div class="field">
              <div class="label">Email</div>
              <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="field">
              <div class="label">Password</div>
              <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

           
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>
              <button name="submit" class="submit">Submit</button>
            </div>
            
          </div>
       
      </div>
</form>
    </div>
    <script src="script.js"></script>

  </body>
</html>
