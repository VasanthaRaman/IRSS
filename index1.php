<?php
	
	require_once "config2.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
  		{
             // collect value of input field
            $name = $_REQUEST['username'];
            $paa = $_REQUEST['pass'];
            if (empty($name)) 
               {
             		echo "Name is empty";
               }
            else
               {
               		 $query = "SELECT * FROM `name_pass` where email='$name'" ;
               		 $query2="UPDATE name_pass SET pass='$paa' where email='$name'";
               		 if ($is_query_run = mysqli_query($con,$query)) 
                            { 
                               echo "Query Executed"; 
                                 if(mysqli_num_rows($is_query_run)>0)
                                 {	echo "la1"; 
                                      // loop will iterate until all data is fetched 
                                      while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
                                      {echo "la2";
                                      		if($query_executed['pass']==0)
                                          		 { 
                                          		 		if($is_query_run2=mysqli_query($con,$query2))
                                          		 		{
                                          		 			 echo "Query Executed2"; 
                                           	 			session_start();
                                             			// $_SESSION['id'] = $query_executed['email'];
                                             			// Redirect browser 
                                            			 header("Location:index2.php"); 
                                             			 exit;
                                             			}
                                             			else
                                             			{
                                             				echo "Database Error!";
                                             			}
                                            	 }
                                           else
                                           		{
                                             		 echo "You have already Registered! Please visit login page.";
                                           		}

                                      }
                                 }
                                 else
                                 {
                                 	echo "blah";
                                 }
                            }
                }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v16/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v16/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v16/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v16/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				&nbsp&nbsp&nbsp&nbsp
				<img src="ssnlogo.png" width="90%">
				<span class="login100-form-title p-b-41">
				  IRSS Account Signup
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="username" placeholder="SSN Email ID">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input id="pass" class="input100" type="password" name="pass" placeholder="Password" onkeyup='check();'>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input id="confirmpass" class="input100" type="password" name="pass" placeholder="Confirm Password" onkeyup='check();'>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						<span id='message' align='center'></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" id="submit" type="submit" disabled>
							Sign Up
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="Login_v16/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v16/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v16/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login_v16/js/main.js"></script>

	<script type="text/javascript">
		
		var check = function() {
			// document.getElementById('message').style.textAlign='right';

   if(document.getElementById('pass').value=='')
   {
   		 document.getElementById('message').innerHTML='';
   		 document.getElementById('submit').disabled = true;
      	document.getElementById('submit').style.background = 'red';
    }
  else if (document.getElementById('pass').value ==
    document.getElementById('confirmpass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Matching';
     document.getElementById('submit').disabled = false;
     document.getElementById('submit').style.background = 'green';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Not Matching';
      document.getElementById('submit').disabled = true;
      document.getElementById('submit').style.background = 'red'
  }
}
	</script>

</body>
</html>