<?php
include '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $day_added = date('Y-m-d');

    // Upload image file to a directory
    $targetDir = '../imgs/';
    $targetFile = $targetDir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

    // Insert data into the database
    $sql = "INSERT INTO cans (name, description, image, day_added) VALUES ('$name', '$description', '$image', '$day_added')";
    if (mysqli_query($conn, $sql)) {
        echo "Can added successfully! Check it out: <a href='http://localhost/monster/index.php?id=". mysqli_insert_id($conn) ."'>View Can</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Can</title>
</head>
<body>
<form action="create.php" method="post" enctype="multipart/form-data">
    Name:
    <input type="text" name="name" id="name" placeholder="Enter name" required><br><br>
    Description:
    <input type="text" name="description" id="description" placeholder="Enter description"><br><br>
    Image:
    <input type="file" name="image" id="image" accept="png"><br><br>
    <input type="submit" value="Add Can" name="submit">
</form>
</body>
</html>

<?php } ?>