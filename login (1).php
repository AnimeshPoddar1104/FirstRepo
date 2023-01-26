<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["firstname"];
    $password = $_POST["psw"]; 
    
     
    $sql = "Select * from registration where name='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['firstname'] = $username;
        header("location: profile.html");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login . Dastavej</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/style.js"></script>

</head>
<body>
  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
  <!-- navigation bar -->


<div class="topnav" id="myTopnav">
  <a href="index.html" class="active">Home</a>
  <a href="login.php">Login</a>
  <a href="registration.php">Registration</a>
  <a href="PROJECT PANEL.html">Project panel</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  

  <!-- Navigation bar end -->

<div class="bg-img">
  <form action="login.php" method="POST"class="container">
    <div class="row">
      <h1 style="color: black"></h1>
      <div class="vl">
        <span class="vl-innertext"></span>
      </div>


      <div>
        <div class="hide-md-lg">
          <p></p>
        </div>
    <h1 style="color: black">Login</h1>

    <label for="email"><p><b style="color: black">Email</b></p></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><p><b style="color: black">Password</b></p></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    
    <button type="submit" class="registerbtn">Login</button>
    <button onclick="document.location='forgot.html'" class="registerbtn">Forgot Password</button>
  </form>

</div>
</html>