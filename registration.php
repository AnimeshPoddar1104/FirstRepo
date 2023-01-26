<?php
$registration = false;
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["firstname"];
    $password = $_POST["psw"];
    $cpassword = $_POST["cpsw"];
    $contact = $_POST["Contact"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `registration` ( `name`, `password`, `contact` , `email` , `gender` , `dob` , `address`) VALUES ('$username', '$password', '$contact' , '$email' , '$gender' , '$dob' , '$address')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }else{
          echo mysqli_errno($conn);
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>registration . Dastavej</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/registration.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/registration.js"></script>
</head>
<body>

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
<div class="container">
<form action="registration.php" method="POST">
<center> <h1> Registeration Form</h1> </center>
<hr>
<label> <b>Name</b> </label>
<input type="text" placeholder="Name" name="firstname"id="fname"
size="15"/> <br>
<label for="psw"><b>Password</b></label> 
<input type="password" placeholder="Password" name="psw"id="pd"
required>
<br>
<label for="cpsw"><b>Confirm Password</b></label> 
<input type="password" placeholder="CPassword" name="cpsw"id="pd"
required>
<br>
<label>
<b>Contact</b>
</label>
<input type="text" name="Contact" placeholder="Contact Number"id="contact"
size="10"/ required>
<br>
<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email"id="email"
required>
<br>
<div>
<label>
<b>Gender : </b>
</label><br>
<input type="radio" value="Male" name="gender" checked > Male
<input type="radio" value="Female" name="gender"> Female 
<input type="radio" value="Other" name="gender"> Other
</div>
<label><b>Date of birth :</b></label><br>
 <input type="date"  name="dob">
<b>Address : </b>
<textarea cols="80" rows="5" placeholder="Address" name="address"
required>
</textarea>
<button onclick="val()" class="registerbtn">Register</button>
</form>
</div>
</div>

</body>

</html>