<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2>Insert Data</h2><br>
        <form action="" method="POST">
            <label>First Name</label>
            <input ty[e="text" name="fname" id="fname"><br> <br>
            <label>Last Name</label>
            <input ty[e="text" name="lname" id="lname"><br><br>
            <label>Email</label>
            <input ty[e="email" name="email" id="email"><br><br>
            <label>Mobile</label>
            <input ty[e="number" name="mobile" id="mobile"><br><br>
            <input type="submit" name="submit" id="submit" value="submit">
        </form>
        </div>
        
         <?php
        include "dbconfig.php";
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            
            $sql = "INSERT INTO sample (fname, lname, email, mobile) VALUES ('$fname', '$lname','$email','$mobile')";
            $result = $conn->query($sql);
            
            if($result == TRUE){
                

            }
            else{
                echo "Error: $sql";
            }
            $conn->close();
        }
        ?>
    </body>
</html>

<?php

include "dbconfig.php";
?>

<html>
    <head>
        <title>View Student</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br><br><h2>Student Details</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $sql = "select * from sample";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                       ?>     
                        <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><a class="btn btn-info" href="update-student.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                     <td><a class="btn btn-danger" href="delete-student.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                         <?php       }
            }
        ?>
                    
                </tbody>
            </table>
        </div>

    </body>
</html>


