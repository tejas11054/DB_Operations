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
            <h2>Student Details</h2>
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

