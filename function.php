<?php 
session_start();

class Connection 
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "shop";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}

class Register extends Connection 
{
    public function registration($fullname, $username, $email, $password, $confirm_password, $gender, $user_type)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$username' OR email = '$email'");
        if (mysqli_num_rows($result) > 0) 
        {
            return 10;
            
        }
        else {
            if ($password == $confirm_password)
            {
                $query = "INSERT INTO users VALUES ('$fullname', '$username', '$email', '$password', '$confirm_password', '$gender', '$user_type')";
                mysqli_query($this->conn, $query);
                return 1;
                
            }
            else {
                return 100;
                
            }
        }
    }
}


class Login extends Connection
{
    public $username;
    public function login($username, $password, $user_type)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$username' AND password='$password' AND user_type='$user_type'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0)
        {
            if ($password == $row["password"])
            {
                $this->username = $row["username"];
                return 1;
                // Login successful
            }
            else {
                return 10;
                // Wrong password
            }  
        }
        else {
            return 100;
            // User not registered
        }
    }

    public function idUser() {
        return $this->username;
    }
}


?>