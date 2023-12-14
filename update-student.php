<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include "dbconfig.php";
if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $id = $_GET['id'];
    
    $sql = "update sample set fname='$fname', lname='$lname', mobile='$mobile', email='$email' where id='$id'";
    
    $result = $conn->query($sql);
     if ($result == TRUE) {
         
         
     }
     else{
         echo "Error: $sql";
     }
}
     if (isset($_GET['id'])) {
    $unique_data = $_GET['id'];
    $sql = "SELECT * FROM sample WHERE id='$unique_data'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $id = $row['id'];
        }
    }
    }        
?>

<html>
    <head>
    </head>
    <body>
        <div class="container">
        <br><br><h2>Student Details</h2>
        <form action="" method="POST">
            <label>First Name</label>
            <input ty[e="text" name="fname" id="fname" value="<?php echo $fname; ?>"><br> <br>
            <label>Last Name</label>
            <input ty[e="text" name="lname" id="lname" value="<?php echo $lname; ?>"><br><br>
            <label>Email</label>
            <input ty[e="email" name="email" id="email" value="<?php echo $email; ?>"><br><br>
            <label>Mobile</label>
            <input ty[e="number" name="mobile" id="mobile" value="<?php echo $mobile; ?>"><br><br>
            <input type="submit" name="update" id="update" value="Update">
        </form>
        </div>


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


