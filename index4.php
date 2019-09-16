<?php 
            session_start();
        $subarr = $_SESSION['subarr'];
        $subnamearr=$_SESSION['subnamearr'];
        $det = $_SESSION['det'];
        $subcount= $_SESSION['subcount'];
         $id = $_SESSION['id'];
        //$pidd=$_SESSION['pidd'];
          if ($_SERVER["REQUEST_METHOD"] == "POST") 
           {
             echo "<script type='text/javascript'>
                    calll();
                   </script>";
         $checked_arr = $_POST['subs'];
         $orderid=$_POST['orderid'];
         $amount=$_POST['amount'];
         $email=$_POST['email'];
         $phone=$_POST['phone'];
         $count = count($checked_arr) ;
         $cost=$count*300 + 10;
         echo "There are ".$count." checkboxe(s) are checked";
         for( $i=0;$i<$count;$i++)
            echo "<br>".$checked_arr[$i];
        if($count>5)
             echo "<br>You can select a maximum of 5 subjects only!";
         else if($count<=5)
         {
             session_start();
             $_SESSION['det']=$det;
             $_SESSION['orderid']=$orderid;
             $_SESSION['amount']=$amount;
             $_SESSION['email']=$email;
             $_SESSION['phone']=$phone;
             $_SESSION['subs'] = $checked_arr;
             $_SESSION['orderid']=$orderid;
             $_SESSION['subcount']=$subcount;
             $_SESSION['subarr']= $subarr;
             $_SESSION['subnamearr']= $subnamearr;
             $_SESSION['id']=$id;
             header("Location:index5.php"); 
             exit;
          }
           
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
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="colorlib-regform-5/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-5/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-5/css/main.css" rel="stylesheet" media="all">
    <style type="text/css">

    .checkboxes {
        white-space: nowrap;
     }

    .checkboxes input{
width: 13px;
  height: 13px;
  padding: 0;
  margin:0;
  vertical-align: bottom;
  position: relative;
  top: -1px;
  *overflow: hidden;
     }

     .checkboxes label{
  display: block;
  padding-left: 15px;
  text-indent: -15px;
     }

     #rr-element {
    white-space: nowrap;
}

#rr-element label {
   padding-right: 155.4px   ;
}
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Revaluation Form Details</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<!--                         <div class="form-row m-b-55">
                            <div class="name">Order ID</div>
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
                            <div class="name">Paytm Order ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="orderid" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Amount</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="form-row m-b-55">
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
                        <div class="form-row">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject(s)</div> 
                           <!--  <div class="value">
                                <div class="input-group"> -->
                            <div class="checkboxes">
           
            <input type = "checkbox" value = <?php echo  $subarr[0].' : '. $subnamearr[0] ?> name = "subs[]"/>
             <label for="sub1" id="ssub1"><?php echo  $subarr[0].' : '. $subnamearr[0] ?></label>

            <br>
           
            <input type = "checkbox" value = <?php echo  $subarr[1].' : '. $subnamearr[1] ?> name = "subs[]"/>
             <label for="sub2" id="ssub2"><?php echo  $subarr[1].' : '. $subnamearr[1] ?></label>

            <br>
            
            <input type = "checkbox" value = <?php echo  $subarr[2].' : '. $subnamearr[2] ?> name = "subs[]"/> 
            <label for="sub3" id="ssub3"><?php echo  $subarr[2].' : '. $subnamearr[2] ?></label>
          
            <br>
           
            <input type = "checkbox" value = <?php echo  $subarr[3].' : '. $subnamearr[3] ?> name = "subs[]"/>
             <label for="sub4" id="ssub4"><?php echo  $subarr[3].' : '. $subnamearr[3] ?></label>
            <br>

            <input type = "checkbox" value = <?php echo  $subarr[4].' : '. $subnamearr[4] ?> name = "subs[]"/> 
             <label for="sub5" id="ssub5"><?php echo  $subarr[4].' : '. $subnamearr[4] ?></label>

            <br>
            <input type = "checkbox" value = <?php echo  $subarr[5].' : '. $subnamearr[5] ?> name = "subs[]"/>
            <label for="sub6" id="ssub6"><?php echo  $subarr[5].' : '. $subnamearr[5] ?></label>
            <br> 
            </div>
                                    <!-- <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                            <option>Subject 4</option>
                                            <option>Subject 5</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div> -->

<!--                                 </div>
                            </div> -->
                        </div>
<!--                         <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
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

                        <center>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" >Next</button>
                        </div>
                    </center>
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
        <script type="text/javascript">
      function calll()
      {

         document.getElementById('amount').innerhtml=<?php echo $cost; ?>;
      }
    </script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->