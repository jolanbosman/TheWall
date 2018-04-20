<?php
session_start();
if (!isset($_SESSION['userid'])) {
    if (!isset($_COOKIE['userid'])) {
        header('Location: uitlogpoort.php');
    } else {
        require ('cookiecheck.php');
        $_SESSION['userid'] = $_COOKIE['userid'];
        $_SESSION['hash'] = $_COOKIE['hash'];
    }
}





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
echo 'Welom, je bent ingelogd als gebruiker ' . $_SESSION['userid'] . '<br>'
?>
<p>Klik <a href="uilogpoort.php">hier</a> om uit te loggen. </p>
</body>
</html>