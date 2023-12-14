​<?php
include "dbconfig.php";
if (isset($_GET['id'])) {
    $unique_data = $_GET['id'];
    $sql = "DELETE FROM sample WHERE id ='$unique_data'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: index.php');
    }else{
        echo "Error: $sql";
    }
}
?>