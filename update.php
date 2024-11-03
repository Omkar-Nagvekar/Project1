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
$rn = $_GET['rn'];

$query = "SELECT * FROM STUDENT WHERE Roll_No ='$rn'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);
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

    <title>Update Data</title>
</head>

<body>
<nav class="navbar">
        <div class="topnav"> 
            <a class="active" href="index.html">Ty Projects</a>
          </div>
                 
    </nav>

    <div id="message"></div>

    <div class="container">
        <h1>Update Student Data</h1>
        <hr>
        <form autocomplete="off" action="" method="POST">
            <div class="form-group">
                <label>Roll No</label>
                <input type="text" class="form-control" name="rno" value="<?php echo $result['Roll_No']; ?>" placeholder="Roll No" required>                
            </div>
            <div class="form-group">
                <label >Student Name</label>
                    <input type="text" class="form-control" name="Sname" value="<?php echo $result['Student_Name']; ?>" placeholder="Student Name" required>
            </div>
            <div class="form-group">
                <label>class</label>
                <div class="selectbox">
                    <select name="class" required>
                        <option value="Computer Science"
                            <?php
                                if($result['Class'] == 'Computer Science')
                                {
                                    echo "selected";
                                }
                            ?>
                        >
                        Computer Science</option>
                        <option value="Information Technology"
                        <?php
                                if($result['Class'] == 'Information Technology')
                                {
                                    echo "selected";
                                }
                            ?>
                        >
                        Information Technology</option>                       
                    </select>
                </div>    
            </div>
                
            <div class="form-group">
                <label>Project Name</label>
                <input type="text" class="form-control" name="pname" value="<?php echo $result['Project_Name']; ?>" placeholder="Project Name" required>                    
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" class="form-control" name="Year" value="<?php echo $result['Year']; ?>" placeholder="Year" required>                    
            </div>
            

            <div class="form-groupbtn">
                
                <button name="update" id="btn" class="btn" value="AddData">Update Data</button>
                
            </div>
        </form>
    </div>

</body>

</html>

<?php

if(isset ($_POST['update']))
{
    $rn = $_POST['rno'];
    $sn = $_POST['Sname'];
    $cl = $_POST['class'];
    $pn = $_POST['pname'];
    $yr = $_POST['Year'];

    $query = "update student set Roll_No='$rn' ,Student_Name='$sn' ,Class='$cl' , Project_Name='$pn' ,Year='$yr' where Roll_No ='$rn' " ;    

    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo "<script>alert('Record Updated Successfully');
        location.replace('http://localhost/VSCode/adddata.php')
        </script>";
    }
    else
    {
        echo "<script> alart('faild')</script>";
    }
}
?>
