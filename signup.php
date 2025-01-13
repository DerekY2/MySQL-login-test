<?php
  $success=0;
  $user=0;

  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);
    $cpassword=htmlspecialchars($_POST['cpassword']);

    $checkUsername = mysqli_query($con,"SELECT * FROM registration WHERE username='$username'");
    if(mysqli_num_rows($checkUsername)){
      // echo"Username already exists!";
      $user=1;
    }else{
      if($password===$cpassword){
        $hpassword = password_hash($password, PASSWORD_BCRYPT);
        $sql="INSERT INTO registration(username,password)
        values('$username','$hpassword')";
        $result=mysqli_query($con,$sql);
        if($result){
          $success=1;
          header('location:login.php');
        }
        else{
          die(mysqli_error($con));
        }
      }else{
        echo "Passwords do not match!";
      }
    }
  }

  if($user){
    echo 'Username already taken.';
  }
  if($success){
    echo 'Successfully signed up';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign-up</title>
</head>
<body>
  <div class="container">
    <form action="signup.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" name="username" placeholder="Enter your username"><br>
      <label for="password">Password:</label><br>
      <input type="password" name="password" placeholder="Enter your password"><br>
      <label for="password">Confirm password:</label><br>
      <input type="password" name="cpassword" placeholder="Confirm your password"><br>
      <input type="submit" name="login" value="Sign up"><br>
      <a href="login.php">Already registered?</a>
    </form>
  </div>
</body>
</html>