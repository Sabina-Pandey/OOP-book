<?php 
require 'function.php';

error_reporting(0);

$register = new Register();


if (isset($_POST['submit']))
{
	// echo "sabina";
   
	$result = $register->registration($_POST["fullname"], $_POST["username"], $_POST["email"], $_POST["password"], 		$_POST["confirm_password"], $_POST["gender"], $_POST["user_type"]);

	
		if($result == 1){
		  echo 
		  "<script> alert('Registration Successful'); </script>";
		}
		elseif($result == 10)
		{
		  echo 
		  "<script> alert('Username or Email Has Already Taken'); </script>";
		}
		elseif($result == 100)
		{
		  echo 
		  "<script> alert('Password Does Not Match'); </script>";
		}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include 'header.php'; ?>
    <div class="register">
        <h1>Welcome to the Registration!</h1>

        <br></br>

        <form action="" method="POST">

            <input type="text" name="fullname" placeholder="Enter your fullname"
			 value="<?php echo $fullname; ?>" required class="box"> <br></br>

            <input type="text" name="username" placeholder="Enter your username" 
			 value="<?php echo $username; ?>" required class="box"> <br></br>

            <input type="email" name="email" placeholder="Enter your email" 
			 value="<?php echo $email; ?>" required class="box"> <br></br>

            <input type="password" name="password" placeholder="Enter your password"  
			 value="<?php echo $_POST['password']; ?>" required class="box"> <br></br>
	
			<input type="password" placeholder="Confirm your password" name="confirm_password"
			 value="<?php echo $_POST['confirm_password']; ?>" required class="box"> <br></br>
			
            <input type="text" name="gender" placeholder="Enter your gender" 
			 value="<?php echo $gender; ?>" required class="box"> <br></br>

			 <input type="text" name="user_type" placeholder="User/Admin" 
			 value="<?php echo $user_type; ?>" required class="box"> <br></br>

             <button name="submit" class="btn">Register</button>

            <br></br>

            <p>Have an account? <a href="login.php">Login Now</a></p>
            
        </form>  
    </div> 
</body>
</html>