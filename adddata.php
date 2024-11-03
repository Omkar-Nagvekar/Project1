<?php include("connect.php");
//error_reporting(0);
session_start();
$user = $_SESSION['uname'];
if($user == true)
{

}
else
{
    header('location:login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adddata.css">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Project</title>
</head>

<body>
<nav class="navbar">
    <div class="topnav">
        <ul>
            <li><a class="active">Ty Projects</a></li>
            <li><a class="logout" href="logout.php">LogOut</a></li>
        </ul>
    </div>            
</nav>

    <div id="message"></div>

    <div class="container">
        <h1>Student Data</h1>
        <hr>
        <form autocomplete="off" action="" method="POST">
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" class="form-control" name="rno" placeholder="Roll No" required>                
            </div>

            <div class="form-group">
                <label class="lbl">Student Name</label>
                    <input type="text" class="form-control" name="Sname" placeholder="Student Name" required>
            </div>

            <div class="form-group">
                <label>class</label>
                <div class="selectbox">
                    <select name="class" required>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Technology">Information Technology</option>                       
                    </select>
                </div>    
            </div>
                
            <div class="form-group">
                <label>Project Name</label>
                <input type="text" class="form-control" name="pname" placeholder="Project Name" required>                    
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" class="form-control" name="Year" placeholder="Year" required>                    
            </div>
            
            <center>
            <div class="form-groupbtn">
                <button name="submit" id="btn" class="btn" value="AddData">Add Data</button>
            </div>
        </center>
        </form>
    </div>
    <div class="del-upd">
            <h2>Check Project Lists</h2>
            <div>
                <button class="itb" id="itb" >IT</button>
                    <script type="text/javascript">
                        document.getElementById("itb").onclick = function() {
                            location.href = "adminit.php";
                        };
                    </script>
                <button class="csb" id="csb">CS</button>
                    <script type="text/javascript">
                        document.getElementById("csb").onclick = function() {
                            location.href = "admincs.php";
                        };
                    </script>
            </div> 
    </div>

</body>

</html>


<?php

if(isset ($_POST['submit']))
{
    $rn = $_POST['rno'];
    $sn = $_POST['Sname'];
    $cl = $_POST['class'];
    $pn = $_POST['pname'];
    $yr = $_POST['Year'];

    if ($rn != "" && $sn != "" && $cl != "" && $pn != "" && $yr != "")
    {

    $query ="INSERT INTO STUDENT VALUES('$rn','$sn','$cl','$pn','$yr')";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo "<script> alert('data incerted into database')</script>";
    }
}
    else
    {
        echo "faild";
    }
    
}
?>