  
<?php
session_start();
//connect to the database
$db = mysqli_connect("localhost", "root", "", "foodorderingsystem");

if(isset($_POST['Login'])){
    //Declare unique variables
    $username="";
    $errors=array();
    
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(count($errors) == 0){
    $password = md5($password);
    //Get data from database
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    
        $results=mysqli_query($db, $sql);
    
    //verify password
    /*$status=password_verify('$password',$password);
    if ($status) {
    echo "Successfully Logined In.Welcome ".$record['full_name'];
        header('location:index.php');
    }*/
    if (mysqli_num_rows($results) == 1) {
        $sqlquery = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
              while ($row = mysqli_fetch_array($sqlquery, MYSQLI_ASSOC)){
                $row['username'];
                $_SESSION['username'] = $row['username'];
                
              }
              //array_push($check_login, '<strong>'. '<span style="color: 00ff00; font-size: 16px;">'."Welcome ".$_SESSION['username']. '</span>'.'</strong>' );
              //echo "<script>setTimeout(\"location.href = 'home.php';\",2000);</script>";
              echo "<script> alert('Welcome!..'); window.location='Index.php' </script>";
    } 
    else{
        echo "<h4 style='color:red'>Invalid username or password.Try again</h4>";
    }
    
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  
</head>
<body>

	<div class="container">

	<div class="bg-info text-white">
		
		<center>
            <h1>Welcome to Online Food Ordering System</h1>
			<span style="font-size:35px">Login Here</span> 
		</center>

	</div>

		<div class="row">

			<div class="col">

					<form method="POST" action="login.php">
					  

					   <div class="mb-3">
                        
					    <label for="exampleInputEmail1" class="form-label" style="font-size:24px">Username</label>
					    <input type="text"  class="form-control" placeholder="Enter username" name="username" required>
                       
					  </div>
					    <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label" style="font-size:24px" >Password</label>
					    <input type="password" class="form-control" placeholder="Enter password" name="password" id="myInput" pattern=".{6,}" title="Must contain at least 6 or more characters" required>
                        </div>
		                <div class="mb-3">
                         <input type="checkbox" onclick="myFunction()"><span style="color:dodgerblue"> Show Password</span>
                            <script>
                                function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                x.type = "text";
                                } 
                                    else{
                                x.type = "password";
                                        }
                                    }
                            </script>

                        </div>
                        <button name="Login" type="submit" class="btn btn-primary">Login</button>
                        <br>
                        <p><a href="forgot.php"style="text-decoration:none;color:dodgerblue;">Forgotten Password</a></p>
                         <p>Not a member?<a href="Register.php"style="text-decoration:none;color:dodgerblue;"> Register</a> </p>
                        <br>              
                                                 
			</form>
        </div>
    </div>
    </div>
    </body>
</html>


