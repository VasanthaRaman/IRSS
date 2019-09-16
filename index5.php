<?php 
            session_start();
        $det = $_SESSION['det'];
        // $pidd=$_SESSION['pidd'];
        $orderid=$_SESSION['orderid'];
        $amount=$_SESSION['amount'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['phone'];
        $subs=$_SESSION['subs'];

         $id = $_SESSION['id'];

        // echo "<h4> <center> Form Preview </center> </h4>";
        // echo "<center>";
  
        // echo 'YOUR DETAILS:<br>';
        // echo 'Name: '.$det[0].'<br>';
        // echo 'Department: '.$det[1].'<br>';         
        // echo 'Register_no: '.$det[2].'<br>'.'<br>'; 
        // echo 'Paytm Order ID : ';
        // echo $orderid."<br>"."<br>";

        // echo 'Subjects:<br>'; 
        // for($i=0;$i<sizeof($subs);$i++)
        // {
        //     echo $subs[$i]."<br>";
        // }

        // echo "</center>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            echo "hii";
            $con2= new mysqli('localhost','root','','revaldb1');  
            $stmnt = $con2->prepare("INSERT into form_det2 values(?,?,?)") ; 
            for($i=0;$i<sizeof($subs);$i++)
            {
              $stmnt->bind_param("sss",$id,$orderid,$subs[$i]);
              $stmnt->execute();
            }
            $stmnt2=$con2->prepare("UPDATE `name_pass` set applied='1' where regno=$det[2]");
            $stmnt2->execute();
            $stmnt3=$con2->prepare("UPDATE `name_pass` set papplied='1' where regno=$det[2]");
            $stmnt3->execute();
            echo "Your response has been received!";
            header( "refresh:5;url=index2.php" );
            exit;
        }
        

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="colorlib-regform-5/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-5/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="colorlib-regform-5/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-5/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-5/css/main.css" rel="stylesheet" media="all">

    <style type="text/css">
        
        .movup
        {
            
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Revaulation Subjects Form</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                       <!--  <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" value="<?php echo $det[0]; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Regno</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="regno" value="<?php echo $det[2]; ?>" readonly>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Student ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="studentID" value=" " readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Paytm Order ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="orderid" value="<?php echo $orderid; ?>" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Amount</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="amount" value="<?php echo $amount; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="<?php echo $email; ?>" readonly>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php echo $phone; ?>" name="phone" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <?php
                                for( $j=1,$i=0;$i<count($subs);$i++,$j++)
                                {  
                                ?> 
                                    <div class='form-row'>
                            <div class='name'><?php echo "Subject".$j ; ?></div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input class='input--style-5' type='text' name='subb' value="<?php echo $subs[$i] ; ?>" readonly >
                                </div>
                            </div>
                        </div>
                        <?php 

                                }




                        ?>
                       <!--  <div class="form-row p-t-20">
                            <label class="label label--block">Are the enterd details correct?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->

                        <div class="movup" align="left">   
                            <button type="button" class="btn btn--radius-2 btn--red" onclick="window.location.href='index3.php'">Edit</button> 
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                             <button class="btn btn--radius-2 btn--red" type="submit">Confirm</button>
                        </div> 
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="colorlib-regform-5/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="colorlib-regform-5/vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-5/vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-5/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-5/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->