<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$class=$_POST['class'];
$stid=$_POST['Regno']; 
$g1=$_POST['grade1'];
$g2=$_POST['grade2'];
$g3=$_POST['grade3'];
$g4=$_POST['grade4'];
$g5=$_POST['grade5'];
$insert="INSERT into marks values('$stid',1,1,?,?),('$stid',1,1,?,?),('$stid',1,1,?,?),('$stid',1,1,?,?),('$stid',1,1,?,?);";
$arr1 = array($row[0],$g1,$row[1],$g2,$row[2],$g3,$row[3],$g4,$row[4],$g5);
if( $insert==false ) {
        
    echo "<script>alert('Something went wrong. Please try again');</script>";
   echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
}
else 
{   
echo "<script>alert('Result Added Successfully');</script>";
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";

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
        <title>RIT RMS Admin| Add Result </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "get_student.php",
    data:'classid='+val,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "get_student.php",
        data:'classid1='+val,
        success: function(data){
            $("#subject").html(data);
            
        }
        });
}
    </script>
<script>

function getresult(val,clid) 
{   
    
var clid=$(".clid").val();
var val=$(".stid").val();;
var abh=clid+'$'+val;
//alert(abh);
    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>


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
                                    <h2 class="title">Declare Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                        <label for="default" class="col-sm-2 control-label">Enter Student Results</label>
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
                                            <div class="panel-body">

                                                <form class="form-horizontal" method="post">

                                                <div class="form-group">
                                                <?php 
                                                $dptno= $_GET['dept-no'];
$sql ="SELECT sub_id from semester where Dept_no = ? ";
$query1 = sqlsrv_query($conn,$sql,array($dptno), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
$count=0;
if( $query1 === false ) {
  die( print_r( sqlsrv_errors(), true));
}
$norows =sqlsrv_num_rows( $query1 );
// $row1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_NUMERIC);
while ($row1 = sqlsrv_get_field($query1,0)) {
    
    $row[$count]=$row1[0];
    $count=$count+1;
}
?>
<label for="default" class="col-sm-5 control-label"><?php echo $row[0];?> CS8464</label><br>
<div class="col-sm-13">
<?php  
?>
<input type="radio" name="grade1" value="O" required="required" >O <input type="radio" name="grade1" value="A+" required="required">A+<input type="radio" name="grade1" value="A" required="required">A
<input type="radio" name="grade1" value="B+" required="required">B+ <input type="radio" name="grade1" value="B" required="required">B <input type="radio" name="grade1" value="RA" required="required">RA
<?php ?>
</div>
<label for="default" class="col-sm-5 control-label"><?php echo $row[1];?>MA8161</label><br>
<div class="col-sm-13">
<?php  
?>
<input type="radio" name="grade2" value="O" required="required" >O <input type="radio" name="grade2" value="A+" required="required">A+<input type="radio" name="grade2" value="A" required="required">A
<input type="radio" name="grade2" value="B+" required="required">B+ <input type="radio" name="grade2" value="B" required="required">B <input type="radio" name="grade2" value="RA" required="required">RA
<?php ?>

</div>
<label for="default" class="col-sm-5 control-label"><?php echo $row[2];?>CS8161</label><br>
<div class="col-sm-13">
<?php  
?>
<input type="radio" name="grade3" value="O" required="required" >O <input type="radio" name="grade3" value="A+" required="required">A+<input type="radio" name="grade3" value="A" required="required">A
<input type="radio" name="grade3" value="B+" required="required">B+ <input type="radio" name="grade3" value="B" required="required">B <input type="radio" name="grade3" value="RA" required="required">RA
<?php ?>

</div>
<label for="default" class="col-sm-5 control-label"><?php echo $row[3];?>CS8191</label><br>
<div class="col-sm-13">
<?php  
?>
<input type="radio" name="grade4" value="O" required="required" >O <input type="radio" name="grade4" value="A+" required="required">A+<input type="radio" name="grade4" value="A" required="required">A
<input type="radio" name="grade4" value="B+" required="required">B+ <input type="radio" name="grade4" value="B" required="required">B <input type="radio" name="grade4" value="RA" required="required">RA
<?php ?>

</div>
<label for="default" class="col-sm-5 control-label"><?php echo $row[4];?>CS7162</label><br>
<div class="col-sm-13">
<?php  
?>
<input type="radio" name="grade5" value="O" required="required" >O <input type="radio" name="grade5" value="A+" required="required">A+<input type="radio" name="grade5" value="A" required="required">A
<input type="radio" name="grade5" value="B+" required="required">B+ <input type="radio" name="grade5" value="B" required="required">B <input type="radio" name="grade5" value="RA" required="required">RA
<?php ?>


</div>
</div>
 </select>

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
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
<?PHP  ?>
