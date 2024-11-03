<?php include("connect.php");
//error_reporting(0);

$rn = $_GET['rn'];

$query = "DELETE FROM STUDENT WHERE Roll_No ='$rn'";
$data = mysqli_query($conn, $query);

if($data)
{
    echo "<script>alert('Record Deleted Successfully');
    location.replace('http://localhost/VSCode/adddata.php')
    </script>";
}
else{
    echo "<script> alart('faild')</script>";
}

?>