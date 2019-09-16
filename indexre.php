 <?php     
        session_start();
        $id = $_SESSION['id'];
        echo "Name:".$id.'<br>'; 

         $details=array();
         $con2=mysqli_connect('localhost','root','','revaldb1');  
         $query = "SELECT * FROM `name_pass` where email='$id'" ; 
         // mysql_query will execute the query to fetch data 
if ($is_query_run = mysqli_query($con2,$query)) 
{ 
           if(mysqli_num_rows($is_query_run)>0)
    {
        while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
     { 
          echo 'Name: '.$query_executed['name'].'<br>';   
          array_push($details,$query_executed['name']);
          echo 'Department: '.$query_executed['dept'].'<br>';
          array_push($details,$query_executed['dept']);
          echo 'Register_no: '.$query_executed['regno'].'<br>'.'<br>'; 
          array_push($details,$query_executed['regno']);
     }
    }
}


        $scodearr=array();
         $con2=mysqli_connect('localhost','root','','revaldb1');  
         $query = "SELECT * FROM `form_det2` where email='$id'" ;
        if ($is_query_run = mysqli_query($con2,$query)) 
{         echo "hi";
           if(mysqli_num_rows($is_query_run)>0)
    {   echo "hihi";
        while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
     { 
          echo 'email: '.$query_executed['email'].'<br>';   
          array_push($scodearr,$query_executed['scode']);
          echo 'scode: '.$query_executed['scode'].'<br>';
          
     }
    }
}
  echo "<script> disp(); </script>";
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
           {

                 $orderid=$_POST['orderid'];
                 $amount=$_POST['amount'];
                 $email=$_POST['email'];
                 $phone=$_POST['phone'];
                $checked_arr = $_POST['subs'];
                $count = count($checked_arr) ; echo $count;
                $cost=$count*400 + 10;
                $con3= new mysqli('localhost','root','','revaldb1');  
                $stmnt = $con3->prepare("INSERT into applied_sub values(?,?,?)") ; 
                for($i=0;$i<$count;$i++)
                 {
                   $stmnt->bind_param("sss",$id,$orderid,$checked_arr[$i]);
                   $stmnt->execute();
                }

                $stmnt2=$con3->prepare("UPDATE `name_pass` SET rapplied='1' where email='$id'");
                $stmnt2->execute();
                echo "updated";
                echo "<script type='text/javascript'>
                    calll();
                   </script>";
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

                      <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="regno" value="<?php echo $details[0]; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Register Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="regno" value="<?php echo $details[2]; ?>" readonly>
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
                        <div class="form-row m-b-55">
                            <div class="name">Degree</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code" value=" " readonly>
<!--                                             <label class="label--desc">Degree</label> -->
                                        </div>
                                    </div>
                                   <!--  <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="branch" value="<?php echo $details[1]; ?>" readonly>
                                </div>
                            </div>
                        </div>

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
                                    <input class="input--style-5" id='amount' type="text" name="amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="Primary email" name="email" required>
                                </div>
                            </div>
                        </div>
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
                              <div class='checkboxes'>

                                <?php

                                for($i=0;$i<count($scodearr);$i++)
                                   {  
                                  ?>
                                    <input type = 'checkbox' value =<?php echo $scodearr[$i] ?> name = 'subs[]'>
                                    <label for='sub1' id='ssub1'><?php echo $scodearr[$i] ?></label>
                                    <br>
                                  <?php
                                   }
                          
                                ?>
                              </div>
                                <!-- <br>
           
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
                             </div>                         -->
                            </div>

                            <center>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" >Confirm</button>
                        </div>
                    </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <script src="colorlib-regform-5/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="colorlib-regform-5vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-5vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-5vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-5/js/global.js"></script>
    <script type="text/javascript">
      function calll()
      {

         document.getElementById('amount').innerhtml=<?php echo $cost; ?>;
      }

      function disp()
      {
        window.alert("You have already applied for photocopy.Apply for Revaluation")
      }
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>