<?php
   include("connect.php");
   session_start();
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
</head>

<body>
    <a id="homeb" type="button" href="index.html">Home</a>
    <form method="post">

        <div class="container">
            <center>
            <h3>Admin Login</h3>
            </center>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="submit" name="submit">Login</button>

        </div>

    </form>

</body>

</html>

<?php
    if(isset ($_POST['submit']))
    {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
    
        if ($uname != "" && $psw != "")
        {
    
        $query ="select * from admin_login where name='$uname' && password='$psw'";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
    
        if($total)
        {
            //echo "Login Succesfull";
                $_SESSION['uname'] = $psw;
            header('location: adddata.php');
        }
        }
        else
        {
            echo "faild";
        }
        
    }
?>
