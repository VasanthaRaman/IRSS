 <?php     
        session_start();
        $id = $_SESSION['id'];
        //echo "Name:".$id.'<br>'; 
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

                $subarray = array(); 
                $subnamearr= array();static  $i=0;
                 $con2=mysqli_connect('localhost','root','','revaldb1');  
                               if ($_SERVER["REQUEST_METHOD"] == "POST") 
                    {
                              $sn = $_REQUEST['semmchoice']; $sn=$sn-1; echo "$sn"; //get previous sem
                              $ac = $_REQUEST['arrearchoice'];
                              // $subcount=$_REQUEST['subcount'];

                                //$qq= $query_executed['dept']; echo "$qq";
                            if($ac == "no")
                        {
                            $query2 = "SELECT * FROM `subjects`,`sub_list` where sem='$sn'and dept='$details[1]' and subjects.scode=sub_list.scode" ; 

                            // mysql_query will execute the query to fetch data 
                            if ($is_query_run = mysqli_query($con2,$query2)) 
                            { 
                               echo "Query Executed"; 
                                $subrowcount=mysqli_num_rows($is_query_run);
                                 if(mysqli_num_rows($is_query_run)>0)
                                 {  echo "klklk";
                                      // loop will iterate until all data is fetched 
                                      while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
                                     { 
                                            echo 'Scode: '.$query_executed['scode'].'<br>';
                                            array_push($subarray,$query_executed['scode']);
                                            array_push($subnamearr,$query_executed['sname']);
                                            $i=$i+1;
                                     }

                                           session_start();
                                           $_SESSION['subarr'] = $subarray;
                                           $_SESSION['subnamearr']= $subnamearr;
                                           // $_SESSION['pidd']=$_REQUEST['pid'];
                                           $_SESSION['det']=$details;
                                           $_SESSION['subcount']=$subcount;
                                           $_SESSION['id']=$id;
                                            header("Location:index4.php"); 
                                            exit;
                                  }
                            }

                            else
                                echo 'Error with query';
                        }

                        if($ac=="yes")
                        {
                            echo "disappointment";
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
    <link href="colorlib-regform-5/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-5/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="colorlib-regform-5/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-5/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-5/css/main.css" rel="stylesheet" media="all">
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
<!--                         <div class="form-row m-b-55"> -->
                           <!--  <div class="name">Name</div> -->
<!--                             <div class="value">
                                <div class="row row-space"> -->
                                   <!--  <div class="col-2">
                                        <div class="input-group-desc"> -->
                                            <!-- <input class="input--style-5" type="text" name="name" value="<?php echo $details[0];?>" readonly> -->
<!--                                             <label class="label--desc">name</label> -->
                                      <!--   </div>
                                    </div> -->
                                   <!--  <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div> -->
<!--                                 </div>
                            </div> -->
<!--                         </div> -->
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
                            <div class="name">Current Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="semchoice" name="semmchoice">
                                             <!-- <option disabled="disabled" selected="selected">Choose option</option> -->
                                                <!-- <option value="1">1 </option> -->
                                                <option value="2">2 </option>
                                                <option value="3">3 </option>
                                                <option value="4">4 </option>
                                                <option value="5">5 </option>
                                                <option value="6">6 </option>
                                                <option value="7">7 </option>
                                                <option value="8">8 </option>
                                                <option value="9">Graduated</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  <div class="form-row">
                            <div class="name">No. Of Subjects</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="subcount" name="subcount">
                                             <option disabled="disabled" selected="selected">Choose option</option>
                                                <option value="1">1 </option>
                                                <option value="2">2 </option>
                                                <option value="3">3 </option>
                                                <option value="4">4 </option>
                                                <option value="5">5 </option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row p-t-20">
                            <label class="label label--block">Arrear(s)</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="arrearchoice" value="yes">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="arrearchoice" value="no">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Next</button>
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