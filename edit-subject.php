<?php
session_start();
error_reporting(0);
include('includes/config.php');
function getData(){
    $data=array();
    $data[1]=$_POST['dept-no'];
    $data[2]=$_POST['sem-no'];
    $data[3]=$_POST['sub-code'];
    $data[4]=$_POST['credit'];
    return $data;
}
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(isset($_POST['update']))
        {
            $sid=($_GET['subjectid']);        
            $info=getData();
            $update="UPDATE Semester SET Dept_NO= ?,Sem_NO= ?,Sub_ID= ?,credits= ? where Sub_ID= ?;";
            $arr1 = array($info[1],$info[2],$info[3],$info[4],$sid);
            $query1 = sqlsrv_query($conn,$update,$arr1);
            if( $query1 === false ) {
        
                echo "<script>alert('Something went wrong. Please try again');</script>";
               echo "<script type='text/javascript'> document.location = 'manage-student.php'; </script>";
            }
        else 
        {   
            echo "<script>alert('Updated Successfully');</script>";
        }
        
        }
        }?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RIT RMS|Admin Update Course </title>
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
                                    <h2 class="title">Update Course</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage-subjects.php"><i class="fa fa"></i>Manage Course</a></li>
                                        <li class="active">Update Course</li>
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
                                                    <h5>Update Course</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post">

 <?php
$sid=($_GET['subjectid']);
$sql = "SELECT * from Semester where Sub_ID='$sid'";
$query1 = sqlsrv_query($conn,$sql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if( $query1 === false ) {
  die( print_r( sqlsrv_errors(), true));
}
$norows=sqlsrv_num_rows( $query1 );
$cnt=1;
    while ($row = sqlsrv_fetch_array($query1, SQLSRV_FETCH_NUMERIC))
{   ?>                                               
                                                    
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Department Number</label>
<div class="col-sm-10">
<input type="text" name="dept-no" class="form-control" id="number" value="<?php echo $row[0];?>" minlength="3" maxlength="3" required="required" autocomplete="off">
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Semester Number</label>
<div class="col-sm-10">
<input type="text" name="sem-no" class="form-control" id="number" value="<?php echo $row[1];?>" minlength="1" maxlength="1" required="required" autocomplete="off">
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Subject Code</label>
<div class="col-sm-10">
<input type="text" name="sub-code" class="form-control" id="number" value="<?php echo $row[2];?>" minlength="6" maxlength="6" required="required"  autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Credits</label>
<div class="col-sm-10">
<input type="text" name="credit" class="form-control" id="number" value="<?php echo $row[3];?>" minlength="1" maxlength="1" required="required" autocomplete="off">
</div>
<?php}?>
                                                    
<div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="update" class="btn btn-warning">Update</button>
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
