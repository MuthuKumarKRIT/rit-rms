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
    $stid=($_GET['reg-no']);
    echo $stdid;        
    $info=getData();
    echo "$info[2]";
   // $update="UPDATE Student SET DeptNo=104 where Regno=$stdid";
    $update="UPDATE Student SET Name=$info[2],DOB=$info[3],Gender=$info[4],DeptNO=$info[5],Batch=$info[6],MobileNO=$info[7] where RegNO=$row[0];";
    $query1 = sqlsrv_query($conn,$update,array(), array( "SendStreamParamsAtExec" => true ));
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