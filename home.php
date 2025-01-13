<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
</head>
<body>
  <h1>This is the homepage.</h1>
  <?php echo "Welcome, "?><strong><?php echo $_SESSION['username'];?></strong><?php echo" !<br>";?>
  <a href="logout.php">Log out</a>
</body>
</html>