<?php
include("connect.php");

session_start();
$user = $_SESSION['uname'];
if($user == true)
{

}
else
{
    header('location:login.php');
}

$query = "SELECT * FROM STUDENT WHERE CLASS ='COMPUTER SCIENCE'";
$data = mysqli_query($conn, $query);

$ttl = mysqli_num_rows($data);



if($ttl != 0)
{
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
</head> 
<body>
    <nav class="navbar">
            <div class="topnav"> 
                <a class="active" href="adddata.php">back</a>
            </div>
                    
        </nav>
    <div class="top">
        <a>C.S Admin Panel(Sem VI)</a>
    </div>   
    <div class="center">
        <div class="table-responsive">
            <table border="1">
                    <tr>
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Project Name</th>
                        <th>Year</th>
                        <th>Operation</th>
                    </tr>
        </div>
        
    </div> 
        

</body>
</html>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo
            "<tr>
                <td>".$result['Roll_No']."</td>
                <td>".$result['Student_Name']."</td>
                <td>".$result['Class']."</td>
                <td>".$result['Project_Name']."</td>
                <td>".$result['Year']."</td>

                <td><a class='ope' id='upd' href='update.php?rn=$result[Roll_No]'>Update</a>
                <a class='ope' id='del' href='Delete.php?rn=$result[Roll_No]' onclick = 'return CheckDelete()' >Delete</a></td>

            </tr>";
    }
    

}
else
{
    echo "Table not found";
}

?>
</table>

<script>
    function CheckDelete()
    {
        return confirm('Delete the Record ?');
    }
</script>
