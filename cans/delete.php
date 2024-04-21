<?php
include '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM cans WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Can deleted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>