<?php
session_start();
error_reporting(0);
include('includes/config.php');
function getData(){
    $data=array();
    $data[1]=$_POST['reg-no'];
    $data[2]=$_POST['name'];
    $data[3]=$_POST['dob'];
    $data[4]=$_POST['gender'];
    $data[5]=$_POST['dept-no'];
    $data[6]=$_POST['batch'];
    $data[7]=$_POST['mobile'];
    return $data;
}
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
else{
if(isset($_POST['insert']))
{
    $info=getData();
    $insert="INSERT INTO [Student] ([RegNO]
    ,[Name]
    ,[DOB]
    ,[Gender]
    ,[DeptNO]
    ,[Batch]
    ,[MobileNO]) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]')";
    $query1 = sqlsrv_query($conn,$insert,array(), array( "SendStreamParamsAtExec" => true ));
    if( $query1 === false ) {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location = 'add-students.php'; </script>";
    }
else 
{   
    echo "<script>alert('Created Successfully');</script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RIT RMS Admin| Student Admission< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Create Student Entry</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Create Student Entry</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Student Details</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form class="form-horizontal" method="post">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Register Number</label>
<div class="col-sm-10">
<input type="text" name="reg-no" class="form-control" id="number" minlength="12" maxlength="12" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" id="name"  required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Date of Birth</label>
<div class="col-sm-10">
<input type="date" name="dob" class="form-control" id="date"  required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Department Number</label>
<div class="col-sm-10">
<input type="text" name="dept-no" class="form-control" id="number" maxlength="3" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Batch</label>
<div class="col-sm-10">
<input type="text" name="batch" class="form-control" id="Batch" maxlength="4" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Mobile Number</label>
<div class="col-sm-10">
<input type="tel" name="mobile" class="form-control" id="mobile" maxlength="10" required="required" autocomplete="off">
</div>
</div>                                               
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="insert" class="btn btn-primary">submit</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
