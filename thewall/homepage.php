<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/theWallLogo.png"/>
    <title>Homepage</title>
</head>
<body>
<h1>Homepage</h1>
<div class="taakbalk">
    <a class="upload" href="upload.php">Upload</a>
    <a class="upload" href="index.php">Log out</a>
</div>
<br>
<br>
<!-- <img class="images" src="media/placeholder.jpg" alt="placeholder"> -->
<div class="phptekst">
<?php
$mysqli = new mysqli('localhost', 'wall_username','12345','wall_db' ) or die ('Error connecting');
$query = "SELECT location, title, description, username FROM images ORDER BY image_id DESC ";
$stmt = $mysqli->prepare($query) or die ('Error preparing');
$stmt->bind_result($location,$title,$description,$username) or die ('Error binding results');
$stmt->execute() or die ('Error executing');

while ($succes = $stmt->fetch()) {
    echo '<img class="wallimg" style="width: 300px;" src="' . $location . '" />';
    echo '<br>';
    echo 'Title: ' . $title . '<br>';
    echo 'Description: ' . $description . '<br>';
    echo 'Uploader: ' . $username . '<br>';
    echo '<br>';
}
?>
</div>
</body>
</html>
