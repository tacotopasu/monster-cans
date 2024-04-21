<?php
include '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $targetDir = '../imgs/';
    $targetFile = $targetDir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

    $sql = "UPDATE cans SET name='$name', description='$description', image='$image' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Can updated successfully! Check it out: <a href='http://localhost/monster/index.php?id=". $id ."'>View Can</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM cans WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Can</title>
    </head>
    <body>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name:
        <input type="text" name="name" id="name" placeholder="Enter name" value="<?php echo $row['name']; ?>" required><br><br>
        Description:
        <input type="text" name="description" id="description" placeholder="Enter description" value="<?php echo $row['description']; ?>"><br><br>
        Image:
        <input type="file" name="image" id="image" accept="png"><br><br>
        <input type="submit" value="Update Can" name="submit">
    </form>
    </body>
    </html>

<?php } else echo 'No id set?'; } ?>