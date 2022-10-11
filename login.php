<?php 

require 'function.php';

$login = new Login();


if (isset($_POST['submit'])) 
{
	$result = $login->login($_POST["username"], $_POST["password"], $_user_type["user_type"]);
   
	if($result == 1)
    {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: shop.php");
    }
    elseif($result == 10)
    {
        echo "<script> alert('Wrong Password'); </script>";
    }
    elseif($result == 100)
    {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include 'header.php'; ?> 
    <div class="form-container">
        <h1>Welcome to the Login Page!!</h1>

        <br></br>

        <form action="login.php" method="POST">

            <input type="text" name="username" placeholder="Enter Your UserName" required> <br></br>

           <input type="password" name="password" placeholder="Enter Your Password" required>  <br></br>

           <input type="text" name="user_type" placeholder="User/Admin" required> <br></br>
	
            <button name="submit" class="btn">Login</button>

                <br></br>

            <p>Don't have an account? <a href="register.php">SignUp Here</a></p>
             
        </form>  
    </div>
</body>
</html>