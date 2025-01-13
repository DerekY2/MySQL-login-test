<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=htmlspecialchars($_POST['username']);
  $password=htmlspecialchars($_POST['password']);

  $checkUsername = mysqli_query($con,"SELECT * FROM registration WHERE username='$username'");
  if(mysqli_num_rows($checkUsername)){
    $row = mysqli_fetch_assoc($checkUsername);
    $hashed=$row['password'];
    if(password_verify($password,$hashed)){
      echo"Login successful!";
      session_start();
      $_SESSION['username']=$username;
      header('location:home.php');
    }
    else{
      echo "Invalid login - password";
    }
  }
  else{
    echo"Invalid login.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
</head>
<body>
  <div class="container">
    <form action="login.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" name="username" placeholder="Enter your username"><br>
      <label for="password">Password:</label><br>
      <input type="password" name="password" placeholder="Enter your password"><br>
      <input type="submit" name="login" value="Log in"><br>
      <a href="signup.php">Not registered?</a>
    </form>
  </div>
</body>
</html>