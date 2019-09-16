
	  <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
             // collect value of input field
                    $name = $_REQUEST['username'];
                    $paa = $_REQUEST['pass'];
                    if (empty($name)) {
                            echo "Name is empty";
                     }
                     else
                    {
                           echo $name.'<br>';
                            $con=mysqli_connect('localhost','root','','revaldb1');

                            if(mysqli_connect_errno())
                                 echo mysqli_connect_errno;
                            else
                                 echo 'connected'.'<br>';
                            $query = "SELECT * FROM `name_pass` where email='$name' and pass='$paa'" ; 

                            // mysql_query will execute the query to fetch data 
                            if ($is_query_run = mysqli_query($con,$query)) 
                            { 
                              // echo "Query Executed"; 
   
                                 if(mysqli_num_rows($is_query_run)>0)
                                 {
                                      // loop will iterate until all data is fetched 
                                      while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
                                     { 
                                            // these four line is for four column 
                                             //echo $query_executed['email'].'        '; 
                                            //echo $query_executed['pass'].'          '; 

                                        if($query_executed['applied']==0 && $query_executed['papplied']==0)
                                           {
                                            session_start();
                                             $_SESSION['id'] = $query_executed['email'];
                                             // Redirect browser 
                                             header("Location:index3.php"); 
                                             exit;
                                            }
                                         else if($query_executed['rapplied']==0)
                                         {
                                         	$_SESSION['id']=$query_executed['email'];
                                         	header("Location:indexre.php");
                                         	exit;
                                         }
                                        else 
                                           {
                                              echo "You have already applied! For any changes please contact COE office";
                                           }
                                             /*  echo 'Name: '.$query_executed['name'].'<br>'; 
                                             echo 'Department: '.$query_executed['dept'].'<br>';
                                            echo 'Register_no: '.$query_executed['regno'].'<br>'.'<br>';  */ 
                                     } 
                                  }
                                 else
                                     echo 'Enter correct email and password'.'<br>';
                             } 
                             else 
                                 echo "Error in execution <br>"; 

                     }
             }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v12/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v12/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v12/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v12/images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>

						<img src="ssnlogo.png" alt="AVATAR">


					<span class="login100-form-title p-t-20 p-b-45">
						Revaluation Form Submission System
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="Login_v12/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v12/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v12/js/main.js"></script>


</body>
</html>