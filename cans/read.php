<?php
include '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['id'])){
        $id = ' WHERE id = '.$_GET['id'];
    }else $id = '';
    $sql = "SELECT * FROM cans" . $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $cans = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $cans[] = $row;
        }
    
        echo json_encode($cans);
    } else {
        echo "No cans found.";
    }
    
    mysqli_close($conn);
}
?>