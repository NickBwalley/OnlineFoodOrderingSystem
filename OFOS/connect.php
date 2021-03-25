
<?php 

  $db = mysqli_connect('localhost', 'root', '', 'foodorderingsystem');
//Declare the unique varibles
  $username = "";
  $phone="";
  $email = "";
  $errors=array();

  if (isset($_POST['Register'])) {
      //declaration of variables as they are in database
  	$username = $_POST['username'];
    $phone = $_POST['phone'];
  	$email = $_POST['email'];
    $password = $_POST['password'];
   

  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_p = "SELECT * FROM users WHERE phone='$phone'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";
      
  	$res_u = mysqli_query($db, $sql_u);
  	$res_p = mysqli_query($db, $sql_p);
    $res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $username_error = "<font color=red>Username Already Registered!</font>";
  	}else if(mysqli_num_rows($res_p) > 0){
  	  $phone_error = "<font color=red>Phone Number Already Registered!</font>";
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error ="<font color=red>Email Address Already Registered!</font>";
  	}
      else{
           $query = "INSERT INTO users (username,phone,email,password) 
      	    	  VALUES ('$username','$phone','$email','".md5($password)."')";
           $results = mysqli_query($db, $query);
           echo "<script> alert('Successfully created an Account!'); window.location='login.php'
           </script>";
     exit();
  	}
      
  }
?>