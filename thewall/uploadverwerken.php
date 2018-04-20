<?php
session_start();

// image op de juiste plek zetten
$temp_location = $_FILES['uploaded_image']['tmp_name'];
$target_location = 'imagesWall/' . time() . $_FILES['uploaded_image']['name'];

move_uploaded_file($temp_location, $target_location);

$title = $_POST['title'];
$description= $_POST['description'];
$username= $_SESSION['username'];

$mysqli = new mysqli('localhost', 'wall_username','12345','wall_db' ) or die ('Error connecting');
$query = "INSERT INTO images VALUES (0,?,?,?,?)";
$stmt = $mysqli->prepare($query) or die ('Error preparing');
$stmt->bind_param('ssss',$target_location,$title,$description,$username) or die ('Error binding params');
$stmt->execute() or die ('Error inserting image in database');
$stmt->close();

//echo 'Hoera, je image staat in de database!';
header('Location: homepage.php');