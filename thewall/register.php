<?php
include ('htmlhead.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="media/theWallLogo.png"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h1>Registreren</h1>
<div class="taakbalk">
    <a class="upload" href="index.php">Terugkeren</a>
</div>
<br>
<form method="post" action="process_registration.php">
    <label>Gebruikersnaam:<br><input name="username"/></label><br>
    <label>E-mail:<br><input type="email" name="email"/></label><br>
    <label>wachtwoord:<br><input type="password" name="password1"/></label><br>
    <label>Herhaal wachtwoord<br><input type="password" name="password2"/></label><br>
    <label><input type="submit" name="submit_registration" value="registreer"/></label><br>
</form>
</body>
</html>