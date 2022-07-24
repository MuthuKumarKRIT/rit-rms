<?php
session_start();
error_reporting(0);
include('includes/config.php');
function getData(){
    $data=array();
//    $data[1]=$_POST['reg-no'];
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
if(isset($_POST['update']))
{
    $sid=($_GET['regno']);        
    $info=getData();

    $update="UPDATE Student SET Name= ?,DOB= ?,Gender= ?,DeptNO= ?,Batch= ?,MobileNO= ? where RegNO= ?;";
    $arr1 = array($info[2],$info[3],$info[4],$info[5],$info[6],$info[7],$sid);
    $query1 = sqlsrv_query($conn,$update,$arr1);
    if( $query1 === false ) {

        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-student.php'; </script>";
    }
else 
{   
    echo "<script>alert('Updated Successfully');</script>";
}

}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RIT RMS Admin| Edit Student < </title>
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
                                    <h2 class="title">Edit Student Entry</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage-students.php"><i class="fa fa-sub"></i>Manage Student Details</a></li>
                                        <li class="active">Student Entry</li>
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
                                                <?php 
                                                $stid= $_GET['regno'];
$sql ="SELECT * FROM Student Where RegNo= '$stid' ";
$query1 = sqlsrv_query($conn,$sql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if( $query1 === false ) {
  die( print_r( sqlsrv_errors(), true));
}
$norows =sqlsrv_num_rows( $query1 );
$row = sqlsrv_fetch_array($query1, SQLSRV_FETCH_NUMERIC);
    ?>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Register Number</label>
<div class="col-sm-10">
<input type="text" name="reg-no" class="form-control" id="number" value="<?php echo $row[0];?>" minlength="12" maxlength="12" required="required" autocomplete="off" readonly>
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" id="name"  value="<?php echo $row[1];?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Date of Birth</label>
<div class="col-sm-10">
<input type="date" name="dob" class="form-control" id="date" value="<?php echo $row[2];?>" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<?php  $gndr=$row[3];
if($gndr=="Male")
{
?>
<input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Female")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Other")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>Other
<?php }?>


</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Department Number</label>
<div class="col-sm-10">
<input type="text" name="dept-no" class="form-control" id="number" value="<?php echo $row[4];?>" maxlength="3" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Batch</label>
<div class="col-sm-10">
<input type="text" name="batch" class="form-control" id="Batch" value="<?php echo $row[5];?>" maxlength="4" required="required" autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Mobile Number</label>
<div class="col-sm-10">
<input type="tel" name="mobile" class="form-control" id="mobile" value="<?php echo $row[6];?>" maxlength="10" required="required" autocomplete="off">
</div>
</div>                                                       

                                                    
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
<!--?PHP } ?-->
