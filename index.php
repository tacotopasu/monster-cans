<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Cans</title>
</head>
<body>
    <!-- <a href="cans/create.php">Add a Can</a><br><br> -->
</body>
</html>

<?php
include 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    if($_GET['id'] != ''){
        $url = 'http://localhost/monster/cans/read.php?id=' . $_GET['id'];
    } else {
        echo '<a href="cans/create.php">Add a Can</a><br><br>';
        $url = 'http://localhost/monster/cans/read.php';
    }
} else {
    echo '<a href="cans/create.php">Add a Can</a><br><br>';
    $url = 'http://localhost/monster/cans/read.php';
}

$response = file_get_contents($url);

if ($response !== false) {
    $cans = json_decode($response, true);

    // Check if there are any cans
    if (!empty($cans)) {
        // Loop through the cans and display them
        foreach ($cans as $can) {
            echo "<h1>" . $can['name'] . "</h1>";
            echo "<img src='/monster/imgs/" . $can['image'] . "' style='max-width: 200px;' ><br>";
            echo "<p>" . $can['description'] . "</p>";
            echo "<a href='cans/update.php?id=" . $can['id'] . "'><button>Update</button></a>";
            echo "<a href='cans/delete.php?id=" . $can['id'] . "'><button>Delete</button></a>";
            echo "<br>";
        }
    } else {
        echo "No cans found.";
    }
} else {
    echo "Failed to retrieve cans.";
}
?>