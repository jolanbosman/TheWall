<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/theWallLogo.png"/>
    <title>Image upload</title>
</head>
<body>
<h1>Image upload</h1>
<div class="taakbalk">
    <a class="upload" href="homepage.php">Homepage</a>
</div>
<br>
<br>
<br>
<div class="uploadcss">
<form method="post" action="uploadverwerken.php" enctype="multipart/form-data">
    <label><input required type="file" name="uploaded_image" /></label><br><br>
    <label>Title: <input required name="title" /></label><br><br>
    <label>Description: <input required name="description"/></label>
    <input type="submit" name="submit" value="Upload" /><br>
</form>
</div>
</body>
</html>
