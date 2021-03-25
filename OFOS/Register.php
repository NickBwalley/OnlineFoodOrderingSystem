<?php include('connect.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
    label{
    font-size:24px;
    }
    </style>
</head>
<body>
	<div class="container">

	<div class="bg-info">
		
		<center>
            <h1>Welcome to Online Food Ordering System</h1>
			<span style="font-size:30px">Create An Account</span>
        </center>

	</div>

		<div class="row">
			
			<div class="col">

					<form method="POST" action="Register.php">
                        
					  <div class="mb-3">
                          <div <?php if (isset($username_error)): ?> class="form_error" <?php endif ?> ></div>
					    <label>Username</label>
					    <input type="text" class="form-control"  placeholder="Enter username" name="username" value="<?php echo $username; ?>" pattern="^[A-Za-z0-9]{1, 15}" required>
                          <?php if (isset($username_error)): ?>
	  	                  <span><?php echo $username_error; ?></span>
	                      <?php endif ?>
					  </div>

					   <div class="mb-3">
                        <div<?php if (isset($phone_error)): ?> class="form_error" <?php endif ?> ></div>
					    <label>Phone Number</label>
					    <input type="tel" name="phone" class="form-control" placeholder="Enter phone Number"  value="<?php echo $phone;?>" 
                        pattern="[0][1,7][0-9]{8}"Title="Must contain the format 07/01-123445678"required>
					 <?php if (isset($phone_error)): ?>
	  	             <span><?php echo $phone_error; ?></span>
	                 <?php endif ?>
					  </div>

					   <div class="mb-3">
                        <div<?php if (isset($email_error)): ?> class="form_error" <?php endif ?> ></div>
					    <label>Email Address</label>
					    <input type="email" class="form-control" placeholder="Enter valid Email Address" name="email" pattern="[A-za-z0-9].+@gmail.com"size="30" required>
					    <?php if (isset($email_error)): ?>
	  	               <span><?php echo $email_error; ?></span>
	                   <?php endif ?>
					  </div>

					    <div class="mb-3">
					    <label>Date of Birth</label>
					    <input type="date" class="form-control" name="birthdate" required>
					
					  </div>
                        
                         <div class="mb-3">
					    <label>Password</label>
					    <input type="password" placeholder="Enter password" id="txtNewPassword" class="form-control" name="password" pattern=".{6,}" title="Must contain at least 6 or more characters" required>
					
					  </div>
					   <div class="mb-3">
					    <label>Confirm Password</label>
					    <input type="password" id="txtPassword_2" placeholder="Confirm your Password" class="form-control" name="password_2" pattern=".{6,}" title="Must contain at least 6 or more characters" required>
                        </div>
				<div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
           </div>
   <script>
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var password_2 = $("#txtPassword_2").val();
        if (password == password_2)
            $("#CheckPasswordMatch").html("Passwords match");
        else
            $("#CheckPasswordMatch").html("Passwords do not match.");
    }
    $(document).ready(function () {
       $("#txtPassword_2").keyup(checkPasswordMatch);
    });
    </script> 
    
			  <button name="Register" type="submit" class="btn btn-primary">Register</button>
           
        <p> Already a member? <a href="login.php" style="text-decoration:none;">Login</a></p>
        
			</form>
            </div>
        </div>
    </div>
    </body>
</html>