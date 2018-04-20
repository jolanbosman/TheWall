

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/theWallLogo.png"/>
    <title>inloggen</title>
</head>
<body>
<h1>Inloggen</h1>
<div class="taakbalk">
    <a class="upload" href="index.php">Terugkeren</a>
</div>
<br><br>
<form method="post" action="inlogpoort.php">
    <label> Username: <input name="username" /></label><br><br>
    <label>Wachtwoord: <input type="password" name="password" /></label><br><br>
    <input type="submit" name="submit_login" value="Log in" />
</form>
</body>
</html>