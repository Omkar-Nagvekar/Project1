<?php
include("connect.php");

//$query = "SELECT * FROM STUDENT WHERE CLASS ='COMPUTER SCIENCE'";
$query = "SELECT * FROM STUDENT WHERE CLASS ='INFORMATION TECHNOLOGY'";
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
                <a class="active" href="index.html">Home</a>
            </div>
                    
        </nav>
    <div class="top">
        <a>Information Technology</a>
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
            </tr>";
    }
    

}
else
{
    echo "Table not found";
}

?>
</table>
